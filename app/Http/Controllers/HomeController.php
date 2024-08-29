<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Mealplan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $meals = Mealplan::all();
        if((Auth()->user()->role=='Admin')||(Auth()->user()->role=='Doctor')){
            $appoints=Appointment::where([['date','>=',date('Y-m-d')]])->get();
        }
        else{
            $appoints=Appointment::where([['date','>=',date('Y-m-d')],['user_id',Auth()->user()->id]])->get();
        }
        return view('home',compact('meals','appoints'));
    }
}
