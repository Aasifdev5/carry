@extends('layout.master')
@section('title')

{{ __('test.Edit') }} {{ __('test.Language') }}
@endsection
@section('content')
<script src="{{ asset('js/core/libs.min.js')}}"></script>
<div class="row">
   <center>
      <div class="col-xl-9 col-lg-12">
         <div class="card">
            <div class="card-header d-flex ">
               <div class="header-title">
                  <h4 class="card-title">{{ __('test.Edit') }} {{ __('test.Language') }}</h4>
               </div>
            </div>

            <div class="card-body">
               <div class="new-user-info">
                  <form action="{{route('update_language')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                     @if(Session::has('success'))
                     <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                     @if(Session::has('fail'))
                     <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                     @csrf
                     <div class="form-group row">
                        <input type="hidden" name="language_id" value="{{$language->id}}">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Language Name:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="language_name" name="language_name" value="{{$language->name}}" placeholder="Enter Your Vehicle Name">
                           <span class="text-danger">@error ('language_name') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Language Code:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="language_code" name="language_code" value="{{$language->code}}" placeholder="Enter Language Code">
                           <span class="text-danger">@error ('language_code') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="pwd2">
                           Uploaded Language Photo :</label>
                        <div class="col-sm-4">
                           <img src="images/language/{{$language->language_photo}}" width="100" height="100">
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="pwd2">Language Photo
                           Upload:</label>
                        <div class="col-sm-9">
                           <input type="file" class="form-control" id="language_photo" name="language_photo" value="{{old('language_photo')}}">
                           <span class="text-danger">@error ('language_photo') {{$message}} @enderror</span>

                        </div>
                     </div>


                     <div class="form-group">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary pull-right"> {{ __('test.Update') }} </button>
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