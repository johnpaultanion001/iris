<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Ticket;
use App\Models\Violation;


class DashboardController extends ApiController
{
  public function count_ticket_status(Request $request)
  {
      $FOR_REVIEW = Ticket::where('status','FOR_REVIEW')->count();
      $ACKNOWLEDGED = Ticket::where('status','ACKNOWLEDGED')->count();
      $ON_GOING = Ticket::where('status','ON_GOING')->count();
      $RESOLVED = Ticket::where('status','RESOLVED')->count();
      $INVALID = Ticket::where('status','INVALID')->count();

      $dti = Ticket::whereHas('agencies', function ($query) {
                return $query->where('agency_id', '=', 1);
            })->count();
      $doh = Ticket::whereHas('agencies', function ($query) {
                return $query->where('agency_id', '=', 2);
            })->count();

      $da = Ticket::whereHas('agencies', function ($query) {
                return $query->where('agency_id', '=', 2);
            })->count();

      $denr = Ticket::whereHas('agencies', function ($query) {
              return $query->where('agency_id', '=', 4);
          })->count();

      $others = Ticket::whereHas('agencies', function ($query) {
            return $query->whereNotIn('agency_id', [1,2,3,4]);
        })->count();


      return response()->json([
        'status' => 200,
            'status' => [
              "for_review" => $FOR_REVIEW,
              "acknowledged" => $ACKNOWLEDGED,
              "on_going" => $ON_GOING,
              "resolved" => $RESOLVED,
              "invalid" => $INVALID,
            ],
            'agencies' => [
              "dti" => $dti,
              "doh" => $doh,
              "da" => $da,
              "denr" => $denr,
              "others" => $others,
            ],
        ], 200);
  }

  public function dashboard_violation(Request $request)
  {
    $vios = Violation::select('violation')
              ->selectRaw('count(violation) as frequency')
              ->groupBy('violation')
              ->orderBy('frequency', 'DESC')->get();

      return response()->json([
        'status' => 200,
            'data' => $vios,
        ], 200);
  }


}
