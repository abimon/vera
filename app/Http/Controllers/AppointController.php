<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Appointment::where([['date','>=',date('Y-m-d')]])->get();
        return view('dashboard.appointments',compact('items'));
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
        Appointment::create([
            'user_id'=>Auth()->user()->id,
            'date'=>request()->date,
            'time'=>request()->time,
            'appointmentfor'=>request()->appointmentfor,
            'confirmed'=>false,
        ]);
        return redirect()->back()->with('message','Appointment made successifully');
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
