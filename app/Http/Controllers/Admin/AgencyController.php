<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Agency;
use App\Http\Controllers\ApiController;
use App\Http\Resources\AgencyCollection;

class AgencyController extends ApiController
{
    public function index(Request $request)
    {
        $collection = Agency::latest()->get();

        return new AgencyCollection($collection);
    }


}
