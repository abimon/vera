<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;

class PrescController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Prescription::all();
        $users = User::where('role','Patient')->get();
        return view('dashboard.prescription',compact('items','users'));
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
    public function store()
    {
        Prescription::create([
            'patient_id'=>request()->patient_id,
            'doctor_id'=>Auth()->user()->id,
            'drug'=>request()->drug,
            'dosage'=>request()->dosage,
            'times'=>request()->time,
            'start_date'=>request()->start_date,
            'end_date'=>request()->end_date
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
