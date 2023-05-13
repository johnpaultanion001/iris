<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Vendor;
use App\Http\Resources\VendorCollection;

class ReportedVendorsController extends ApiController
{
  public function index(Request $request)
  {
    $collection = Vendor::latest()->get();

    return new VendorCollection($collection);
  }
}
