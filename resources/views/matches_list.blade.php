@extends('layout.master')
@section('title')
Matches List
@endsection
@section('content')
<div class="row">
   <div class="table-responsive">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Matches List</h4>
               </div>
            </div>
            <div class="card-body px-0">

               <table id="datatable" class="table table-striped" data-toggle="data-table">
                  <thead>
                     <tr class="ligth">
                        <th>Vehicle type
                        </th>
                        <th>Departure</th>
                        <th>Destination</th>
                        <th>Price</th>
                        <th>Initialisation Date time</th>

                        <th style="min-width: 100px">Delete</th>
                     </tr>
                  </thead>

               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection