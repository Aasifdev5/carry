@extends('layout.master')
@section('title')

{{ __('Invited Users') }} {{ __('List') }}
@endsection
@section('content')
<script src="{{ asset('js/core/libs.min.js')}}"></script>
<div class="row">
   <div class="table-responsive">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">{{ __('Invited Users') }} {{ __('List') }}</h4>
               </div>
            </div>
            <div class="card-body px-0">

               <table id="datatable" class="table table-striped" data-toggle="data-table">
                  <thead>
                     <th>#</th>
                     <tr class="ligth">
                        <th>#</th>
                        <th>User Type</th>
                        <th>Invite Code</th>
                        <th>User registration date</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>1</td>
                        <td>Premium</td>
                        <td>7567568</td>
                        <td>10/05/2022</td>
                     </tr>
                     <tr>
                        <td>2</td>
                        <td>Premium</td>
                        <td>123</td>
                        <td>10/05/2022</td>
                     </tr>
                     <tr>
                        <td>3</td>
                        <td>Premium</td>
                        <td>4482</td>
                        <td>10/05/2022</td>
                     </tr>

                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection