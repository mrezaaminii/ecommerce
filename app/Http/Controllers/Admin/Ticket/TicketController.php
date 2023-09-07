<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketRequest;
use App\Models\Admin\Ticket\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function newTickets()
    {
        $tickets = Ticket::where('seen',0)->get();
        foreach ($tickets as $newTicket){
            $newTicket->seen = 1;
            $result = $newTicket->save();
        }
        return view('admin.ticket.index',compact('tickets'));
    }

    public function openTickets()
    {
        $tickets = Ticket::where('status',0)->get();
        return view('admin.ticket.index',compact('tickets'));
    }

    public function closeTickets()
    {
        $tickets = Ticket::where('status',1)->get();
        return view('admin.ticket.index',compact('tickets'));
    }

    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.ticket.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('admin.ticket.show',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function change(Ticket $ticket)
    {
        $ticket->status = $ticket->status == 0 ? 1 : 0;
        $result = $ticket->save();
        return redirect()->route('admin.ticket.index')->with('swal-success','تغییر شما با موفقیت انجام شد');
    }

    public function answer(Ticket $ticket,TicketRequest $request){
        $inputs = $request->all();
        $inputs['subject'] = $ticket->subject;
        $inputs['description'] = $request->description;
        $inputs['seen'] = 1;
        $inputs['reference_id'] = $ticket->reference_id;
        $inputs['user_id'] = 1;
        $inputs['category_id'] = $ticket->category_id;
        $inputs['priority_id'] = $ticket->priority_id;
        $inputs['ticket_id'] = $ticket->id;
        $comment = Ticket::create($inputs);
        return redirect()->route('admin.ticket.index')->with('swal-success','پاسخ شما با موفقیت ثبت شد');
    }
}
