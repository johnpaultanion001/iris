<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Resources\TicketCollection;
use App\Http\Resources\VendorCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\ActivityCollection;
use App\Models\Ticket;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Agency;
use App\Models\ActivityLog;

class FilterController extends ApiController
{
  public function filter_tickets(Request $request)
  {
    $collection = Ticket::whereHas('agencies', function ($query) {
                    return $query->whereIn('agency_id', request('agencies') ?? Agency::select('id'));
                })
                ->where('product_service', 'LIKE', '%' . request('product_service') . '%')
                ->where('severity', 'LIKE', '%' . request('severity') . '%')
                ->whereBetween('created_at', [request('from') ?? '2001-05-17', request('till') ?? '2099-05-17'])
                ->latest()->get();

    return new TicketCollection($collection);
  }

  public function filter_vendors(Request $request)
  {
    $collection = Vendor::where('city', 'LIKE', '%' . request('city') . '%')
                        ->whereBetween('created_at', [request('from') ?? '2001-05-17', request('till') ?? '2099-05-17'])
                        ->latest()->get();
    return new VendorCollection($collection);
  }

  public function filter_users(Request $request)
  {
    if(request('user_type') == null){
      $collection = User::whereIn('agency_id', request('agencies') ?? Agency::select('id'))
                    ->where('role', request('user_type'))
                    ->whereBetween('created_at', [request('from') ?? '2001-05-17', request('till') ?? '2099-05-17'])
                    ->latest()->get();
    }
    elseif(request('account_status') == null){
      $collection = User::whereIn('agency_id', request('agencies') ?? Agency::select('id'))
                ->where('status', request('account_status'))
                ->whereBetween('created_at', [request('from') ?? '2001-05-17', request('till') ?? '2099-05-17'])
                ->latest()->get();
    }else{
      $collection = User::whereIn('agency_id', request('agencies') ?? Agency::select('id'))
      ->where('role', request('user_type'))
      ->where('status', request('account_status'))
      ->whereBetween('created_at', [request('from') ?? '2001-05-17', request('till') ?? '2099-05-17'])
      ->latest()->get();
    }


    return new UserCollection($collection);
  }

  public function filter_activities(Request $request)
  {

      $collection = ActivityLog::whereHas('user', function($q) {
                                  $q->where('role', request('user_type'));
                                  $q->whereIn('agency_id', request('agencies') ?? Agency::select('id'));
                              })
                              ->whereBetween('created_at', [request('from') ?? '2001-05-17', request('till') ?? '2099-05-17'])
                              ->latest()->get();
      return new ActivityCollection($collection);
  }


}
