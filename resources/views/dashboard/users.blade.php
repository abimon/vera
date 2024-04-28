@extends('layouts.app')
@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Users</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="#" class="fw-normal"></a></li>
                </ol>
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
                                <th class="border-top-0">Full Name</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Contact</th>
                                <th class="border-top-0">Role</th>
                                @if(Auth()->user()->role=='Admin')
                                <th class="border-top-0">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users->where(('id'), '!=', (Auth()->user()->id)) as $key=>$user)
                            
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->contact}}</td>
                                <td>{{$user->role}}</td>
                                @if((Auth()->user()->role=='Admin')&&($user->role!='Doctor'))
                                <td><a href="/user/makeDoctor/{{$user->id}}">Make Doctor</a></td>
                                @endif
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