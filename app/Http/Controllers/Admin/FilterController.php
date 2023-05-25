<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Resources\TicketCollection;
use App\Http\Resources\VendorCollection;
use App\Http\Resources\UserCollection;
use App\Models\Ticket;
use App\Models\Vendor;
use App\Models\User;

class FilterController extends ApiController
{
  public function filter_tickets(Request $request)
  {
    $collection = Ticket::whereHas('agencies', function ($query) {
                    return $query->whereIn('agency_id', request('agencies') ?? []);
                })
                ->where('product_service', 'LIKE', '%' . request('product_service') . '%')
                ->where('severity', 'LIKE', '%' . request('severity') . '%')
                ->whereBetween('created_at', [request('from'), request('till')])
                ->latest()->get();

    return new TicketCollection($collection);
  }

  public function filter_vendors(Request $request)
  {
    $collection = Vendor::where('city', 'LIKE', '%' . request('city') . '%')
                        ->whereBetween('created_at', [request('from'), request('till')])
                        ->latest()->get();
    return new VendorCollection($collection);
  }

  public function filter_users(Request $request)
  {
    $collection = User::whereIn('agency_id', request('agencies') ?? [])
                ->where('role',  request('user_type'))
                ->where('status', request('account_status'))
                ->whereBetween('created_at', [request('from'), request('till')])
                ->latest()->get();

    return new UserCollection($collection);
  }



}
