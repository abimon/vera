@extends('layouts.app')
@section('content')
<!-- ### $App Screen Content ### -->
<main class='main-content bgc-grey-100'>
  <div id='mainContent'>
    <div class="full-container">
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <div class="row fxw-nw pos-r">
            <!-- Sidebar -->

            <div class="col-3 bg-light p-2" id="">
              <div class="">
                <!-- Search -->
                <div class="bdB layer w-100">
                  <input type="text" placeholder="Search contacts..." name="chatSearch" class="form-control p-2">
                </div>
                <!-- List -->
                  <div style="max-height:80vh;overflow: scroll;">
                    @foreach($users as $k=>$user)
                    <div class="row m-2 d-flex justify-content-between" id="heading{{$k}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$k}}" aria-expanded="true" aria-controls="collapse{{$k}}">
                      <h6 class="">{{$user->name}}</h6>
                        @if($user->isOnline())
                        <small class="text-success">Online</small>
                        @else
                        <small class="text-secondary">Offline</small>
                        @endif
                    </div>
                    <!-- <hr> -->
                    @endforeach
                  </div>
              </div>
            </div>
            <!-- Chat Box -->
            <div class="col-9" id='chat-box'>
              @foreach($users as $k=>$user)
              <div id="collapse{{$k}}" class="accordion-collapse collapse {{$k==0?'show':''}}" aria-labelledby="heading{{$k}}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="layers h-100">
                    <div class="layer w-100">
                      <!-- Header -->
                      <div class="row  py-2 px-3 bg-white d-flex justify-content-between">
                        <div class="col-2">
                          <a href="" title="" id='chat-sidebar-toggle' class="me-3">
                            <i class="bi bi-list"></i>
                          </a>
                        </div>
                        <div class="col-4">
                          <h6 class="lh-1 mB-0">{{$user->name}}</h6>
                          @if($user->isOnline())
                          <i class="text-success">Online</i>
                          @else
                          <i class="text-secondary">Offline</i>
                          @endif
                        </div>
                        <div class="col-3 row">
                          <a href="" class="col-4" title="">
                            <i class="bi bi-camera-video"></i>
                          </a>
                          <a href="" class="col-4 td-n c-grey-900 cH-blue-500 fsz-md mR-30" title="">
                            <i class="bi bi-headset"></i>
                          </a>
                          <a href="" class="col-4 td-n c-grey-900 cH-blue-500 fsz-md" title="">
                            <i class="bi bi-three-dots"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div style="min-height: 70vh;">
                      <!-- Chat Box -->
                      <div class="p-2">
                        <!-- Chat Conversation -->
                        @foreach($messages as $message)
                        @if(($message->sender_id == $user->id) ||($message->recepient_id == $user->id))
                        <div class="row">
                          <div class="col-6">
                            @if($message->sender_id != Auth()->user()->id)
                            <div class="bg-light p-3">
                              <div>{{$message->message}}</div>
                              <div class="text-end">{{$message->created_at->diffForHumans()}}</div>
                            </div>
                            @endif
                          </div>
                          <div class="col-6">
                            @if($message->sender_id == Auth()->user()->id)
                            <div class="bg-light p-3">
                              <div>{{$message->message}}</div>
                              <div class="text-end">{{$message->created_at->diffForHumans()}}</div>
                            </div>
                            @endif
                          </div>
                        </div>
                        @endif
                        @endforeach
                      </div>
                    </div>
                    <div class="layer w-100">
                      <form action="{{route('message.store',['userId'=>($user->id)])}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                          <input type="text" name="message" class="form-control" placeholder="Say something ...">
                          <button class="input-group-text btn-info" type="submit"><i class="fa fa-paper-plane"></i></span>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
</main>
@endsection