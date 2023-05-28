<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

use App\Http\Resources\UserResource;
use App\Repositories\User\UserRepoInterface;
use App\Services\User\UserServiceInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use ApiResponser;

    private $userRepo, $userService;
    public function __construct(UserRepoInterface $userRepo, UserServiceInterface $userService)
    {
        $this->userRepo = $userRepo;
        $this->userService = $userService;

        // $this->middleware('permission:userList',['only'=>['index']]);
        // $this->middleware('permission:userCreate',['only'=>['store']]);
        // $this->middleware('permission:userUpdate',['only'=>['update']]);
        // $this->middleware('permission:userDelete',['only'=>['destroy']]);
        // $this->middleware('permission:userShow',['only'=>['show']]);
    }

    public function index()
    {
        try {
            $data = $this->userRepo->get();
            return $this->success(200, UserResource::collection($data), "User retrieved successfully.");
        } catch (Exception $e) {
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
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }

    public function show($id)
    {
        try {
            $user = $this->userRepo->show($id);
            return $this->success(200, new UserResource($user), 'User showed successfully.');
        } catch (Exception $e) {
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
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function destroy($id)
    {
        try {
            $data = $this->userService->destroy($id);

            return $this->success(200, $data, 'User deleted successfully.');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }
}
