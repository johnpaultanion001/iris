<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Vendor;
use App\Http\Resources\VendorCollection;
use App\Http\Resources\VendorResource;
use Illuminate\Support\Facades\Validator;

class ReportedVendorsController extends ApiController
{
  public function index(Request $request)
  {
    $collection = Vendor::latest()->get();
    return new VendorCollection($collection);
  }

  public function show(Request $request, Vendor $reported_vendor)
  {
    return new VendorResource($reported_vendor);
  }

  public function update(Request $request, Vendor $reported_vendor)
  {
      $validator = Validator::make($request->all(), [
        'vendor_name' => 'required',
        'email' => ['required', 'email', 'max:255' , 'unique:vendors,email,'.$reported_vendor->id],
        'mobile_number' => ['required', 'string', 'min:8','max:11'],
        'city' => 'required',
      ]);

      if ($validator->fails()) {
        return $this->responseUnprocessable($validator->errors());
      }

      $reported_vendor->update([
        'vendor_name' => request('vendor_name'),
        'email' => request('email'),
        'mobile_number' => request('mobile_number'),
        'city' => request('city'),
      ]);

      $data = [
        'vendor_name' => $reported_vendor->vendor_name,
        'email' => $reported_vendor->email,
        'mobile_number' => $reported_vendor->mobile_number,
        'city' => $reported_vendor->city,
      ];

      return $this->responseResourceUpdated('Vendor updated successfully',$data);
  }
}
