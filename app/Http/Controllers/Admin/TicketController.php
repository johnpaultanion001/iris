<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ApiController;
use App\Http\Resources\TicketResource;
use App\Http\Resources\TicketCollection;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\AgencyCollection;
use App\Http\Resources\ViolationResource;
use App\Models\Ticket;
use App\Models\Vendor;
use App\Models\ReportedBy;
use App\Models\Violation;
use App\Models\Inbox;
use App\Models\Agency;
use App\Models\TicketAssignAgency;
use App\Models\TicketComment;
use App\Models\TicketDocumentFile;
use Illuminate\Support\Facades\Storage;

class TicketController extends ApiController
{
    public function index(Request $request)
    {
      if(auth("api")->user()->role == "SUPER_ADMIN"){
        $collection = Ticket::latest()->get();

      }else{
        $collection = Ticket::whereHas('agencies', function ($query) {
                        return $query->where('agency_id', '=', auth("api")->user()->agency_id);
                    })->latest()->get();
      }
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
            //'additional_documents_file' => 'required',
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
            "agencies"  => "required",

        ]);

        if ($validator->fails()) {
          return response()->json([
            'status' => 200,
            'message' => ['validationFailed' => true, 'errors' => $validator->errors()],
          ], 200);
        }

        try {
            $vendor = Vendor::updateOrCreate(
                [
                  'email' => request('email_address'),
                ],
                [
                  'vendor_name' => request('vendor_name'),
                  'email' => request('email_address'),
                  'mobile_number' => request('mobile_number'),
                  'city' => request('city'),
                ]
            );
            $reportedBy = ReportedBy::updateOrCreate(
                [
                  'email' => request('reported_email_address'),
                ],
                [
                  'first_name' => request('reported_first_name'),
                  'last_name' => request('reported_last_name'),
                  'email' => request('reported_email_address'),
                  'mobile_number' => request('reported_mobile_number'),
                ]

            );

            $ticket = Ticket::create([
                'user_id'         => auth("api")->user()->id,
                'product_service' => request('product_service'),
                'complaint' => request('complaint'),
                'platform' => request('platform'),
                'link' => request('link'),
                'vendor_id' => $vendor->id,
                'reported_by_id' => $reportedBy->id,
                'remarks' => request('remarks'),
            ]);
            if(request('additional_documents_file')){
              foreach (request('additional_documents_file') as $docu) {
                $path = Storage::disk('s3')->put('documents_file', $docu);
                TicketDocumentFile::create([
                  'ticket_id' => $ticket->id,
                  'document_file' => $path,
                ]);
              }
            }



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
              $agencies = Agency::where('id', $agency['agency_id'])->first();
              foreach($agencies->users()->get() as $user)
              {
                if($user->id != auth("api")->user()->id){
                  Inbox::create(
                    [
                        "user_id" => $user->id,
                        "url" => "/api/v1/tickets/".$ticket->id,
                        "message" => "You have been invited to collaborate on Intel#".$ticket->id." by ".auth("api")->user()->name." from ".auth("api")->user()->agency->code ?? "",
                    ]
                  );
                }

              }
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


      return new TicketResource($ticket);
    }


    public function update_ticket(Request $request, Ticket $ticket)
    {
        // Validate all the required parameters have been sent.
        $validator = Validator::make($request->all(), [
          'product_service' => 'required',
          'complaint' => 'required',
          'platform' => 'required',
          'link' => 'required',
          'additional_documents_file' => 'required',

          // reported by info
          'reported_first_name' => 'required',
          'reported_last_name' => 'required',
          'reported_email_address' => ['required', 'email', 'max:255' , 'unique:reported_bies,email,'.$ticket->reported_by_id],
          'reported_mobile_number' => ['required', 'string', 'min:8','max:11', 'unique:reported_bies,mobile_number,'.$ticket->reported_by_id],

        ]);
        if ($validator->fails()) {
          return response()->json([
            'status' => 200,
            'message' => ['validationFailed' => true, 'errors' => $validator->errors()],
          ], 200);
        }
        $ticket->update([
            'product_service' => request('product_service'),
            'complaint' => request('complaint'),
            'platform' => request('platform'),
            'link' => request('link'),
            'remarks' => request('remarks'),
        ]);
        TicketDocumentFile::where('ticket_id',$ticket->id)->delete();
        foreach(request('additional_documents_file') as $docu){
          $path = Storage::disk('s3')->put('documents_file', $docu['file']);
            TicketDocumentFile::create([
              'ticket_id' => $ticket->id,
              'document_file' => $path,
            ]);
        }

        ReportedBy::find($ticket->reported_by_id)->update(
              [
                'first_name' => request('reported_first_name'),
                'last_name' => request('reported_last_name'),
                'email' => request('reported_email_address'),
                'mobile_number' => request('reported_mobile_number'),
              ]
        );
        $data = [
          'tiket_id' => $ticket->id,
          'tiket_no' => $ticket->id,
        ];

        return $this->responseResourceUpdated('Ticket updated successfully',$data);


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
          'status' => ['required', 'in:FOR_REVIEW,ACKNOWLEDGED,ON_GOING,RESOLVED,INVALID'],
      ]);

      if ($validator->fails()) {
        return $this->responseUnprocessable($validator->errors());
      }

      $ticket = Ticket::where('id',  request('ticket_id'))->first();
      if ($ticket == null) {
        return $this->ticketNotFound();
      }

      $ticket->update([
        'status' => request('status'),
      ]);

      $ticket_comment = TicketComment::create([
        'user_id' => auth("api")->user()->id,
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

    public function update_follow(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'ticket_id' => 'required',
          'isFollow' => ['required', 'in:0,1'],
      ]);

      if ($validator->fails()) {
        return $this->responseUnprocessable($validator->errors());
      }

      $ticket = Ticket::where('id',  request('ticket_id'))->first();
      if ($ticket == null) {
        return $this->ticketNotFound();
      }

      $ticket->update([
        'isFollow' => request('isFollow'),
      ]);

      $data = [
        'tiket_id' => $ticket->id,
        'tiket_no' => $ticket->id,
        'isFollow' => $ticket->isFollow,
      ];

      return $this->responseResourceUpdated('Follow updated successfully',$data);
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


      $ticket_comment = TicketComment::create([
        'user_id' => auth("api")->user()->id,
        'ticket_id' => $ticket->id,
        'comment' => request('comment'),
      ]);



      return new CommentCollection($ticket->comments()->latest()->get());
    }
    public function product_service(Request $request){
      $collection = Ticket::select('product_service')
              ->groupBy('product_service')
              ->orderBy('product_service', 'ASC')->get();
      return response()->json([
            'data' => $collection,
      ], 200);
    }

    public function assigned_agencies(Request $request){
      $validator = Validator::make($request->all(), [
        'ticket_id' => 'required',
        'agencies' => 'required',
      ]);

      if ($validator->fails()) {
        return $this->responseUnprocessable($validator->errors());
      }

      $ticket = Ticket::where('id',  request('ticket_id'))->first();
      if ($ticket == null) {
        return $this->ticketNotFound();
      }
      TicketAssignAgency::where('ticket_id', $ticket->id)
                        ->whereNotIn('agency_id', request('agencies'))
                        ->delete();
      foreach(request('agencies') as $agency){
        TicketAssignAgency::updateOrCreate(
          [
          'ticket_id' => $ticket->id,
          'agency_id' => $agency['agency_id'],
          ],
          [
          'ticket_id' => $ticket->id,
          'agency_id' => $agency['agency_id'],
          ]
        );

      }
      $data = [
        'tiket_id' => $ticket->id,
        'tiket_no' => $ticket->id,
        'assigned_agencies' =>
        new AgencyCollection($ticket->agencies()->get()),
      ];



      return $this->responseResourceUpdated('Updated successfully',$data);
    }

    public function violations(Request $request){
      $ticket = Ticket::where('id',  request('ticket_id'))->first();
      if ($ticket == null) {
        return $this->ticketNotFound();
      }

      Violation::where('ticket_id', $ticket->id)->delete();
      foreach(request('violations') as $vio){

        Violation::updateOrCreate(
          [
            'ticket_id' => $ticket->id,
            'violation' => $vio['violation'],
          ],
          [
            'ticket_id' => $ticket->id,
            'violation' => $vio['violation'],
            'amount' => $vio['amount'],
          ]
        );
      }
      $data = [
        'tiket_id' => $ticket->id,
        'tiket_no' => $ticket->id,
        'violations' =>
          new ViolationResource($ticket->violations()->get()),

      ];



      return $this->responseResourceUpdated('Updated successfully',$data);
    }



}
