<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Http\Resources\ActivityCollection;

class ActivityController extends Controller
{
  public function index(Request $request)
  {
    $collection = Activity::latest()->get();

    return new ActivityCollection($collection);
  }
}
