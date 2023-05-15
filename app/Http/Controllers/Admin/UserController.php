<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Controllers\ApiController;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;

class UserController extends ApiController
{
    public function index(Request $request)
    {
        if(auth("api")->user()->role == "SUPER_ADMIN"){
          $collection = User::latest()->get();
        }else{
          $collection = User::where('agency_id',auth("api")->user()->agency_id)->latest()->get();
        }


        return new UserCollection($collection);
    }

     public function new_password(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'password' => [
              'required','string','min:8','max:32','confirmed',
              'regex:/[a-z]/',
              'regex:/[A-Z]/',
              'regex:/[0-9]/',
              'regex:/[@$!%*#?&]/',
          ],
      ]);


      if ($validator->fails()) {
        return $this->responseUnprocessable($validator->errors());
      }

      $user = User::where('id',  auth("api")->user()->id)->first();

      $user->update([
        'password' => Hash::make(request('password')),
      ]);

      $data = [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
      ];

      return $this->responseResourceUpdated('Password updated successfully',$data);
    }

    public function profile(Request $request)
    {
      $profile = User::where('id',auth("api")->user()->id)->first();

      return new UserResource($profile);
    }

}
