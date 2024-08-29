<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Prescription;
use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    
    public function index()
    {
        $items=Reminder::where([['at','>=',date('H:i')],['from','<=',date('Y-m-d')]])->get();
        $prescribes = Prescription::where('patient_id',Auth()->user()->id)->get();
        $appoints = Appointment::where('user_id',Auth()->user()->id)->get();
        return view('dashboard.reminders',compact('items','prescribes','appoints'));
    }

    public function create()
    {
        return date('Y-m-d H:i:s');
    }

    public function store(Request $request)
    {
        // dd(request());
        Reminder::create([
            'user_id'=>Auth()->user()->id,
            'title'=>request()->title,
            'category'=>request()->category,
            'at'=>request()->time,
            'from'=>request()->from,
            'to'=>request()->from,
        ]);
        return redirect()->back()->with('success','Reminders set successiful');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
