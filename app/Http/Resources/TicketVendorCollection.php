<?php

namespace App\Http\Resources;

use App\Http\Resources\ApiResourceCollection;

class TicketVendorCollection extends ApiResourceCollection
{

    public function toArray($request)
    {
      return parent::toArray($request);
    }
}

class TicketVendorResource extends ApiResource
{
  public function toArray($request){
          return [
                'id' => $this->id,
                'ticket_no' => $this->id,
                'severity'=> $this->severity,
                'status'=> $this->status,
                'isFollow'=> $this->isFollow,
                'product_service' => $this->product_service,
                'complaint' => $this->complaint,

                'reported_by' => [
                  new ReportedByResource($this->reportedby),
                ],
                'date_submitted' => (string)$this->created_at->toDateTimeString(),
                'agencies' =>
                  new AgencyCodeCollection($this->agencies()->get()),
                'assigned_agencies' =>
                  new AgencyCollection($this->agencies()->get()),
            ];
  }
}
