<!DOCTYPE html>
<html lang="en">
   <head>
      <title itemprop="name">Preview Bootstrap snippets. white chat</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
         integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style type="text/css">
        
         .chat-online {
         color: #34ce57;
         }
         .chat-offline {
         color: #e4606d;
         }
         .chat-messages {
         display: flex;
         flex-direction: column;
         max-height: 800px;
         overflow-y: scroll;
         }
         .chat-message-left,
         .chat-message-right {
         display: flex;
         flex-shrink: 0;
         }
         .chat-message-left {
         margin-right: auto;
         }
         .chat-message-right {
         flex-direction: row-reverse;
         margin-left: auto;
         }
         .py-3 {
         padding-top: 1rem !important;
         padding-bottom: 1rem !important;
         }
         .px-4 {
         padding-right: 1.5rem !important;
         padding-left: 1.5rem !important;
         }
         .flex-grow-0 {
         flex-grow: 0 !important;
         }
         .border-top {
         border-top: 1px solid #dee2e6 !important;
         }
      </style>
   </head>
   <body>
      <div id="snippetContent">
         <main class="content">
            <div class="container p-0">
               <div class="card">
                  <div class="row g-0">
                     <div class="col-12 col-lg-5 col-xl-3 border-right">
                        @foreach($friend as $fr)
                        <a href="{{route('chat',$fr['id'])}}" class="list-group-item list-group-item-action border-0">
                           <div class="badge bg-success float-right">5</div>
                           <div class="d-flex align-items-start">
                              <img src="https://ui-avatars.com/api/?name={{$fr['first_name']}}" class="rounded-circle mr-1"
                                 alt="Vanessa Tucker" width="40" height="40" />
                              <div class="flex-grow-1 ml-3">
                                 {{$fr["first_name"]}}
                                 <div class="small" id="status_{{$fr['id']}}">
                                    @if($fr['is_online']==0)
                                    <span class="fa fa-circle chat-offline"></span> Offline
                                    @else
                                    <span class="fa fa-circle chat-online"></span> Online
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </a>
                        @endforeach
                        <hr class="d-block d-lg-none mt-1 mb-0" />
                     </div>
                     <div class="col-12 col-lg-7 col-xl-9">
                        @if($id)
                           <div class="py-2 px-4 border-bottom d-none d-lg-block">
                              <div class="d-flex align-items-center py-1">
                                 <div class="position-relative"><img
                                    src="https://ui-avatars.com/api/?name={{$otherUser->first_name}}"
                                    class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40" />
                                 </div>
                                 <div class="flex-grow-1 pl-3">
                                    <strong>{{$otherUser->first_name}}</strong>
                                    <div class="text-muted small"><em>Typing...</em></div>
                                 </div>
                              </div>
                           </div>
                           <div class="position-relative">
                              <div class="chat-messages  p-4" id="chat-messages">
                                 @foreach($messages as $message)    
                                 @if($message["user_id"]==Auth::id())
                                 <div class="chat-message-right pb-4">
                                    <div>
                                       <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                          class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40" />
                                       <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                       <div class="font-weight-bold mb-1">You</div>
                                    {{$message["message"]}}
                                    </div>
                                 </div>
                                 @else    
                                 <div class="chat-message-left pb-4">
                                    <div>
                                       <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                          class="rounded-circle mr-1" alt="Sharon Lessman" width="40"
                                          height="40" />
                                       <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                    </div>
                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                       <div class="font-weight-bold mb-1">{{$otherUser->first_name}}</div>
                                       {{$message["message"]}}
                                    </div>
                                 </div>
                                 @endif
                                 @endforeach        
                              </div>
                           </div>
                           <div class="flex-grow-0 py-3 px-4 border-top">
                           <form id="chat-form">
                              <div class="input-group">
                                 <input type="text" id="message-input" class="form-control" placeholder="Type your message" />
                                 <button class="btn btn-primary" type="submit">Send</button>
                              </div>
                           </form>
                        </div>
                        @else
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </main>
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
            
         
         
              var html = `<div class="chat-message-right pb-4">
         
                  <div>
              <img src="https://ui-avatars.com/api/?name=yasir"
               class="rounded-circle mr-1" alt="Chris Wood" width="40" height="48"/>
               <div class="text-muted small text-nowrap mt-2">
                  ${data.time}</div> 
              </div>
              <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3"> <div class="font-weight-bold mb-1">You</div>
              ${data.message}
              </div>
              </div>`
         
              }   else{
                      var html = `<div class="chat-message-left pb-4">
                      <div>
                      <img src="https://ui-avatars.com/api/?name=${data.otherUserName}" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40" /> <div class="text-muted small text-nowrap mt-2">${data.time}</div> </div>
                      <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                      <div class="font-weight-bold mb-1">${data.otherUserName}</div>
                      ${data.message}
                      </div>
                          </div>`
                  }
                  $("#chat-messages").append(html);
                  $("#chat-messages").animate({ scrollTop: $(".chat-messages").prop("scrollHeight")},1000);
                  
                  
         }
         
         })
         
         
         })
         
           
      </script>
   </body>
</html>