<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\APIController;
use App\Http\Resources\TicketResource;
use App\Http\Resources\TicketCollection;
use App\Http\Resources\CommentCollection;

use App\Models\Ticket;
use App\Models\Vendor;
use App\Models\ReportedBy;
use App\Models\Violation;
use App\Models\TicketAssignAgency;
use App\Models\TicketComment;



class TicketController extends ApiController
{
    public function index(Request $request)
    {
      $collection = Ticket::where('user_id', auth()->user()->id);
      $collection = $collection->latest()->paginate();

      return new TicketCollection($collection);
    }

    public function store(Request $request)
    {
        // Validate all the required parameters have been sent.
        $validator = Validator::make($request->all(), [
            'product_service' => 'required',
            'complaint' => 'required',
            'platform' => 'required',
            'link' => 'required',
            'additional_documents_file' => 'required',
            // vendor info
            'vendor_name' => 'required',
            'email_address' => ['required', 'email', 'max:255' ],
            'mobile_number' => ['required', 'string', 'min:8','max:11'],
            'city' => 'required',
            // reported by info
            'reported_first_name' => 'required',
            'reported_last_name' => 'required',
            'reported_email_address' => ['required', 'email', 'max:255' ],
            'reported_mobile_number' => ['required', 'string', 'min:8','max:11'],

        ]);

        if ($validator->fails()) {
            return $this->responseUnprocessable($validator->errors());
        }

        try {
            $vendor = Vendor::create([
              'vendor_name' => request('vendor_name'),
              'email' => request('email_address'),
              'mobile_number' => request('mobile_number'),
              'city' => request('city'),
            ]);
            $reportedBy = ReportedBy::create([
              'first_name' => request('reported_first_name'),
              'last_name' => request('reported_last_name'),
              'email' => request('reported_email_address'),
              'mobile_number' => request('reported_mobile_number'),
            ]);

            $ticket = Ticket::create([
                'user_id'         => auth()->user()->id,
                'product_service' => request('product_service'),
                'complaint' => request('complaint'),
                'platform' => request('platform'),
                'link' => request('link'),
                'additional_documents_file' => request('additional_documents_file'),
                'vendor_id' => $vendor->id,
                'reported_by_id' => $reportedBy->id,
                'remarks' => request('remarks'),
            ]);
            foreach(request('violations') as $vio){
              Violation::create([
                'ticket_id' => $ticket->id,
                'violation' => $vio['violation'],
                'amount' => $vio['amount'],

              ]);
            }
            foreach(request('agencies') as $agency){
              TicketAssignAgency::create([
                'ticket_id' => $ticket->id,
                'agency_id' => $agency['agency_id'],
              ]);
            }


            $data = [
                'id' => $ticket->id,
                'tiket_no' => $ticket->id,
                'created_by' => $ticket->user->name,
            ];

            return $this->responseResourceCreated($data);
        } catch (Exception $e) {
            return $this->responseServerError('Error creating resource.');
        }
    }


    public function show(Request $request, Ticket $ticket)
    {

      if (auth()->user()->id != $ticket->user_id) {
        return $this->ticketUnauthorized();
      }

      return new TicketResource($ticket);
    }


    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {

    }

    public function update_severity(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'ticket_id' => 'required',
          'severity' => ['required', 'in:LOW,MEDIUM,HIGH'],
      ]);

      if ($validator->fails()) {
        return $this->responseUnprocessable($validator->errors());
      }

      $ticket = Ticket::where('id',  request('ticket_id'))->first();
      if ($ticket == null) {
        return $this->ticketNotFound();
      }
      if (auth()->user()->id != $ticket->user_id) {
        return $this->ticketUnauthorized();
      }

      $ticket->update([
        'severity' => request('severity'),
      ]);

      $data = [
        'tiket_id' => $ticket->id,
        'tiket_no' => $ticket->id,
        'severity' => $ticket->severity,
      ];

      return $this->responseResourceUpdated('Severity updated successfully',$data);
    }

    public function update_status(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'ticket_id' => 'required',
          'status' => ['required', 'in:FOR_REVIEW,ACKNOWLEDGED,ON_GOING,RESOLVED,IVALID'],
      ]);

      if ($validator->fails()) {
        return $this->responseUnprocessable($validator->errors());
      }

      $ticket = Ticket::where('id',  request('ticket_id'))->first();
      if ($ticket == null) {
        return $this->ticketNotFound();
      }
      if (auth()->user()->id != $ticket->user_id) {
        return $this->ticketUnauthorized();
      }

      $ticket->update([
        'status' => request('status'),
      ]);

      $ticket_comment = TicketComment::create([
        'user_id' => auth()->user()->id,
        'ticket_id' => $ticket->id,
        'comment' => request('comment'),
      ]);

      $data = [
        'tiket_id' => $ticket->id,
        'tiket_no' => $ticket->id,
        'status' => $ticket->status,
        'comment' => $ticket_comment->comment,
      ];

      return $this->responseResourceUpdated('Status updated successfully',$data);
    }

    public function create_comment(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'ticket_id' => 'required',
      ]);

      if ($validator->fails()) {
        return $this->responseUnprocessable($validator->errors());
      }

      $ticket = Ticket::where('id',  request('ticket_id'))->first();
      if ($ticket == null) {
        return $this->ticketNotFound();
      }
      if (auth()->user()->id != $ticket->user_id) {
        return $this->ticketUnauthorized();
      }


      $ticket_comment = TicketComment::create([
        'user_id' => auth()->user()->id,
        'ticket_id' => $ticket->id,
        'comment' => request('comment'),
      ]);



      return new CommentCollection($ticket->comments()->latest()->get());
    }



}
