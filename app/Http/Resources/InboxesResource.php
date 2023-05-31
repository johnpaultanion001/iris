<?php

namespace App\Http\Resources;

use App\Custom\Hasher;

class InboxesResource extends ApiResource
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
        'message' => $this->message,
        'isRead'  => $this->isRead,

        'created_at' => (string)$this->created_at->toDateTimeString(),
    ];

    }
}
