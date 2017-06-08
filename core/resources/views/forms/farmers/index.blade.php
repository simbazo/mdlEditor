@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
         <!-- START panel-->
         <div id="panelDemo14" class="panel panel-primary">
            <div class="panel-heading">
               Farmers List
               <a href="{{ route('farmers.create') }}" class="btn btn-primary btn-xs pull-right active" data-toggle="ajax-modal"> <i class="fa fa-user-plus"></i> New Farmer</a>
            </div>
            <div class="panel-body ">
               <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed searchtable">
                  <thead>
                     <tr>
                        <th>Full Name</th>
                        <th>ID Number</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Race</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($farmers as $farmer)
                     <tr >
                        <td>{{$farmer->first_name . ' '. $farmer->last_name}}</td>
                        <td>{{$farmer->id_number}}</td>
                        <td>{{$farmer->dob}}</td>
                        <td>{{$farmer->gender->name or ' '}}</td>
                        <td>{{$farmer->race->name}}</td>
                        <td>{{$farmer->phone}}</td>
                        <td>{{$farmer->email}}</td>
                        <td>
                           {!!show_btn('farmers.show',$farmer->uuid)!!}
                           {!!edit_btn('farmers.edit',$farmer->uuid)!!}
                           {!!delete_btn('farmers.destroy',$farmer->uuid)!!}
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
