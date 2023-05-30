<?php

namespace App\Http\Controllers\Auth;
use App\Http\Resources\UserResource;
use App\Http\Controllers\APIController;
use Psr\Http\Message\ServerRequestInterface;
use \Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends AccessTokenController
{


    public function auth(ServerRequestInterface $request)
    {
            $tokenResponse = parent::issueToken($request);
            $token = $tokenResponse->getContent();

            // $tokenInfo will contain the usual Laravel Passort token response.
            $tokenInfo = json_decode($token, true);

            // Then we just add the user to the response before returning it.
            $username = $request->getParsedBody()['username'];
            $user = User::whereEmail($username)->first();
            $tokenInfo = collect($tokenInfo);
            $user->update([
              'isLoggedIn' => 1,
            ]);
            $tokenInfo->put('user', $user);


            return $tokenInfo;
    }
}
