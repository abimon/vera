@extends('layouts.app')
@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Prescriptions</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="#" class="fw-normal"></a></li>
                </ol>
                @if((Auth()->user()->role=='Admin')||(Auth()->user()->role=='Doctor'))
                <button type="button" data-toggle="modal" data-target="#prescribe" class="btn btn-info  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Prescribe</button>
                <div class="modal fade" id="prescribe" tabindex="-1" role="dialog" aria-labelledby="prepModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="patientModal"><i class="fa fa-add"></i> Prescription</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="/patient/addPrescription">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Full Name</label>
                                        <select class="form-select" name='patient_id' aria-label="patient">
                                            <option selected disabled>Select Patient</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="prep">Prescription</label>
                                        <input type="text" name='presc' class="form-control" aria-describedby="">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Start Date</label>
                                        <input type="date" name='start_date' class="form-control" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">End Date</label>
                                        <input type="date" name='end_date' class="form-control" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
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
                                <th class="border-top-0">Patient Name</th>
                                <th class="border-top-0">Patient Email</th>
                                <th class="border-top-0">Patient Contact</th>
                                <th class="border-top-0">Prescription</th>
                                <th class="border-top-0">End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->contact}}</td>
                                <td>{{$item->prescription}}</td>
                                <td>{{$item->end_date}}</td>
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