<?php

namespace App\Http\Resources;

use App\Custom\Hasher;

class VendorResource extends ApiResource
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
            'vendor_name' => $this->vendor_name,
            'email' => $this->email,
            'mobile_number' => $this->mobile_number,
            'city' => $this->city,

            'created_at' => (string)$this->created_at->toDateTimeString(),
            'updated_at' => (string)$this->updated_at->toDateTimeString(),
        ];
    }
}
