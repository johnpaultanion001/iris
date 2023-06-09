<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Custom\Hasher;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasFactory, LogsActivity, HasApiTokens;


    protected $fillable = [
        'id',
        'agency_id',
        'name',
        'last_name',
        'email',
        'mobile_number',
        'role',
        'status',
        'profile',
        'isLoggedIn',
        'password'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getHashidAttribute()
    {
        return $this->hashid();
    }


    public function sendPasswordResetNotification($token)
    {
        $email = $this->getEmailForPasswordReset();
        $user = $this::where('email', $email)->first();
        $this->notify(new ResetPasswordNotification($token, $user->id));
    }

    public function inboxs()
    {
        return $this->hasMany(Inbox::class, 'user_id', 'id');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['agency_id',
        'name',
        'email',
        'mobile_number',
        'role',
        'status',
        'profile',]);
    }
}
