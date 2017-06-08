@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
         <!-- START panel-->
         <div id="panelDemo14" class="panel panel-primary">
            <div class="panel-heading">
               Ngos List
               <a href="{{ route('ngos.create') }}" class="btn btn-primary btn-xs pull-right active" data-toggle="ajax-modal"><i class="fa fa-plus-square-o"></i> New Ngo</a>
            </div>
            <div class="panel-body ">
               <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed searchtable">
                  <thead>
                     <tr>
                        <th>NGO Type</th>
                        <th>Acronym</th>
                        <th>Name</th>
                        <th>Contact Person</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($ngos as $ngo)
                     <tr >
                        <td>{{$ngo->ngotype->name}}</td>
                        <td>{{$ngo->acronym}}</td>
                        <td>{{$ngo->name}}</td>
                        <td>{{$ngo->contact_person}}</td>
                        <td>{{$ngo->phone}}</td>
                        <td>{{$ngo->email}}</td>
                        <td>{{$ngo->city}}</td>
                        <td>{{$ngo->address_line1}}</td>
                        <td>
                           {!!edit_btn('ngos.edit',$ngo->uuid)!!}
                           {!!delete_btn('ngos.destroy',$ngo->uuid)!!}
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
