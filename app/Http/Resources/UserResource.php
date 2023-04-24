<?php

namespace App\Http\Resources;

use App\Custom\Hasher;

class UserResource extends ApiResource
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
            'profile' => $this->profile,
            'name' => $this->name,
            'email' => $this->email,
            'mobile_number' => $this->mobile_number,
            'role' => $this->role,
            'status' => $this->status,
            'agency' => [
              new AgencyResource($this->agency),
            ],

            'created_at' => (string)$this->created_at->toDateTimeString(),
            'updated_at' => (string)$this->updated_at->toDateTimeString(),
        ];
    }
}
