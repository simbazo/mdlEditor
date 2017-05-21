@extends('templates._master')

@section('content')

<div class="col-md-12">
    <section class="content" id="ajaxcontent">
<div class="row">
    <div class="col-md-12 box">
        <div class="panel panel-default">
                <div class="box-header with-border">
                    <h3 class="box-title pull-right">
                        <div class="box-tools">
                            <a href="{{ route('projects.create') }}" class="btn btn-primary btn-xs pull-right" data-toggle="ajax-modal"> <i class="icon-puzzle"></i> {{trans('application.new_project')}}</a>
                        </div>
                    </h3>
                </div>
            <div class="panel-body">
                    <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed" role="grid" aria-describedby="datatable2_info" style="width: 988px;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{trans('application.logo')}} </th>
                            <th>{{trans('application.name')}} </th>
                            <th>{{trans('application.short_description')}} </th>
                            <th>{{trans('application.user_created')}} </th>
                            <th>{{trans('application.user_assigned')}}</th>
                            <th>{{trans('application.date_created')}} </th>
                            <th>{{trans('application.action')}} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td></td>
                            <td>{{ $project->logo}} </td>
                            <td>{{ $project->name }} </td>
                            <td>{{ $project->short_description }} </td>
                            <td>{{ $project->user_created}}</td>
                            <td>{{ $project->user_assigned}}</td>
                            <td>{{ $project->created_at }} </td>
                            <td>
                                
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
        <!-- End  Hover Rows  -->
    </div>
</div>
</section>
</div>

@endsection