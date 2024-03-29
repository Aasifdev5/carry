@extends('layout.master')
@section('title')
Users List
@endsection
@section('content')
<script src="{{ asset('js/core/libs.min.js')}}"></script>
<div class="row">
   <div class="table-responsive">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">User List</h4>
               </div>
            </div>
            <div class="card-body px-0">

               <table id="datatable" class="table table-striped" data-toggle="data-table">
                  <thead>
                     <tr class="ligth">
                        <th>#</th>
                        <!--<th>Profile Photo</th>-->
                        <th>Full Name</th>
                        <th>User Type</th>
                        <th>Language Code</th>
                        <th>Workman ID</th>
                        <th>Email</th>
                        <th>Invite Code</th>
                        <th>Security Date</th>
                        <th>Status</th>
                        <th>Join Date</th>
                        <!--<th>Notify</th>-->
                        <th style="min-width: 100px">Delete</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     // print_r($users);
                     $count = 1;
                     ?>
                     @foreach($users as $row)
                     <tr>
                        <td><?php echo $count++; ?></td>
                        <!--<td class="text-center"><img class="bg-soft-primary rounded img-fluid avatar-40 me-3"-->
                        <!--      src="{{asset('images/shapes/')}}" alt="profile"></td>-->
                        <td>{{$row->name}}</td>
                        <td>{{$row->user_type}}</td>
                        <td>{{$row->lang_id}}</td>
                        <td>{{$row->workman_id}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->invite_code}}</td>
                        <td>{{$row->security_date}}</td>
                        <td><span class="badge bg-primary">Active</span></td>

                        <td>{{$row->created_at}}</td>
                        <!--<td>-->
                        <!--   <div id="svg-container-64">-->
                        <!--      <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"-->
                        <!--         xmlns="http://www.w3.org/2000/svg">-->
                        <!--         <path-->
                        <!--            d="M17.9028 8.85107L13.4596 12.4641C12.6201 13.1301 11.4389 13.1301 10.5994 12.4641L6.11865 8.85107"-->
                        <!--            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"-->
                        <!--            stroke-linejoin="round"></path>-->
                        <!--         <path fill-rule="evenodd" clip-rule="evenodd"-->
                        <!--            d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z"-->
                        <!--            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"-->
                        <!--            stroke-linejoin="round"></path>-->
                        <!--      </svg>-->
                        <!--   </div>-->
                        <!--</td>-->
                        <td>
                           <div class="flex align-items-center list-user-action">


                              <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                 title="Delete" href="#">
                                 <span class="btn-inner">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                       xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                       <path
                                          d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                       <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path
                                          d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                    </svg>
                                 </span>
                              </a>
                           </div>
                        </td>
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