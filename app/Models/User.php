<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Custom\Hasher;
use App\Models\Todo;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasFactory;


    protected $fillable = [
        'agency_id',
        'name',
        'email',
        'mobile_number',
        'role',
        'status',
        'profile',
        'password'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getHashidAttribute()
    {
        return $this->hashid();
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }


    public function sendPasswordResetNotification($token)
    {
        $email = $this->getEmailForPasswordReset();
        $user = $this::where('email', $email)->first();
        $this->notify(new ResetPasswordNotification($token, $user->id));
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id', 'id');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }
}
