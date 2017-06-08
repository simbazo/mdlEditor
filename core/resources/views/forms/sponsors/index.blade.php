@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
         <!-- START panel-->
         <div id="panelDemo14" class="panel panel-primary">
            <div class="panel-heading">
               Sponsors List
               <a href="{{ route('sponsors.create') }}" class="btn btn-primary btn-xs pull-right active" data-toggle="ajax-modal"><i class="fa fa-plus-square-o"></i> New Ngo</a>
            </div>
            <div class="panel-body ">
               <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed searchtable">
                  <thead>
                     <tr>
                        <th>Sponsor Type</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($sponsors as $sponsor)
                     <tr >
                        <td>{{$sponsor->types->name}}</td>
                        <td>{{$sponsor->sponsor_name}}</td>
                        <td>{{$sponsor->phone}}</td>
                        <td>{{$sponsor->email}}</td>
                        <td>{{$sponsor->city}}</td>
                        <td>{{$sponsor->address_line1}}</td>
                        <td>
                           {!!edit_btn('sponsors.edit',$sponsor->uuid)!!}
                           {!!delete_btn('sponsors.destroy',$sponsor->uuid)!!}
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
