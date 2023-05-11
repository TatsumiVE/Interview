<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
     use ApiResponser;

    // public function register(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'name' => 'required',
    //             'email' => 'required|email|unique:users,email',
    //             'is_active' => '',
    //             'password' => 'required',
    //             'c_password' => 'required|same:password',         
    //         ]);

    //         if ($validator->fails()) {
    //             return $this->sendError('Validation Error.', $validator->errors());
    //         }     
    //         $input= $request->all();  
    //         $input['is_active'] = $request->has('is_active')? true:false;   
    //         $input['password'] = bcrypt($input['password']);
    //         $user = User::create($input);
    //         $success['token'] =  $user->createToken('App')->plainTextToken;
    //         $success['name'] =  $user->name;

    //         return $this->sendResponse($success, 'User register successfully.');
    //     } catch (Exception $e) {
    //         return $this->sendError('Internal Server Error', $e->getMessage(), 500);
    //     }
    // }

    public function loginUser(Request $request)
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $success['token'] =  $user->createToken('App')->plainTextToken;
                $success['name'] =  $user->name;

                return $this->sendResponse($success, 'User login successfully.');
            } else {
                return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
            }
        } catch (Exception $e) {
            return $this->sendError('Internal Server Error', $e->getMessage(), 500);
        }
    }
}
