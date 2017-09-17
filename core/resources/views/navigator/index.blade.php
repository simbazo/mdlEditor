@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
       <!-- START panel-->
       <div id="panelDemo14" class="panel panel-primary">
        <div class="panel-heading">
         <div class="row">
          <div class="col-md-6">
            <h5>PROJECT LIST</h5>
          </div>
          <div class="col-md-6">
           <div class="form-group  pull-right">
             <a  href="{{ route('projects.create') }}" class="btn btn-primary active" data-toggle="ajax-modal"> NEW PROJECT <i class="fa fa-plus" aria-hidden="true"></i></a>
           </div>
         </div>
       </div>
     </div>
     <div class="panel-body ">
     <table class="table table-striped table-hover datatable">
        <thead>
          <tr>
            <th>{{trans('application.project_name')}} </th>
            <th>{{trans('application.owner')}} </th>
            <th>{{trans('application.action')}} </th>
          </tr>
        </thead>
        <tbody>
          @foreach($projects as $project)
          <tr>
            <td><i class="fa fa-folder" aria-hidden="true"></i> {{ $project->name }} </td>
            <td>{{ $project->user->first_name or ''}}</td>
            <td style="width: 6%;">
            {!!edit_btn('projects.edit',$project->uuid)!!}
            <a href="{{route('navigator.edit',$project->uuid)}}" class="btn btn-warning btn-xs" data-placement="top" data-rel="tooltip" title="Show Project Items"><i class="fa fa-share"></i></a>
            {{-- {!!select_btn('pcontent',$project->uuid)!!} --}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- END panel-->
</div>
</div>
</section>
</div>
@endsection