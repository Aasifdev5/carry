@extends('layout.master')
@section('title')

{{ __('test.Add') }} {{ __('test.Premium Plan') }}
@endsection
@section('content')
<script src="{{ asset('js/core/libs.min.js')}}"></script>
<div class="row">
   <center>
      <div class="col-xl-10 col-lg-12">
         <div class="card">
            <div class="card-header d-flex ">
               <div class="header-title">
                  <h4 class="card-title">{{ __('test.Add') }} {{ __('test.Premium Plan') }}</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="new-user-info">
                  <form action="{{route('save_plan')}}" method="POST" enctype="multipart/form-data"
                     class="form-horizontal">
                     @if(Session::has('success'))
                     <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                     @if(Session::has('fail'))
                     <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                     @csrf
                     <?php

                     use Illuminate\Support\Facades\DB;

                     $curreny = DB::table('currency')->get();

                     ?>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Premium Plan
                           Name:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="plan_name" name="plan_name"
                              value="{{old('plan_name')}}" placeholder="Enter Your Premium Plan Name">
                           <span class="text-danger">@error ('plan_name') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Currency:</label>
                        <div class="col-sm-9">


                           <select class="form-select form-select-lg shadow-none" name="currency">
                              <option>Please Select Currency</option>
                              @if(count($curreny)> 0)
                              @foreach($curreny as $row)
                              <option value="{{$row->currency_symbol}}">{{$row->currency_symbol}}
                                 {{$row->currency_name}}
                              </option>
                              @endforeach
                              @endif
                           </select>

                           <span class="text-danger">@error ('currency') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">
                           Price:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}"
                              placeholder="Enter Price">
                           <span class="text-danger">@error ('price') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">
                           Price With Invite Code:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="price_invite_code" name="price_invite_code"
                              value="{{old('price_invite_code')}}" placeholder="Enter Price With Invite Code">
                           <span class="text-danger">@error ('price_invite_code') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="pwd2">Duration (In Days)
                           :</label>
                        <div class="col-sm-9">

                           <input type="text" class="form-control" id="duration" name="duration"
                              value="{{old('duration')}}" placeholder="Enter Duration">

                           <span class="text-danger">@error ('duration') {{$message}} @enderror</span>

                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary btn-block pull-right"> {{ __('test.Save') }}
                           </button>
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