@extends('layout.master')
@section('title')
Change Password
@endsection
@section('content')
<div class="row">
   <center>
      <div class="col-xl-6 col-lg-8">
         <div class="card">
            <div class="card-header d-flex ">
               <div class="header-title">
                  <h4 class="card-title">Change Password</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="new-user-info">
                  <form action="{{route('update_password')}}" method="post">
                     @if(Session::has('success'))
                     <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                     @if(Session::has('fail'))
                     <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                     @csrf

                     <div class="row">
                        <div class="form-group col-md-12">
                           <label class="form-label" for="old_password">Old Password:</label>
                           <input type="password" class="form-control" value="{{old('old_password')}}" name="old_password" placeholder="Old Password">
                           <span class="text-danger">@error ('old_password') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group col-md-6">
                           <label class="form-label" for="pass">New Password:</label>
                           <input type="password" class="form-control" id="pass" value="{{old('new_password')}}" name="new_password" placeholder="New Password">
                           <span class="text-danger">@error ('new_password') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group col-md-6">
                           <label class="form-label" for="rpass">Confirm Password:</label>
                           <input type="password" class="form-control" id="rpass" value="{{old('confirm_password')}}" name="confirm_password" placeholder="Confirm Password ">
                           <span class="text-danger">@error ('confirm_password') {{$message}} @enderror</span>
                        </div>
                     </div>

                     <button type="submit" class="btn btn-primary">Change Password</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </center>

</div>
@endsection