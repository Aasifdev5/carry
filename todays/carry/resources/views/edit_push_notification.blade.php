@extends('layout.master')
@section('title')
Edit Push Notifications
@endsection
@section('content')
<script src="{{ asset('js/core/libs.min.js')}}"></script>
<style>
:root {
   --primary-clr: #E891B9;

}

.message-title {
   margin-top: 0;
   padding-bottom: 0.75em;
   border-bottom: solid 1px rgb(221, 221, 221);
   text-align: left;
}

.message-container {

   max-width: 600px;
}


textarea {
   grid-column: 2/4;
   border-radius: 2em;
   border: solid 3px var(--primary-clr);
   padding: 0.5em 1em;
}

input:focus,
textarea:focus {
   background: rgb(211, 230, 253);
}


/* For Mobile */
@media (max-width: 750px) {
   .container {
      width: 90%;
   }



   input,
   textarea {
      margin: 1em 0;
   }

   p#break {
      display: inline;
   }
}
</style>
<div class="row">
   <center>
      <div class="col-xl-6 col-lg-8">
         <div class="card">
            <div class="card-header">
               <div class="header-title">
                  <h3 class="card-title text-center">Edit Push Notification</h3>
               </div>
            </div>
            <div class="card-body">
               <div class="new-user-info">
                  <form action="{{route('update_push_notification')}}" method="POST" class="form-horizontal">
                     @if(Session::has('success'))
                     <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                     @if(Session::has('fail'))
                     <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                     @csrf
                     <input type="hidden" name="notification_id" value="{{$push_notification->id}}">
                     <div class="form-group row">

                        <div class="col-sm-12">
                           <div class="form-group">

                              <select class="form-select form-select-lg shadow-none" name="user_type">
                                 <option value="">Please Select User Type</option>
                                 <option @if($push_notification->user_type=="all")
                                    selected
                                    @endif value="all">All</option>
                                 <option @if($push_notification->user_type=="premium_users")
                                    selected
                                    @endif
                                    value="premium_users">Premium Users</option>
                                 <option @if($push_notification->user_type=="free_users")
                                    selected
                                    @endif
                                    value="free_users">Free Users</option>
                                 <option @if($push_notification->user_type=="users_invite_code")
                                    selected
                                    @endif
                                    value="users_invite_code">Users with Invite Code</option>
                                 <option @if($push_notification->user_type=="users_first_register")
                                    selected
                                    @endif
                                    value="users_first_register">Users with first registration Before “Date”.
                                 </option>
                              </select>
                           </div>
                           <span class="text-danger">@error ('user_type') {{$message}} @enderror</span>
                        </div>
                     </div>

                     <div class="form-group row">

                        <div class="col-sm-12">
                           <div class="form-outline">
                              <textarea class="form-control" id="textAreaExample" name="message" placeholder="" rows="4"
                                 style=" border: 1px solid;border-radius: 20px;">{{$push_notification->message}}</textarea>

                           </div>
                           <span class="text-danger">@error ('message') {{$message}} @enderror</span>

                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary btn-block pull-right"
                              style="border-radius: 35px;width: 70%;">Update Message</button>
                        </div>

                     </div>
                  </form>

               </div>
            </div>
         </div>
      </div>
   </center>

</div>

@endsection