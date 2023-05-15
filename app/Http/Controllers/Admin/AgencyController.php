<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Agency;
use App\Http\Controllers\ApiController;
use App\Http\Resources\AgencyCodeCollection;

class AgencyController extends ApiController
{
    public function index(Request $request)
    {
        $collection = Agency::latest()->get();

        return new AgencyCollection($collection);
    }

    public function code(Request $request)
    {
        $collection = Agency::select('code')->latest()->get();

        return new AgencyCodeCollection($collection);
    }


}
