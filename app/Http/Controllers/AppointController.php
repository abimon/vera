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
        if((Auth()->user()->role=='Admin')||(Auth()->user()->role=='Doctor')){
            $items=Appointment::where([['date','>=',date('Y-m-d')]])->get();
        }
        else{
            $items=Appointment::where([['date','>=',date('Y-m-d')],['user_id',Auth()->user()->id]])->get();
        }
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
    public function update($id)
    {
        // dd(request());
        $app=Appointment::findOrFail($id);
        
        if(request('date')!=null){
            $app->date=request('date');
        }
        if(request('time')!=null){
            $app->time=request('time');
        }
        if(request('confirmed')!=null){
          $app->confirm = !($app->confirm);
        }
        $app->update();
        return redirect()->back()->with('message','Appointment updated successfully.');
    }
    public function approve($id){
        $app=Appointment::findOrFail($id);
        $app->confirmed = !($app->confirmed);
        $app->update();
        return redirect()->back()->with('message','Appointment updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
