<?php

namespace App\Http\Controllers;

use App\Models\Mealplan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $meals = Mealplan::all();
        return view('home',compact('meals'));
    }
}
