@extends('layout.master')
@section('title')

{{ __('Edit') }} {{ __('Vehicle') }}
@endsection
@section('content')
<script src="{{ asset('js/core/libs.min.js')}}"></script>
<div class="row">
   <center>
      <div class="col-xl-9 col-lg-12">
         <div class="card">
            <div class="card-header d-flex ">
               <div class="header-title">
                  <h4 class="card-title">Edit Vehicle</h4>
               </div>
            </div>
            <?php
            // print_r($vehicle);
            ?>
            <div class="card-body">
               <div class="new-user-info">
                  <form action="{{route('update_vehicle')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                     @if(Session::has('success'))
                     <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                     @if(Session::has('fail'))
                     <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                     @csrf
                     <div class="form-group row">
                        <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Vehicle Name:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" value="{{$vehicle->vehicle_name}}" placeholder="Enter Your Vehicle Name">
                           <span class="text-danger">@error ('vehicle_name') {{$message}} @enderror</span>
                        </div>
                     </div>
                      <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Vehicle
                           Nickname:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="nick_name" name="nick_name" value="{{$vehicle->nick_name}}" placeholder="Enter Your Vehicle Nick Name">
                           <span class="text-danger">@error ('nick_name') {{$message}} @enderror</span>
                        </div>
                     </div>
                      <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Ride Type:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="ride_type" name="ride_type"
                              value="{{$vehicle->ride_type}}" placeholder="Enter Your Ride Type">
                           <span class="text-danger">@error ('ride_type') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Seats:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="seats" name="seats" value="{{$vehicle->seats}}"
                              placeholder="Enter Your Seats">
                           <span class="text-danger">@error ('seats') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Departure
                           address:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="departure_address" name="departure_address"
                              value="{{$vehicle->departure_address}}" placeholder="Enter Your Departure Address">
                           <span class="text-danger">@error ('departure_address') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Destination
                           address:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="destination_address" name="destination_address"
                              value="{{$vehicle->destination_address}}" placeholder="Enter Your Destination Address">
                           <span class="text-danger">@error ('destination_address') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Fixed price:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="fixed_price" name="fixed_price"
                              value="{{$vehicle->fixed_price}}" placeholder="Enter Your Fixed Price">
                           <span class="text-danger">@error ('fixed_price') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Luggage :</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="luggage" name="luggage"
                              value="{{$vehicle->luggage}}">
                           <span class="text-danger">@error ('luggage') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="pwd2">
                           Uploaded Vehicle Photo :</label>
                        <div class="col-sm-4">
                           <img src="images/vehicles/{{$vehicle->vehicle_photo_name}}" width="100" height="100">
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

                           <textarea class="form-control" name="description" rows="4" autofocus>{{$vehicle->description}} </textarea>

                           <span class="text-danger">@error ('description') {{$message}} @enderror</span>

                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary pull-right">Update</button>
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