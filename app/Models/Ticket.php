<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Ticket extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
      'user_id',
      'ticket_no',
      'product_service',
      'complaint',
      'platform',
      'link',
      'additional_documents_file',
      'vendor_id',
      'reported_by_id',
      'remarks',
      'isFollow',
      'severity',
      'status',
  ];
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id');
  }

  public function violations()
  {
      return $this->hasMany(Violation::class, 'ticket_id', 'id');
  }

  public function ticketsDocuments()
  {
      return $this->hasMany(TicketDocumentFile::class, 'ticket_id', 'id');
  }

  public function agencies()
  {
      return $this->hasMany(TicketAssignAgency::class, 'ticket_id', 'id');
  }
  public function comments()
  {
      return $this->hasMany(TicketComment::class, 'ticket_id', 'id');
  }

  public function vendor()
  {
      return $this->belongsTo(Vendor::class, 'vendor_id');
  }

  public function reportedby()
  {
      return $this->belongsTo(ReportedBy::class, 'reported_by_id');
  }
  public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([ 'user_id',
        'ticket_no',
        'product_service',
        'complaint',
        'platform',
        'link',
        'additional_documents_file',
        'vendor_id',
        'reported_by_id',
        'remarks',
        'isFollow',
        'severity',
        'status',]);
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This ticket has been {$eventName}";
    }
}
