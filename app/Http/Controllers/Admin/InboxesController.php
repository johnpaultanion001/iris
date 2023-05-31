<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inbox;
use App\Http\Resources\InboxesCollection;

class InboxesController extends Controller
{
  public function index(Request $request)
  {
    $collection = Inbox::where('user_id', auth("api")->user()->id)->latest()->get();
    return new InboxesCollection($collection);
  }
}
