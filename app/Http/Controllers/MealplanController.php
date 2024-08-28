<?php

namespace App\Http\Controllers;

use App\Models\Mealplan;
use Illuminate\Http\Request;

class MealplanController extends Controller
{
    public function index()
    {
        $items = Mealplan::all();
        return view('dashboard.mealplan',compact('items'));
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
        $meals=[];
        $days=[1,2,3,4,5,6,7];
        foreach($days as $key){
            array_push($meals,['brf'=>request()->breakfast[$key],'lunch'=>request()->lunch[$key],'supper'=>request()->supper[$key]]);
        }
        Mealplan::create([
            'doc_id'=>Auth()->user()->id,
            'disease'=>request()->disease,
            'mealtype'=>request()->mealtype,
            'plan'=>json_encode($meals),
            'duration'=>'One Week'
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $meal= Mealplan::findOrFail($id);
        $meals = json_decode($meal->plan);
        return view('dashboard.mealplan', compact('meal','meals'));
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
