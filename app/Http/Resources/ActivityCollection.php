<?php

namespace App\Http\Resources;

use App\Http\Resources\ApiResourceCollection;

class ActivityCollection extends ApiResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

class ActivityResource extends ApiResource
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
          'action' => $this->event ?? '',
          'activity' => $this->description ?? '',
          'agency' => $this->user->agency->code ?? '' ,
          'assigned_agencies' =>[
            new AgencyResource($this->user->agency),
          ],
          'user' => [
              'name' => $this->user->name ?? '',
              'role' => $this->user->role ?? '',
          ],
          'created_at' => (string)$this->created_at->toDateTimeString(),

      ];

    }
}

