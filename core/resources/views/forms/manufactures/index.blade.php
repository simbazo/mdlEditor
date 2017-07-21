@extends('templates._master')
@section('content')
<div class="col-md-12">
 <section class="contents">
  <div class="row"> 
   <div class="col-lg-12">
      <!-- START panel-->
      <div id="panelDemo14" class="panel panel-primary">
         <div class="panel-heading">
            Manufacture
            <a href="{{ route('manufactures.create') }}" class="btn btn-primary btn-xs pull-right active" data-toggle="ajax-modal"> <i class="fa fa-user-plus"></i> New Manufacture</a>
         </div>
         <div class="panel-body ">
            <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed searchtable">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Phone</th>
                     <th>Email</th>
                     <th>Country</th>
                     <th>Address</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($manufactures as $manufacture)
                  <tr >
                     <td>{{$manufacture->name}}</td>
                     <td>{{$manufacture->phone}}</td>
                     <td>{{$manufacture->email}}</td>
                     <td>{{$manufacture->country->name}}</td>
                     <td>{{$manufacture->address1}}</td>
                     <td>
                        {!!show_btn('manufactures.show',$manufacture->uuid)!!}
                        {!!edit_btn('manufactures.edit',$manufacture->uuid)!!}
                        {!!delete_btn('manufactures.destroy',$manufacture->uuid)!!}
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
