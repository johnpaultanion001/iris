<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Resources\ReportCollection;

class ReportController extends Controller
{
  public function index(Request $request)
  {
    $collection = Report::latest()->get();

    return new ReportCollection($collection);
  }
  public function mark_read(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'id' => 'required',
      'isRead' => 'required',
    ]);
    if ($validator->fails()) {
      return $this->responseUnprocessable($validator->errors());
    }
    Report::where('id', request('id'),)->update([
        'isRead' => request('isRead'),
    ]);

    return $this->responseResourceUpdated('Updated successfully');
  }
  public function mark_all_read(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'isRead' => 'required',
    ]);
    if ($validator->fails()) {
      return $this->responseUnprocessable($validator->errors());
    }
    Report::where('user_id', auth("api")->user()->id)->update([
      'isRead' => request('isRead'),
    ]);

    return $this->responseResourceUpdated('Updated successfully');
  }
}
