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

class UserController extends Controller
{
    use ApiResponser;

    private $userRepo, $userService;
    public function __construct(UserRepoInterface $userRepo, UserServiceInterface $userService)
    {
        $this->userRepo = $userRepo;
        $this->userService = $userService;
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
            $validateData = $request->validated();                

            $data = [];
            $data = $this->userService->store($validateData); 

            $data['token'] =  $data->createToken('App')->plainTextToken;           
          
            return $this->success(200, new UserResource($data), 'User created successfully.');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function show($id)
    {
        //
    }


    public function update(UserRequest $request, $id)
    {
        try {
            $validateData = $request->validated();

            $data = $this->userService->update($validateData, $id);

            return $this->success(200, new UserResource($data), 'User updated successfully.');
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage(), 'Internal Server Error.');
        }
    }


    public function destroy($id)
    {
        //
    }
}
