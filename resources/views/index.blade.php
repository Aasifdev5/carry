@extends('layout.main')
@section('title')
Admin Login
@endsection
@section('content')

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
   <!-- loader Start -->
   <div id="loading">
      <div class="loader simple-loader">
         <div class="loader-body"></div>
      </div>
   </div>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
   <!-- loader END -->
   <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white vh-100">
            <div class="col-md-6">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                        <div class="card-body">
                           <a href="javascript:;" class="navbar-brand d-flex align-items-center mb-3">
                              <!--Logo start-->
                              <!--logo End-->

                              <!--Logo start-->
                              <div class="logo-main">
                                 <div class="logo-normal">
                                   <img src="Carry_me_logo-removebg-preview.png">
                                 </div>
                                 <div class="logo-mini">
                                     <img src="Carry_me_logo-removebg-preview.png">
                                 </div>
                              </div>
                              <!--logo End-->

                             
                           </a>
                           <h2 class="mb-2 text-center">Admin Login</h2>
                           <p class="text-center">Login to stay connected.</p>
                           <form action="{{ route('customer_login')}}" method="post">
                              @if(Session::has('success'))
                              <div class="alert alert-success">{{Session::get('success')}}</div>
                              @endif
                              @if(Session::has('fail'))
                              <div class="alert alert-danger">{{Session::get('fail')}}</div>
                              @endif
                              @csrf
                              <style>
                                 .far {
                                    position: absolute;
                                    right: 40px;
                                    margin-top: -27px;
                                 }
                              </style>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="email" class="form-label">Email</label>
                                       <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" aria-describedby="email" placeholder=" ">
                                       <span class="text-danger">@error ('email'){{$message}}@enderror</span>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                       <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" aria-describedby="password" placeholder=" ">
                                       <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                                       <span class="text-danger">@error ('password') {{$message}}@enderror</span>
                                    </div>
                                 </div>

                              </div>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Sign In</button>
                              </div>


                              <!-- <p class="mt-3 text-center">
                                 Don’t have an account? <a href="register" class="text-underline">Click here to sign
                                    up.</a>
                              </p> -->
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sign-bg">
                  <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g opacity="0.05">
                        <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF" />
                        <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF" />
                        <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF" />
                        <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF" />
                     </g>
                  </svg>
               </div>
            </div>
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="{{asset('images/auth/01.png')}}" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div>
         </div>
      </section>
   </div>
   <script>
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');

      togglePassword.addEventListener('click', function(e) {
         // toggle the type attribute
         const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
         password.setAttribute('type', type);
         // toggle the eye slash icon
         this.classList.toggle('fa-eye-slash');
      });
   </script>
   @endsection