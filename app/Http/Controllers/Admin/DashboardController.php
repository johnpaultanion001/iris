<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Ticket;

class DashboardController extends ApiController
{
  public function count_ticket_status(Request $request)
  {
      $FOR_REVIEW = Ticket::where('status','FOR_REVIEW')->count();
      $ACKNOWLEDGED = Ticket::where('status','ACKNOWLEDGED')->count();
      $ON_GOING = Ticket::where('status','ON_GOING')->count();
      $RESOLVED = Ticket::where('status','RESOLVED')->count();
      $INVALID = Ticket::where('status','INVALID')->count();

      return response()->json([
        'status' => 200,
            'data' => [
              "FOR_REVIEW" => $FOR_REVIEW,
              "ACKNOWLEDGED" => $ACKNOWLEDGED,
              "ON_GOING" => $ON_GOING,
              "RESOLVED" => $RESOLVED,
              "INVALID" => $INVALID,
            ],
        ], 200);
  }

}
