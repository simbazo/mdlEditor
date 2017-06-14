@extends('templates._master')

@section('content')

@push('modal')
<div id="myModal" class="modal fade">
    <div class="modal-dialog" style="width: 70%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h5 class="modal-title">{{trans('PROJECT LIST')}}</h5>
             

            <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <a href="{{ route('projects.create') }}" class="btn btn-xs btn-warning " data-toggle="ajax-modal"> <i class="icon-pencil"></i> {{trans('application.new_project')}}</a>
            </div>
        </div>
        <div class="modal-body">
                    <table class="table table-bordered table-striped table-hover datatable">
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
                            <td>{{ $project->name }} </td>
                            <td>{{ $project->user->name or ''}}</td>
                            <td style="width: 6%;">
                            {!!select_btn('pcontent',$project->uuid)!!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
      </div>
    </div>
</div>
</div>
@endpush


@endsection
@push('js')
@include('partials._scripts')
@endpush