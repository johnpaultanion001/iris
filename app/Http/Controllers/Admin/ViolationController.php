<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ApiController;
use App\Http\Resources\ViolationCollection;

use App\Models\Violation;



class ViolationController extends ApiController
{
    public function list_violations(Request $request)
    {
        $collection = Violation::latest()->get();
        return new ViolationCollection($collection);
    }

}
