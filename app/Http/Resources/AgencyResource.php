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


          'logo' => $this->agency->logo ?? $this->logo ?? '0',
          'agency' => $this->agency->title ?? $this->title ?? '0',
          'code' => $this->agency->code ?? $this->code ?? '0',
          'color' => $this->agency->color ?? $this->color ?? '0',

      ];

    }
}

