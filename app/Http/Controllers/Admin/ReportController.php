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
}
