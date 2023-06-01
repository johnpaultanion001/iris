<?php

namespace App\Http\Resources;

use App\Custom\Hasher;
use Illuminate\Support\Facades\Storage;

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
      $profile = Storage::disk('s3')->temporaryUrl($this->profile, now()->addMinutes(5));

        return [
            'id' => $this->id,
            'isLoggedIn' => $this->isLoggedIn,
            'profile' => $profile,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'mobile_number' => $this->mobile_number,
            'role' => $this->role,
            'status' => $this->status,
            'agency' => $this->agency->code ?? '' ,
            'assigned_agencies' => new AgencyResource($this->agency),

            'created_at' => (string)$this->created_at->toDateTimeString(),
            'updated_at' => (string)$this->updated_at->toDateTimeString(),
        ];
    }
}
