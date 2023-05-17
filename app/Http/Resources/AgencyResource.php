<?php

namespace App\Http\Resources;

use App\Custom\Hasher;
class AgencyResource extends ApiResource
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
          'logo' => $this->agency->logo ?? $this->logo,
          'agency' => $this->agency->title ?? $this->title,
          'code' => $this->agency->code ?? $this->code,
          'color' => $this->agency->color ?? $this->color,

      ];

    }
}

