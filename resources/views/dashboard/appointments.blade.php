@extends('layouts.app')
@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Appointments</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="#" class="fw-normal"></a></li>
                </ol>
                <button class="btn btn-danger  ms-3 waves-effect waves-light text-white" type="button" data-bs-toggle="modal" data-bs-target="#appointment"><i class="fa fa-plus"></i> Appointment</button>
                <div class="modal fade" id="appointment" tabindex="-1" role="dialog" aria-labelledby="appointment" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="appointmentModal">Create Appointment</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('appointments.store',['category'=>'Drug'])}}">
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <label for="">Service</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="appointmentfor" class="form-select" id="">
                                                <option selected disabled>Choose Service</option>
                                                <?php $departments = ['Test', 'Prescription', 'Counselling', 'Consultation']; ?>
                                                @foreach($departments as $dep)
                                                <option value="Auto-immune Disease {{$dep}}">Auto-immune Disease {{$dep}}</option>
                                                @endforeach
                                            </select>
                                            @error('appointmentfor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <label for="">Date</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" name="date" id="" class="form-control">
                                            @error('from')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <label class="control-label" for="time">Preferred Time</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="time" name="time" class="form-select">
                                                <?php $times = ['8:00am to 9:00am', '9:00am to 10:00am', '10:00am to 11:00am', '11:00am to 12:00pm', '2:00pm to 3:00pm', '3:00pm to 4:00pm']; ?>
                                                <option selected disabled>Select Suitable Time</option>
                                                @foreach($times as $time)
                                                <option value="{{$time}}">{{$time}}</option>
                                                @endforeach
                                            </select>
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
                                @if((Auth()->user()->role != 'Patient')&&(Auth()->user()->isApproved == 1))
                                <th class="border-top-0">Patient Name</th>
                                <th class="border-top-0">Patient Email</th>
                                <th class="border-top-0">Patient Contact</th>
                                @endif
                                <th class="border-top-0">Service</th>
                                <th class="border-top-0">Preferred Time</th>
                                <th class="border-top-0">Preferred Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $key=>$item)
                            <tr class="{{$item->confirmed==0?'bg-secondary':'bg-success'}} text-light">
                                <td>{{$key+1}}</td>
                                @if((Auth()->user()->role != 'Patient')&&(Auth()->user()->isApproved == 1))
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->user->email}}</td>
                                <td>{{$item->user->contact}}</td>
                                @endif
                                <td>{{$item->appointmentfor}}</td>
                                <td>{{$item->time}}</td>
                                <td>{{$item->date}}</td>
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