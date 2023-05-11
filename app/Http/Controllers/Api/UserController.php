<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepoInterface;
use App\Services\User\UserServiceInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use ApiResponser;

    private $userService, $userRepo;
    public function __construct(UserRepoInterface $userRepo,UserServiceInterface $userService )
    {
        $this->userRepo = $userRepo;
        $this->userService = $userService;
    }

    public function index()
    {
        try {
            $success = $this->userRepo->get();           
            return $this->sendResponse($success, 'User data retrieved successfully');
        } catch (Exception $e) {
            return $this->sendError('Internal Server Error', $e->getMessage(), 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'is_active' => '',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $input = $request->all();
            $input['is_active'] = $request->has('is_active')? 1 : 0;
            $input['password'] = bcrypt($input['password']);

            $success = $this->userService->store($input);
            return $this->sendResponse($success, 'User register successfully.');
        } catch (Exception $e) {
            return $this->sendError('Internal Server Error', $e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
