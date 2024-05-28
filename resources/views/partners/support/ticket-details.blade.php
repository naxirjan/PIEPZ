@extends('layouts/layoutMaster')

@section('title', 'Chat - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-chat.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-chat.js')}}"></script>
@endsection

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Partner /</span> Ticket / <small>{{(!empty($data->title) ? $data->title : "")}}</small>
    <!-- Back -->
    <a href="/partner/tickets" type="button" style="float:right;"
       class="btn rounded-pill btn-icon btn-label-primary waves-effect" data-bs-toggle="tooltip"
       data-bs-placement="left" data-bs-original-title="Back">
      <i class="ti ti-arrow-back"></i>
    </a>
  </h4>
<style>
  .chat-box {
         display: flex;
         flex-direction: column;
         max-height: 800px;
         overflow-y: scroll;
         }
  </style>
<div class="app-chat card overflow-hidden">
  <div class="row g-0">
    <!-- Sidebar Left -->
    <div class="col app-chat-sidebar-left app-sidebar overflow-hidden" id="app-chat-sidebar-left">
      <div class="chat-sidebar-left-user sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
        <div class="avatar avatar-xl avatar-online">
          <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
        </div>
        <h5 class="mt-2 mb-0">John Doe</h5>
        <small>Admin</small>
        <i class="ti ti-x ti-sm cursor-pointer close-sidebar" data-bs-toggle="sidebar" data-overlay data-target="#app-chat-sidebar-left"></i>
      </div>
      <div class="sidebar-body px-4 pb-4">
        <div class="my-4">
          <p class="text-muted text-uppercase">About</p>
          <textarea id="chat-sidebar-left-user-about" class="form-control chat-sidebar-left-user-about mt-3" rows="4" maxlength="120">Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.</textarea>
        </div>
        <div class="my-4">
          <p class="text-muted text-uppercase">Status</p>
          <div class="d-grid gap-1">
            <div class="form-check form-check-success">
              <input name="chat-user-status" class="form-check-input" type="radio" value="active" id="user-active" checked>
              <label class="form-check-label" for="user-active">Active</label>
            </div>
            <div class="form-check form-check-danger">
              <input name="chat-user-status" class="form-check-input" type="radio" value="busy" id="user-busy">
              <label class="form-check-label" for="user-busy">Busy</label>
            </div>
            <div class="form-check form-check-warning">
              <input name="chat-user-status" class="form-check-input" type="radio" value="away" id="user-away">
              <label class="form-check-label" for="user-away">Away</label>
            </div>
            <div class="form-check form-check-secondary">
              <input name="chat-user-status" class="form-check-input" type="radio" value="offline" id="user-offline">
              <label class="form-check-label" for="user-offline">Offline</label>
            </div>
          </div>
        </div>
        <div class="my-4">
          <p class="text-muted text-uppercase">Settings</p>
          <ul class="list-unstyled d-grid gap-2 me-3">
            <li class="d-flex justify-content-between align-items-center">
              <div>
                <i class='ti ti-message me-1'></i>
                <span class="align-middle">Two-step Verification</span>
              </div>
              <label class="switch switch-primary me-4">
                <input type="checkbox" class="switch-input" checked="" />
                <span class="switch-toggle-slider">
                  <span class="switch-on"></span>
                  <span class="switch-off"></span>
                </span>
              </label>
            </li>
            <li class="d-flex justify-content-between align-items-center">
              <div>
                <i class='ti ti-bell me-1'></i>
                <span class="align-middle">Notification</span>
              </div>
              <label class="switch switch-primary me-4">
                <input type="checkbox" class="switch-input" />
                <span class="switch-toggle-slider">
                  <span class="switch-on"></span>
                  <span class="switch-off"></span>
                </span>
              </label>
            </li>
            <li>
              <i class="ti ti-user-plus me-1"></i>
              <span class="align-middle">Invite Friends</span>
            </li>
            <li>
              <i class="ti ti-trash me-1"></i>
              <span class="align-middle">Delete Account</span>
            </li>
          </ul>
        </div>
        <div class="d-flex mt-4">
          <button class="btn btn-primary" data-bs-toggle="sidebar" data-overlay data-target="#app-chat-sidebar-left">Logout</button>
        </div>
      </div>
    </div>
    <!-- /Sidebar Left-->
    <!-- Chat History -->
    @if($id)
    <div class="col app-chat-history bg-body">
      <div class="chat-history-wrapper">
        <div class="chat-history-header border-bottom">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex overflow-hidden align-items-center">
              <i class="ti ti-menu-2 ti-sm cursor-pointer d-lg-none d-block me-2" data-bs-toggle="sidebar" data-overlay data-target="#app-chat-contacts"></i>
              <div class="flex-shrink-0 avatar">
                <img src="{{asset('assets/img/avatars/2.png')}}" alt="Avatar" class="rounded-circle" data-bs-toggle="sidebar" data-overlay data-target="#app-chat-sidebar-right">
              </div>
              <div class="chat-contact-info flex-grow-1 ms-2">
                <h6 class="m-0">{{$otherUser->first_name}}</h6>
                <small class="user-status text-muted">{{$otherUser->email}}</small>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <i class="ti ti-phone-call cursor-pointer d-sm-block d-none me-3"></i>
              <i class="ti ti-video cursor-pointer d-sm-block d-none me-3"></i>
              <i class="ti ti-search cursor-pointer d-sm-block d-none me-3"></i>
              <div class="dropdown">
                <i class="ti ti-dots-vertical cursor-pointer" id="chat-header-actions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </i>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="chat-header-actions">
                  <a class="dropdown-item" href="javascript:void(0);">View Contact</a>
                  <a class="dropdown-item" href="javascript:void(0);">Mute Notifications</a>
                  <a class="dropdown-item" href="javascript:void(0);">Block Contact</a>
                  <a class="dropdown-item" href="javascript:void(0);">Clear Chat</a>
                  <a class="dropdown-item" href="javascript:void(0);">Report</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="chat-history-body bg-body chat-box" id="chat-box">
          <ul class="list-unstyled chat-history chat-messages" id="chat-messages">

          @foreach($messages as $message)
          @if($message["user_id"]==Auth::id())
              <li class="chat-message chat-message-right">
                <div class="d-flex overflow-hidden">
                  <div class="chat-message-wrapper flex-grow-1">
                    <div class="chat-message-text">
                      <p class="mb-0"> {{$message["message"]}}</p>
                    </div>
                    <div class="text-end text-muted mt-1">
                      <i class='ti ti-checks ti-xs me-1 text-success'></i>
                      <small>10:00 AM</small>
                    </div>
                  </div>
                  <div class="user-avatar flex-shrink-0 ms-3">
                    <div class="avatar avatar-sm">
                      <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
                    </div>
                  </div>
                </div>
              </li>

            @else
              <li class="chat-message">
                <div class="d-flex overflow-hidden">
                  <div class="user-avatar flex-shrink-0 me-3">
                    <div class="avatar avatar-sm">
                      <img src="{{asset('assets/img/avatars/2.png')}}" alt="Avatar" class="rounded-circle">
                    </div>
                  </div>
                  <div class="chat-message-wrapper flex-grow-1">
                    <div class="chat-message-text">
                      <p class="mb-0"> {{$message["message"]}}</p>
                    </div>
                    <div class="text-muted mt-1">
                      <small>10:02 AM</small>
                    </div>
                  </div>
                </div>
              </li>
            @endif
            @endforeach
          </ul>
        </div>
        <!-- Chat message form -->
        <div class="chat-history-footer shadow-sm">
          <form  id="chat-form" class="d-flex justify-content-between align-items-center ">
            <input class="form-control message-input border-0 me-3 shadow-none" placeholder="Type your message here" id="message-input">
            <div class="message-actions d-flex align-items-center">
              <i class="speech-to-text ti ti-microphone ti-sm cursor-pointer"></i>
              <label for="attach-doc" class="form-label mb-0">
                <i class="ti ti-photo ti-sm cursor-pointer mx-3"></i>
                <input type="file" id="attach-doc" hidden>
              </label>
              <button class="btn btn-primary d-flex send-msg-btn">
                <i class="ti ti-send me-md-1 me-0"></i>
                <span class="align-middle d-md-inline-block d-none" type="submit">Send</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @else
    @endif
    <!-- /Chat History -->

     <!-- Chat & Contacts -->
     <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end" id="app-chat-contacts">
      <div class="sidebar-header">
        <div class="d-flex align-items-center me-3 me-lg-0">
          <div class="flex-shrink-0 avatar avatar-online me-3" data-bs-toggle="sidebar" data-overlay="app-overlay-ex" data-target="#app-chat-sidebar-left">
            <img class="user-avatar rounded-circle cursor-pointer" src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar">
          </div>
          <div class="flex-grow-1 input-group input-group-merge rounded-pill">
            <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
            <input type="text" class="form-control chat-search-input" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31">
          </div>
        </div>
        <i class="ti ti-x cursor-pointer mt-2 me-1 d-lg-none d-block position-absolute top-0 end-0" data-overlay data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
      </div>
      <hr class="container-m-nx m-0">
      <div class="sidebar-body">

        <!-- Chats -->

        <!-- Contacts -->
           <!-- About User -->
    <div class="card mb-4">
      <div class="card-body">
        <small class="card-text text-uppercase">About</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span class="fw-bold mx-2">Full Name:</span> <span>{{$otherUser->first_name}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span class="fw-bold mx-2">Status:</span> <span>Active</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span class="fw-bold mx-2">Role:</span> <span>@if($otherUser->role==2) Vendor  @else Partner @endif</span></li>
         </ul>
        <small class="card-text text-uppercase">Contacts</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span> <span>{{$otherUser->phone}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span> <span>{{$otherUser->email}}</span></li>
        </ul>

      </div>
    </div>
    <!--/ About User -->
      </div>
    </div>
    <!-- /Chat contacts -->

    <!-- Sidebar Right -->
    <div class="col app-chat-sidebar-right app-sidebar overflow-hidden" id="app-chat-sidebar-right">
      <div class="sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
        <div class="avatar avatar-xl avatar-online">
          <img src="{{asset('assets/img/avatars/2.png')}}" alt="Avatar" class="rounded-circle">
        </div>
        <h5 class="mt-2 mb-0">Felecia Rower</h5>
        <span>NextJS Developer</span>
        <i class="ti ti-x ti-sm cursor-pointer close-sidebar d-block" data-bs-toggle="sidebar" data-overlay data-target="#app-chat-sidebar-right"></i>
      </div>
      <div class="sidebar-body px-4 pb-4">
        <div class="my-4">
          <p class="text-muted text-uppercase">About</p>
          <p class="mb-0 mt-3">A Next. js developer is a software developer who uses the Next. js framework alongside ReactJS to build web applications.</p>
        </div>
        <div class="my-4">
          <p class="text-muted text-uppercase">Personal Information</p>
          <ul class="list-unstyled d-grid gap-2 mt-3">
            <li class="d-flex align-items-center">
              <i class='ti ti-mail'></i>
              <span class="align-middle ms-2">josephGreen@email.com</span>
            </li>
            <li class="d-flex align-items-center">
              <i class='ti ti-phone-call'></i>
              <span class="align-middle ms-2">+1(123) 456 - 7890</span>
            </li>
            <li class="d-flex align-items-center">
              <i class='ti ti-clock'></i>
              <span class="align-middle ms-2">Mon - Fri 10AM - 8PM</span>
            </li>
          </ul>
        </div>
        <div class="mt-4">
          <p class="text-muted text-uppercase">Options</p>
          <ul class="list-unstyled d-grid gap-2 mt-3 anima" id="anima" >
            <li class="cursor-pointer d-flex align-items-center">
              <i class='ti ti-badge'></i>
              <span class="align-middle ms-2">Add Tag</span>
            </li>
            <li class="cursor-pointer d-flex align-items-center">
              <i class='ti ti-star'></i>
              <span class="align-middle ms-2">Important Contact</span>
            </li>
            <li class="cursor-pointer d-flex align-items-center">
              <i class='ti ti-photo'></i>
              <span class="align-middle ms-2">Shared Media</span>
            </li>
            <li class="cursor-pointer d-flex align-items-center">
              <i class='ti ti-trash'></i>
              <span class="align-middle ms-2">Delete Contact</span>
            </li>
            <li class="cursor-pointer d-flex align-items-center">
              <i class='ti ti-ban'></i>
              <span class="align-middle ms-2">Block Contact</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /Sidebar Right -->

    <div class="app-overlay"></div>
  </div>
</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
         integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
         crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.2/socket.io.min.js"></script>
      <script>
               $(function(){
           var user_id = '{{Auth::id()}}';
            console.log(user_id)
           var other_user_id = '{{($otherUser)?$otherUser->id:''}}';
           var otherUserName = '{{($otherUser)?$otherUser->first_name:''}}';
           var socket = io("http://localhost:3000",{query:{user_id:user_id}});




           $("#chat-form").on("submit",function(e){
                   e.preventDefault();
                   var message = $("#message-input").val();
                   if(message.trim().length==0){
                   $("#message-input").focus();
                   }
                   else{
                       var data = {
                       user_id:user_id,
                       other_user_id:other_user_id,
                       message:message,
                       otherUserName:otherUserName
                   }
                       socket.emit('send_message',data);
                       $("#message-input").val('');
                   }
           })



           socket.on('user_connected',function(data){
               $('#status_'+data).html('  <span class="fa fa-circle chat-online"></span> Online');
          });

          socket.on('user_disconnected',function(data){
               $('#status_'+data).html('  <span class="fa fa-circle chat-offline"></span> Offline');
              })


              socket.on('receive_message', function(data) {

             if((data.user_id == user_id && data.other_user_id== other_user_id ) || (data.user_id == other_user_id &&  data.other_user_id == user_id)){

              if(data.user_id == user_id){

                      var html = ` <li class="chat-message chat-message-right">
                <div class="d-flex overflow-hidden">
                  <div class="chat-message-wrapper flex-grow-1">
                    <div class="chat-message-text">
                      <p class="mb-0">   ${data.message}</p>
                    </div>
                    <div class="text-end text-muted mt-1">
                      <i class='ti ti-checks ti-xs me-1 text-success'></i>
                      <small>10:00 AM</small>
                    </div>
                  </div>
                  <div class="user-avatar flex-shrink-0 ms-3">
                    <div class="avatar avatar-sm">
                      <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
                    </div>
                  </div>
                </div>
              </li>`

              }
              else{
                      var html = `<li class="chat-message">
                <div class="d-flex overflow-hidden">
                  <div class="user-avatar flex-shrink-0 me-3">
                    <div class="avatar avatar-sm">
                      <img src="{{asset('assets/img/avatars/2.png')}}" alt="Avatar" class="rounded-circle">
                    </div>
                  </div>
                  <div class="chat-message-wrapper flex-grow-1">
                    <div class="chat-message-text">
                      <p class="mb-0">   ${data.message}</p>
                    </div>
                    <div class="text-muted mt-1">
                      <small>10:02 AM</small>
                    </div>
                  </div>
                </div>
              </li>`
                  }
                  $("#chat-messages").append(html);
                  $("#chat-box").animate({ scrollTop: $(".chat-box").prop("scrollHeight")},1000);


         }

         })


         })



      </script>
@endsection
