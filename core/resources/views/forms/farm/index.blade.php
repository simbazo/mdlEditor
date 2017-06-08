@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
         <!-- START panel-->
         <div id="panelDemo14" class="panel panel-primary">
            <div class="panel-heading">
               Farms List
               <a href="{{ route('farms.create') }}" class="btn btn-primary btn-xs pull-right active" data-toggle="ajax-modal"><i class="fa fa-plus-square-o"></i> New Farm</a>
            </div>
            <div class="panel-body ">
               <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed searchtable">
                  <thead>
                     <tr>
                        <th>Farm Type</th>
                        <th>Farm Name</th>
                        <th>Contact Person</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($farms as $farm)
                     <tr >
                        <td>{{$farm->farmtype->name}}</td>
                        <td>{{$farm->farm_name}}</td>
                        <td>{{$farm->contact_person}}</td>
                        <td>{{$farm->phone}}</td>
                        <td>{{$farm->email}}</td>
                        <td>{{$farm->city}}</td>
                        <td>{{$farm->address_line1}}</td>
                        <td>
                           {!!edit_btn('farms.edit',$farm->uuid)!!}
                           {!!delete_btn('farms.destroy',$farm->uuid)!!}

                        </td>
                     </tr> 
                  @endforeach  
         </tbody>
      </table>
   </div>
</div>
<!-- END panel-->
</div>
</div>
</section>
</div>
@endsection
