@extends('layout.master')
@section('title')

{{ __('Edit') }} {{ __('User Limitation') }}
@endsection
@section('content')
<script src="{{ asset('js/core/libs.min.js')}}"></script>
<div class="row">
   <center>
      <div class="col-xl-9 col-lg-12">
         <div class="card">
            <div class="card-header d-flex ">
               <div class="header-title">
                  <h4 class="card-title">{{ __('Edit') }} {{ __('User Limitation') }}</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="new-user-info">
                  <form action="{{route('update_limit')}}" method="POST" class="form-horizontal">
                     @if(Session::has('success'))
                     <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                     @if(Session::has('fail'))
                     <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                     @csrf
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">User Type:</label>
                        <div class="col-sm-9">

                           <select class="form-select form-select-lg shadow-none" name="user_type">
                              <option value="">Please Select User Type</option>
                              <option @if($user_limitation->user_type=="all")
                                 selected
                                 @endif value="all">All</option>
                              <option @if($user_limitation->user_type=="premium_users")
                                 selected
                                 @endif
                                 value="premium_users">Premium Users</option>
                              <option @if($user_limitation->user_type=="free_users")
                                 selected
                                 @endif
                                 value="free_users">Free Users</option>
                              <option @if($user_limitation->user_type=="users_invite_code")
                                 selected
                                 @endif
                                 value="users_invite_code">Users with Invite Code</option>
                              <option @if($user_limitation->user_type=="users_first_register")
                                 selected
                                 @endif
                                 value="users_first_register">Users with first registration Before “Date”.
                              </option>
                           </select>

                           <span class="text-danger">@error ('user_type') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <input type="hidden" name="user_limitation_id" value="{{$user_limitation->id}}">
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Chats Limits:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="chat_limit" name="chat_limit" value="{{$user_limitation->chat_limit}}" placeholder="Enter Chats Limits">
                           <span class="text-danger">@error ('chat_limit') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Add Offer
                           Limits:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="add_offer_limit" name="add_offer_limit" value="{{$user_limitation->add_offer_limit}}" placeholder="Enter Add Offer Limits">
                           <span class="text-danger">@error ('add_offer_limit') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Swipe Limits:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="swipe_limit" name="swipe_limit" value="{{$user_limitation->swipe_limit}}" placeholder="Enter Chats Limits">
                           <span class="text-danger">@error ('swipe_limit') {{$message}} @enderror</span>
                        </div>
                     </div>


                     <div class="form-group">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary btn-block pull-right">{{ __('Update') }}</button>
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