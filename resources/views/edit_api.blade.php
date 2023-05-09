@extends('layout.master')
@section('title')
Edit API
@endsection
@section('content')
<div class="row">
   <center>
      <div class="col-xl-9 col-lg-12">
         <div class="card">
            <div class="card-header d-flex ">
               <div class="header-title">
                  <h4 class="card-title">Edit Apis</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="new-user-info">
                  <form action="{{route('update_api_key')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                     @if(Session::has('success'))
                     <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                     @if(Session::has('fail'))
                     <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                     @csrf
                     <input type="hidden" name="api_id" value="{{$api->id}}">
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Api Name:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="api_name" name="api_name" value="{{$api->api_name}}" placeholder="Enter Api Name">
                           <span class="text-danger">@error ('api_name') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="pwd2">API KEY:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="api_key" name="api_key" value="{{$api->api_key}}">
                           <span class="text-danger">@error ('api_key') {{$message}} @enderror</span>

                        </div>
                     </div>


                     <div class="form-group">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary btn-block pull-right">Update</button>
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