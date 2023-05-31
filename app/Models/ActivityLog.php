<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Activity
{
    use HasFactory;
    protected $fillable = [
      'causer_id',
  ];
    public function user()
    {
        return $this->belongsTo(User::class, 'causer_id', 'id');
    }
}
