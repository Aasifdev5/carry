@extends('layout.master')
@section('title')

{{ __('test.Edit') }} {{ __('test.User Limitation') }}
@endsection
@section('content')
<div class="row">
   <center>
      <div class="col-xl-9 col-lg-12">
         <div class="card">
            <div class="card-header d-flex ">
               <div class="header-title">
                  <h4 class="card-title">{{ __('test.Edit') }} {{ __('test.User Limitation') }}</h4>
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
                     <input type="hidden" name="user_limitation_id" value="{{$user_limitation->id}}">
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Chats Limits:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="chat_limit" name="chat_limit"
                              value="{{$user_limitation->chat_limit}}" placeholder="Enter Chats Limits">
                           <span class="text-danger">@error ('chat_limit') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Add Offer
                           Limits:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="add_offer_limit" name="add_offer_limit"
                              value="{{$user_limitation->add_offer_limit}}" placeholder="Enter Add Offer Limits">
                           <span class="text-danger">@error ('add_offer_limit') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Swipe Limits:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="swipe_limit" name="swipe_limit"
                              value="{{$user_limitation->swipe_limit}}" placeholder="Enter Chats Limits">
                           <span class="text-danger">@error ('swipe_limit') {{$message}} @enderror</span>
                        </div>
                     </div>


                     <div class="form-group">
                        <div class="col-sm-12">
                           <button type="submit"
                              class="btn btn-primary btn-block pull-right">{{ __('test.Update') }}</button>
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