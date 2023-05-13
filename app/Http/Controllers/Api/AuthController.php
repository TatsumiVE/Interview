<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Handler;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponser;
    protected $exceptionHandler;
    public function __construct(Handler $exceptionHandler)
    {
        $this->exceptionHandler = $exceptionHandler;
    }
    public function userLogin(Request $request)
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $success['token'] =  $user->createToken('User API')->plainTextToken;
                $success['name'] =  $user->name;

                return $this->success(200, $success, 'User login successfully.');
            }
        } catch (Exception $e) {
            app(Handler::class)->report($e); // Report the exception to the handler
            return app(Handler::class)->render($request, $e); // Render the exception response
        }
    }
}
