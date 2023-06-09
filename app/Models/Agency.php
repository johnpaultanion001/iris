<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'title',
        'code',
        'color',
    ];


    public function users()
    {
        return $this->hasMany(User::class, 'agency_id', 'id');
    }


}
