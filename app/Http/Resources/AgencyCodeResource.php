<?php

namespace App\Http\Resources;

use App\Custom\Hasher;

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
