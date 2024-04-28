@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5" style="min-height: 600px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="mt-5">
                    <div class="text-uppercase text-center text-success">
                        <h1>{{$mealtype}} meal-plan for {{$disease}}</h1>
                        <small class="text-capitalize text-info text-end"><i>By Dr. {{$doc}}</i></small>
                    </div>
                </div>
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Day</th>
                            <th class="text-center">Breakfast</th>
                            <th class="text-center">Lunch</th>
                            <th class="text-center">Supper</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($meals as $key=>$meal) 
                        <tr>
                            <td class="text-center">Day {{$key+1}}</td>
                            <td class="text-center">{{$meal['brf']}}</td>
                            <td class="text-center">{{$meal['lunch']}}</td>
                            <td class="text-center">{{$meal['supper']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection