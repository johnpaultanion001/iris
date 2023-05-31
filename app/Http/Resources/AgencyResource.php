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


          'id' => $this->agency->id ?? '',
          'logo' => $this->agency->logo  ?? '',
          'agency' => $this->agency->title  ?? '',
          'code' => $this->agency->code  ?? '',
          'color' => $this->agency->color  ?? '',

      ];

    }
}

