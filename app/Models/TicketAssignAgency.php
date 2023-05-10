<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAssignAgency extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_id',
        'agency_id',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }
}
