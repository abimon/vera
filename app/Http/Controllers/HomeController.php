<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Mealplan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $meals = Mealplan::all();
        $appoints=Appointment::where([['date','>=',date('Y-m-d')]])->get();
        return view('home',compact('meals','appoints'));
    }
}
