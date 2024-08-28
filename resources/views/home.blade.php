@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <div class="page-breadcrumb bg-white">
                        <div class="d-md-flex justify-content-end">
                            @if((Auth()->user()->role=='Admin')||(Auth()->user()->role=='Doctor'))
                            <button type="button" data-bs-toggle="modal" data-bs-target="#mealplan" class="btn btn-success  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white"><i class="fa fa-plus"></i> Mealplan</button>
                            <div class="modal fade" id="mealplan" tabindex="-1" role="dialog" aria-labelledby="mealplan" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="patientModal">Create Meal plan</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" action="{{route('meals.store')}}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6"><input type="text" name="disease" id="" class="form-control" placeholder="Auto Immune Disease Name"></div>
                                                    <div class="col-md-6">
                                                        <select name="mealtype" id="" class="form-select">
                                                            <option value="" selected disabled>Select Meal Type</option>
                                                            <option value="Vegetarian">Vegetarian</option>
                                                            <option value="Ovo-vegan">Ovo-vegan</option>
                                                            <option value="Lact-vegan">Lacto-vegan</option>
                                                        </select>
                                                        @error('mealtype')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <table class="table table-responsive table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Day</th>
                                                            <th class="text-center">Breakfast</th>
                                                            <th class="text-center">Lunch</th>
                                                            <th class="text-center">Supper</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for($i=1;$i<=7;$i++) <tr>
                                                            <td>Day {{$i}}</td>
                                                            <td>
                                                                <input type="text" name="breakfast[{{$i}}]" placeholder="Day {{$i}} Breakfast" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="lunch[{{$i}}]" placeholder="Day {{$i}} Lunch" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="supper[{{$i}}]" placeholder="Day {{$i}} Supper" class="form-control">
                                                            </td>
                                                            </tr>
                                                            @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-between">
                            <div class="card col-md-4 p-4 col-8">
                                <h4 class="page-title"><b>Appointments Due</b></h4>
                                @foreach($appoints as $k=>$appoint)
                                <p class="{{$appoint->confirmed==1?'text-info':'text-danger'}}">{{$k+1}}. {{$appoint->appointmentfor}} at {{$appoint->time}}</p>
                                @endforeach
                            </div>
                            <div class="card col-md-8 p-4 col-8">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-8 p-2">
                                        <h4 class="page-title">Available Meal Plans</h4>
                                        @foreach($meals as $i=>$meal)
                                        {{$i+1}}. <a href="{{route('meals.show',$meal->id)}}">{{$meal->mealtype}} mealplan for {{$meal->disease}} patients</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection