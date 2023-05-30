<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Handler;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Interviewer;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponser;

    public function userLogin(Request $request)
    {
        try {
            $interviewer = Interviewer::where('email', $request->email)->first();
            $interviewerId=$interviewer->id;

            if ($interviewer && Auth::attempt(['interviewer_id' => $interviewerId, 'password' => $request->password])) {
                $user = Auth::user();
                $success['token'] =  $user->createToken('User API')->plainTextToken;
                $success['id'] = $interviewer->id;
                $success['name'] =  $interviewer->name;
                $success['role']= $user->getRoleNames();
                $success['permission']=$user->getPermissionsViaRoles()->pluck('name');

;               return $this->success(200, $success, 'User login successfully.');
            } else {
                return $this->error(401, ['error' => 'Unauthorized'], 'Unauthorized.');
            }
        } catch (Exception $e) {

            return $this->error(500, $e->getMessage(), 'Internal Server Error.');

        }
    }

    public function checkToken(Request $request)
    {
        try {
            $token = $request->bearerToken();

            if (!$token) {
                return response()->json(['valid' => false], 401);
            }

            $isValid = Auth::guard('sanctum')->check();

            return response()->json(['valid' => $isValid], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


}
