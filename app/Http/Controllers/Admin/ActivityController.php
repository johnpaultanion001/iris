<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Http\Resources\ActivityCollection;

class ActivityController extends Controller
{
  public function index(Request $request)
  {
    $collection = ActivityLog::latest()->get();

    return new ActivityCollection($collection);
  }
}
