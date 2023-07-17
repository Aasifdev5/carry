@extends('layout.master')
@section('title')
Matches List
@endsection
@section('content')
<script src="{{ asset('js/core/libs.min.js')}}"></script>
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
                        <th>#</th>
                        <th>Vehicle type</th>
                        <th>Departure</th>
                        <th>Destination</th>
                        <th>Price</th>
                        <th>Initialisation Date time</th>
                        <th style="min-width: 100px">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                       <?php
                     // print_r($users);
                     $count = 1;
                     ?>
                      @foreach($matches as $row)
                      <tr>
                        <td><?php echo $count++; ?></td>
                        <td>{{$row->ride_type}}</td>
                         <td>{{$row->departure_address}}</td>
                          <td>{{$row->destination_address}}</td>
                           <td>{{$row->fixed_price}}</td>
                            <td>{{$row->created_at}}</td>
                            <th></th>
                      </tr>
                      @endforeach
                  </tbody>

               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection