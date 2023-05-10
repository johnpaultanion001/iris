<?php

namespace App\Http\Controllers\Auth;
use App\Http\Resources\UserResource;
use App\Http\Controllers\APIController;

class LoginController extends ApiController
{

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->responseUnauthorized();
        }

        // Get the user data.
        $user = auth()->user();
        activity()->event('Login')->log('This user is logged in');
        return response()->json([
            'status' => 200,
            'message' => 'Authorized.',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'data' => [
              new UserResource($user),
            ],
        ], 200);
    }
}
