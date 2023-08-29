@extends('layout.master')
@section('title')

{{ __('Distributor') }} {{ __('List') }}
@endsection
@section('content')
<script src="{{ asset('js/core/libs.min.js')}}"></script>
<div class="row">
   <div class="table-responsive">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">{{ __('Distributor') }} {{ __('List') }}</h4>
               </div>
               <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top"
                  href="add_distributor" aria-label="Add" data-bs-original-title="Add">
                  <span class="btn-inner">
                     <div id="dual-svg-container-73">
                        <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                           xmlns="http://www.w3.org/2000/svg">
                           <path opacity="0.4"
                              d="M16.6667 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0622 3.92 22 7.33333 22H16.6667C20.0711 22 22 20.0622 22 16.6667V7.33333C22 3.92889 20.0711 2 16.6667 2Z"
                              fill="currentColor"></path>
                           <path
                              d="M15.3205 12.7083H12.7495V15.257C12.7495 15.6673 12.4139 16 12 16C11.5861 16 11.2505 15.6673 11.2505 15.257V12.7083H8.67955C8.29342 12.6687 8 12.3461 8 11.9613C8 11.5765 8.29342 11.2539 8.67955 11.2143H11.2424V8.67365C11.2824 8.29088 11.6078 8 11.996 8C12.3842 8 12.7095 8.29088 12.7495 8.67365V11.2143H15.3205C15.7066 11.2539 16 11.5765 16 11.9613C16 12.3461 15.7066 12.6687 15.3205 12.7083Z"
                              fill="currentColor"></path>
                        </svg>
                     </div>
                  </span>
               </a>
            </div>
            <div class="card-body px-0">

               <table id="datatable" class="table table-striped" data-toggle="data-table">
                  @if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert alert-danger">{{Session::get('fail')}}</div>
                  @endif
                  <thead>
                     <tr class="ligth">
                        <th>#</th>
                        <th>Distributor Name</th>
                        <th>Distributor Invite Code</th>
                        <th>Distribution StartDate</th>
                        <th>Distribution End Date</th>
                        <th>Distributor Username</th>
                        <th>Password</th>

                     </tr>
                  </thead>
                  <tbody>
                     <?php  $count = 1; ?>
                     @foreach($distributors as $row)
                     <?php
                     if ($row->is_admin == 0) {


                     ?>
                     <tr>
                        <td><?php echo $count++; ?></td>
                        <td>{{$row->distributor_name}}</td>
                        <td>{{$row->invite_code}}</td>
                        <td>{{$row->start_date}}</td>
                        <td>{{$row->end_date}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->password}}</td>
                     </tr>
                     <?php } ?>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection