@extends('layout.master')
@section('title')
{{ __('test.Add') }} {{ __('test.Currency') }}
@endsection
@section('content')
<div class="row">
   <center>
      <div class="col-xl-8 col-lg-12">
         <div class="card">
            <div class="card-header d-flex ">
               <div class="header-title">
                  <h4 class="card-title">{{ __('test.Add') }} {{ __('test.Currency') }}</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="new-user-info">
                  <form action="{{route('save_currency')}}" method="POST" enctype="multipart/form-data"
                     class="form-horizontal">
                     @if(Session::has('success'))
                     <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                     @if(Session::has('fail'))
                     <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                     @csrf
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Currency Name:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="currency_name" name="currency_name"
                              value="{{old('currency_name')}}" placeholder="Enter Currency Name">
                           <span class="text-danger">@error ('currency_name') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Currency
                           Symbol:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="currency_symbol" name="currency_symbol"
                              value="{{old('currency_symbol')}}" placeholder="Enter Currency Symbol">
                           <span class="text-danger">@error ('currency_symbol') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <!-- <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="pwd2">Currency Photo
                           Upload:</label>
                        <div class="col-sm-9">
                           <input type="file" class="form-control" id="vehicle_photo" name="vehicle_photo_name"
                              value="{{old('vehicle_photo_name')}}" placeholder="Enter Your Vehicle Name">
                           <span class="text-danger">@error ('vehicle_photo_name') {{$message}} @enderror</span>

                        </div>
                     </div> -->


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