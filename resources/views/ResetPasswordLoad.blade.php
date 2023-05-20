@extends('layout.main')
@section('title')
Reset Password
@endsection
@section('content')
<div class="container">
   <div class="row">
      <center>
         <div class="col-xl-6 col-lg-">
            <div class="card">
               <div class="card-header d-flex ">
                  <div class="header-title">
                     <h4 class="card-title">Reset Password</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="new-user-info">
                     <form action="{{route('ResetPassword')}}" method="post">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf

                        <input type="hidden" name="user_id" value="{{$customer[0]['id']}}">
                        <div class="row">

                           <div class="form-group col-md-6">
                              <label class="form-label" for="pass">New Password:</label>
                              <input type="password" class="form-control" id="pass" value="{{old('new_password')}}" name="new_password" placeholder="New Password">
                              <span class="text-danger">@error ('new_password') {{$message}} @enderror</span>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="form-label" for="rpass">Confirm Password:</label>
                              <input type="password" class="form-control" id="rpass" value="{{old('confirm_password')}}" name="confirm_password" placeholder="Confirm Password ">
                              <span class="text-danger">@error ('confirm_password') {{$message}} @enderror</span>
                           </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Reset Password</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </center>

   </div>
</div>

@endsection