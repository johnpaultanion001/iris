<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends ApiController
{


    use RegistersUsers;

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'agency_id' => 'required',
            'profile' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'mobile_number' => ['required', 'string', 'min:8','max:11'],
            'role' => ['required', 'in:ADMIN,SUPER_ADMIN'],
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->responseUnprocessable($validator->errors());
        }

        try {
            $user = $this->create($request->all());
            return $this->responseSuccess('Registered successfully.');
        } catch (Exception $e) {
            return $this->responseServerError('Registration error.');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'agency_id' => $data['agency_id'],
            'profile' => $data['profile'],
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile_number' => $data['mobile_number'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
