<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inbox;
use App\Http\Resources\InboxesCollection;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Validator;

class InboxesController extends ApiController
{
  public function index(Request $request)
  {
    $collection = Inbox::where('user_id', auth("api")->user()->id)->latest()->get();
    return new InboxesCollection($collection);
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
    Inbox::where('id', request('id'),)->update([
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
    Inbox::where('user_id', auth("api")->user()->id)->update([
      'isRead' => request('isRead'),
    ]);

    return $this->responseResourceUpdated('Updated successfully');
  }

}
