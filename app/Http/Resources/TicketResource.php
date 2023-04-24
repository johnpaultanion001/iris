<?php

namespace App\Http\Resources;

use App\Custom\Hasher;

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
        return [
            'id' => $this->id,
            'ticket_no' => $this->id,
            'product_service' => $this->product_service,
            'complaint' => $this->complaint,
            'link' => $this->link,
            'additional_documents_file' => $this->additional_documents_file,
            'severity'=> $this->severity,
            'status'=> $this->status,
            'isFollow'=> $this->isFollow,
            'remarks' => $this->remarks,
            'vendor' => [
              new VendorResource($this->vendor),
            ],
            'reported_by' => [
              new ReportedByResource($this->reportedby),
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


            'created_by' => $this->user->name,
            'created_at' => (string)$this->created_at->toDateTimeString(),
            'updated_at' => (string)$this->updated_at->toDateTimeString(),
        ];
    }
}
