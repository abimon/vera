<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('sender_id',Auth()->user()->id)->orWhere('recepient_id',Auth()->user()->id)->get();
        if(Auth()->user()->role == 'Patient'){
            $users= User::where([['id','!=',Auth()->user()->id],['role','Doctor']])->get();
        }
        else{
            $users=User::where('id','!=',Auth()->user()->id)->get();
        }
        return view('dashboard.chat',compact('messages','users'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        Message::create([
            'sender_id'=>Auth()->user()->id,
            'recepient_id'=>request()->userId,
            'message'=>request()->message
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
