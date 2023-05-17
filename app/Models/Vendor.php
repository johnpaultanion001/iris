<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
      'vendor_name',
      'email',
      'mobile_number',
      'city',
  ];

  public function ticket()
  {
      return $this->belongsTo(Ticket::class, 'id','vendor_id');
  }

  public function tickets()
  {
      return $this->hasMany(Ticket::class, 'vendor_id', 'id');
  }
}
