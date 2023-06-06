<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tickets = ticket::all();
        // $tickets = ticket::orderBy('id', 'DESC')->get();
        $tickets = ticket::orderBy('updated_at', 'DESC')->paginate(10);
        // $tickets = ticket::sortable()->paginate(10);
        return view('index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tickets = ticket::all();
        return view('create',compact('tickets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$validatedData = $request->validate([
            'line_number' => 'required',
            'from' => 'required',
			'to' => 'required|different:from',
            'departure_date' => 'required|after_or_equal:today',
            'class' => 'required',
			'seat' => 'required|integer|between:1,100|unique:tickets,seat',
			'price' => 'required|integer|between:5,30',
            'discount' => 'required',
         ],['line_number.required' => 'Please enter line number.','to.different' => 'From and To destinations must be different.','departure_date.required'=>'Please select a departure date.','departure_date.after_or_equal'=>'Ticket can only be created for today or a later date.','seat.required' => 'Please select a seat number.','seat.integer' => 'Seat must be a number','seat.between' => 'Seat number must be between 1 and 100','seat.unique' => 'This seat is already reserved.','price.required' => 'Please select ticket price.','price.integer' => 'Цената на билет трябва да е цяло число','price.between' => 'Цената на билет може да е от 5 до 30 лева.']);
        $ticket = ticket::create($validatedData);
        return redirect('/tickets')->with('success', 'Ticket was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
		if(auth()->user()->isAdmin != 1)

        return redirect('/tickets')->with('error', 'You do not have access to this function!');        
        $ticket = ticket::findOrFail($id);
        $tickets = ticket::all();
        return view('edit', compact('ticket'),compact('tickets'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		if(auth()->user()->isAdmin != 1)

           return redirect('/tickets')->with('error', 'You do not have access to this function!');
        $validatedData = $request->validate([
            'line_number' => 'required',
            'from' => 'required|different:to',
			'to' => 'required',
            'departure_date' => 'required|after_or_equal:today',
            'class' => 'required',
			'seat' => 'required|integer|between:1,100|unique:tickets,seat',
			'price' => 'required|integer|between:5,30',
			'discount' => 'required',
        ],['line_number.required' => 'Моля въведете номер на влака.','line_number.integer'=>'Номерът на влака трябва да е число.','line_number.between' => 'Номерът на влака трябва да е от 8000 до 16000','from.different' => 'Началната и крайна гара трябва да са различни.','departure_date.after_or_equal'=>'Ticket can only be reissued for today or a later date.','seat.required' => 'Моля въведете номер място.','seat.integer' => 'Номерът на мястото трябва да число','seat.between' => 'Номерът на мястото трябва да е от 1 до 100','seat.unique' => 'This seat is already reserved.','price.integer' => 'Цената на билет трябва да е цяло число','price.between' => 'Цената на билет може да е от 5 до 30 лева.']);
        ticket::whereId($id)->update($validatedData);
        return redirect('/tickets')->with('success', 'Ticket data was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		if(auth()->user()->isAdmin != 1)

           return redirect('/tickets')->with('error', 'You do not have access to this function!');        
        $ticket = ticket::findOrFail($id);
        $ticket->delete();
        return redirect('/tickets')->with('success', 'Ticket was successfully deleted!');
    }
}
