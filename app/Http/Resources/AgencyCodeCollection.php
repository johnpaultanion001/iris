<?php

namespace App\Http\Resources;

use App\Http\Resources\ApiResourceCollection;

class AgencyCodeCollection extends ApiResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

class AgencyCodeResource extends ApiResource
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
        $this->agency->code ?? $this->code,

      ];

    }
}
