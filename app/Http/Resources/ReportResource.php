<?php

namespace App\Http\Resources;

use App\Custom\Hasher;

class ReportResource extends ApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return parent::toArray($request);

    }
}
