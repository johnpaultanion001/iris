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
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;

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

    public function account_status(Request $request)
    {
      $user = User::where('id',request('user_id'))->first();
      if(auth("api")->user()->role == "SUPER_ADMIN"){
        $user->update([
          "status" => request('status'),
        ]);
      }else{
        if (auth("api")->user()->agency_id == $user->agency_id) {
          $user->update([
            "status" => request('status'),
          ]);
        }else{
          return $this->userUnauthorized();
        }
      }
      return new UserResource($user);
    }

    public function change_password(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'current_password' => ['required',new MatchOldPassword],
            'new_password' => [
                                  'required','string','min:8','max:32',
                                  'regex:/[a-z]/',
                                  'regex:/[A-Z]/',
                                  'regex:/[0-9]/',
                                  'regex:/[@$!%*#?&]/',
                              ],
            'confirm_password' => ['required','same:new_password'],

        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find(auth("api")->user()->id)->update([
            'password' => Hash::make($request->input('new_password')),
        ]);
        return response()->json(['success' => 'Password Successfully Changed.']);
    }

    public function show(User $user)
    {
        if(auth("api")->user()->role == "SUPER_ADMIN"){
          return new UserResource($user);
        }else{
        if (auth("api")->user()->agency_id == $user->agency_id) {
          return new UserResource($user);
        }else{
          return $this->userUnauthorized();
        }
      }

    }

    public function update (User $user, Request $request){
      $validator = Validator::make($request->all(), [
          'agency_id' => 'required',
          'profile' => 'required',
          'name' => 'required',
          'last_name' => 'required',
          'email' => 'required|email|max:255|unique:users,email,'.$user->id,
          'mobile_number' => ['required', 'string', 'min:8','max:11'],
      ]);

      if ($validator->fails()) {
          return $this->responseUnprocessable($validator->errors());
      }

      $user->update([
        'agency_id' => $request['agency_id'],
        'profile' => $request['profile'],
        'name' => $request['name'],
        'last_name' => $request['last_name'],
        'email' => $request['email'],
        'mobile_number' => $request['mobile_number'],
      ]);
      return response()->json(['success' => 'User updated.']);
    }

    public function logout(Request $request)
    {
      auth("api")->user()->update([
        'isLoggedIn' => 0,
      ]);
      $token = auth("api")->user()->token();
      $token->revoke();
      return response()->json(['success' => 'User is logout']);
    }

}
