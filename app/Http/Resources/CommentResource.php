<?php

namespace App\Http\Resources;

use App\Custom\Hasher;

class CommentResource extends ApiResource
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
        'profile' => $this->user->profile,
        'author' => $this->user->name,
        'agency' => $this->user->agency->code,
        'comment' => $this->comment,

        'comment_at' => (string)$this->created_at->toDateTimeString(),
    ];

    }
}
