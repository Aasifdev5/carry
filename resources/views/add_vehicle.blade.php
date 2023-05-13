@extends('layout.master')
@section('title')

{{ __('Add Vehicle') }}
@endsection
@section('content')
<script src="{{ asset('js/core/libs.min.js')}}"></script>
<div class="row">
   <center>
      <div class="col-xl-9 col-lg-12">
         <div class="card">
            <div class="card-header d-flex ">
               <div class="header-title">
                  <h4 class="card-title">{{ __('Add Vehicle') }}</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="new-user-info">
                  <form action="{{route('save_vehicle')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                     @if(Session::has('success'))
                     <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                     @if(Session::has('fail'))
                     <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                     @csrf
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Vehicle Name:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" value="{{old('vehicle_name')}}" placeholder="Enter Your Vehicle Name">
                           <span class="text-danger">@error ('vehicle_name') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="pwd2">Vehicle Photo
                           Upload:</label>
                        <div class="col-sm-9">
                           <input type="file" class="form-control" id="vehicle_photo_name" name="vehicle_photo_name" value="{{old('vehicle_photo_name')}}" placeholder="Enter Your Vehicle Name">
                           <span class="text-danger">@error ('vehicle_photo_name') {{$message}} @enderror</span>

                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="pwd2">Description
                           :</label>
                        <div class="col-sm-9">

                           <textarea class="form-control" rows="4" name="description" autofocus>
                           {{old('description')}}
                           </textarea>

                           <span class="text-danger">@error ('description') {{$message}} @enderror</span>

                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary btn-block pull-right">{{ __('Save') }}</button>
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