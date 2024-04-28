<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    
    public function index()
    {
        $items=Reminder::where([['at','>=',date('H:i')],['from','<=',date('Y-m-d')],['to','>=',date('Y-m-d')]])->get();
        return view('dashboard.reminders',compact('items'));
    }

    public function create()
    {
        return date('Y-m-d H:i:s');
    }

    public function store(Request $request)
    {
        Reminder::create([
            'user_id'=>Auth()->user()->id,
            'title'=>request()->title,
            'category'=>request()->category,
            'at'=>request()->time,
            'from'=>request()->from,
            'to'=>request()->to,
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
