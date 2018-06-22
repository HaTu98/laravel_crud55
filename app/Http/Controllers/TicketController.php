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

    public function saveTicket($data)
	{
        $this->user_id = auth()->user()->id;
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->save();
        return 1;
	}
}
