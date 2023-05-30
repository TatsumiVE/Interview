<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\User\UserServiceInterface;
use App\Repositories\User\UserRepoInterface;


class UserController extends Controller
{
    use ApiResponser;

    private $userRepo, $userService;
    public function __construct(UserRepoInterface $userRepo, UserServiceInterface $userService)
    {
        $this->userRepo = $userRepo;
        $this->userService = $userService;


        $this->middleware('permission:userList', ['only' => ['index']]);
        $this->middleware('permission:userCreate', ['only' => ['store']]);
        $this->middleware('permission:userUpdate', ['only' => ['update']]);
        $this->middleware('permission:userDelete', ['only' => ['destroy']]);
        $this->middleware('permission:userShow', ['only' => ['show']]);
    }

    public function index()
    {
        try {
            $data = $this->userRepo->get();
            return $this->success(200, UserResource::collection($data), "User retrieved successfully.");
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving User data: ' . $e->getMessage());
            return $this->sendError(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function store(UserRequest $request)
    {
        try {
            $data = [];
            $validateData = $request->validated();

            $data = $this->userService->store($validateData);

            $data['token'] =  $data->createToken('App')->plainTextToken;

            return $this->success(200, new UserResource($data), 'User created successfully.');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error creating User data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }

    public function show($id)
    {
        try {
            $user = $this->userRepo->show($id);
            return $this->success(200, new UserResource($user), 'User showed successfully.');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error retrieving User data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $validateData = $request->validate([
                'role' => 'required'
            ]);

            $data = $this->userService->update($validateData, $id);

            return $this->success(200, new UserResource($data), 'User updated successfully.');
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error updating user data: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function destroy(User $user)
    {
        try {
            if (count($user->interviewer) == 0) {
                $user->delete();
                $data = '';

                return $this->success(200, $data, "Interviewer deleted successfully.");
            } else {
                $msg = 'Sorry,cannot delete because there are some relationships remaining';
                return $this->error(500, $msg, 'Internal Server Error');
            }
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error deleting user: ' . $e->getMessage());
            return $this->error(500, $e->getMessage(), 'Internal Server Error');
        }
    }
}
