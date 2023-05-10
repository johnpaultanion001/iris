<?php

namespace App\Http\Resources;

use App\Custom\Hasher;
use Spatie\Activitylog\Models\Activity;

class TicketResource extends ApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

      $activity_logs = Activity::where('subject_id',$this->id)
                                ->where('subject_type',"App\Models\Ticket")
                                ->latest()->get();


        return [
            'id' => $this->id,
            'ticket_no' => $this->id,
            'severity'=> $this->severity,
            'status'=> $this->status,
            'isFollow'=> $this->isFollow,
            'product_service' => $this->product_service,
            'complaint' => $this->complaint,
            'platform' => $this->platform,
            'link' => $this->link,
            'created_by' => $this->user->name,
            'reported_by' => [
              new ReportedByResource($this->reportedby),
            ],
            'date_submitted' => (string)$this->created_at->toDateTimeString(),
            'additional_documents_file' => $this->additional_documents_file,
            'remarks' => $this->remarks,
            'vendor' => [
              new VendorResource($this->vendor),
            ],
            'violations' => [
              new ViolationResource($this->violations()->get()),
            ],
            'total_fine' => $this->violations()->sum('amount'),
            'assigned_agencies' => [
              new AgencyCollection($this->agencies()->get()),
            ],
            'comments' => [
              new CommentCollection($this->comments()->latest()->get()),
            ],
            'activity_log' => [
              new ActivityCollection($activity_logs),
            ],
        ];
    }
}
