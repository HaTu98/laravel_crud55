<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;

class TicketController extends Controller
{  
	public function create()
	{
   		return view('user.create');
	}

	 public function store(Request $request)
    {
        $ticket = new Ticket();
        $data = $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
       
        $ticket->saveTicket($data);
        return redirect('/home')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }

	public function index()
    {
        $tickets = Ticket::where('user_id', auth()->user()->id)->get();
        
        return view('user.index',compact('tickets'));
    }

    public function edit($id)
    {
        $ticket = Ticket::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('user.edit', compact('ticket', 'id'));
    }
}
