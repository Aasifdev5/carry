@extends('layout.master')
@section('title')
Add Terms
@endsection
@section('content')
<div class="row">
   <center>
      <div class="col-xl-8 col-lg-12">
         <div class="card">
            <div class="card-header d-flex ">
               <div class="header-title">
                  <h4 class="card-title">Add Terms</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="new-user-info">
                  <form action="{{route('save_term')}}" method="POST" enctype="multipart/form-data"
                     class="form-horizontal">
                     @if(Session::has('success'))
                     <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                     @if(Session::has('fail'))
                     <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                     @csrf
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Terms Name:</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="term_name" name="term_name"
                              value="{{old('term_name')}}" placeholder="Enter Terms">
                           <span class="text-danger">@error ('term_name') {{$message}} @enderror</span>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-12">
                           <button type="submit"
                              class="btn btn-primary btn-block pull-right">{{ __('test.Save') }}</button>
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