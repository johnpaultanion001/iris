<?php

namespace App\Http\Resources;

use App\Http\Resources\ApiResourceCollection;

class InboxesCollection extends ApiResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
