@extends('layouts.app')
@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Reminders</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="#" class="fw-normal"></a></li>
                </ol>
                <button class="btn btn-danger  ms-3 waves-effect waves-light text-white" type="button" data-toggle="modal" data-target="#drug"><i class="fa fa-bell"></i> Set Drug Reminder</button>
                <div class="modal fade" id="drug" tabindex="-1" role="dialog" aria-labelledby="drug" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="drugModal">Create Drug Reminder</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('reminder.store',['category'=>'Drug'])}}">
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-md-6"><label for="">Title</label></div>
                                        <div class="col-md-6">
                                            <input type="text" name="title" class="form-control">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6"><label for="">Start Date</label></div>
                                        <div class="col-md-6">
                                            <input type="date" name="from" id="" class="form-control">
                                            @error('from')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6"><label for="">End Date</label></div>
                                        <div class="col-md-6">
                                            <input type="date" name="to" id="" class="form-control">
                                            @error('to')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6"><label for="">Time</label></div>
                                        <div class="col-md-6">
                                            <input type="time" name="time" id="" class="form-control">
                                            @error('time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="btn btn-info ms-3 waves-effect waves-light text-white" type="button" data-toggle="modal" data-target="#appoint"><i class="fa fa-clock"></i> Set Appointment Reminder</button>
                <div class="modal fade" id="appoint" tabindex="-1" role="dialog" aria-labelledby="appoint" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="patientModal">Create Appointment Reminder</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('reminder.store',['category'=>'Appointment'])}}">
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-md-6"><label for="">Title</label></div>
                                        <div class="col-md-6">
                                            <input type="text" name="title" class="form-control">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6"><label for="">Date</label></div>
                                        <div class="col-md-6">
                                            <input type="date" name="from" id="" class="form-control">
                                            @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6"><label for="">Time</label></div>
                                        <div class="col-md-6">
                                            <input type="time" name="time" id="" class="form-control">
                                            @error('time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Reminder</th>
                                <th class="border-top-0">Category</th>
                                <th class="border-top-0">Time</th>
                                <th class="border-top-0">Start Date</th>
                                <th class="border-top-0">End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $key=>$item)
                            <tr class="{{($item->category)=='Drug'?'table-danger':'table-info'}}">
                                <td>{{$key+1}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->category}}</td>
                                <td>{{date_format(date_create($item->at),'H:i a')}}</td>
                                <td>{{date_format(date_create($item->from),'l M jS, Y')}}</td>
                                <td>{{date_format(date_create($item->to),'l M jS, Y')}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection