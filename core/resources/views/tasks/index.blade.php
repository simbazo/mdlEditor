@extends('templates._master')

@section('content')

<div class="col-md-12">
    <section class="content" id="ajaxcontent">
<div class="row">
    <div class="col-md-12 box">
        <div class="panel panel-primary">
                <div class="panel-heading">
                Tasks List
                <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-xs pull-right active" data-toggle="ajax-modal"> <i class="fa fa-plus-square-o"></i> {{trans('application.new_task')}}</a>
                </div>
            <div class="panel-body">
                    <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed" role="grid" aria-describedby="datatable2_info" style="width: 988px;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{trans('application.task_title')}} </th>
                            <th>{{trans('application.task_owner')}} </th>
                            <th>{{trans('application.assigned_users')}} </th>
                            <th>{{trans('application.project')}} </th>
                            <th>{{trans('application.content_header')}} </th>
                            <th>{{trans('application.action')}} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $user)
                        <tr>
                            <td></td>
                            <td>{{ $user->name}} </td>
                            <td>{{ $user->username }} </td>
                            <td>{{ $user->email }} </td>

                            <td>{{ $user->username }} </td>
                            <td>{{ $user->email }} </td>
                            <td>
                                {!!show_btn('users.show',$user->uuid)!!}
                                {!!edit_btn('users.edit',$user->uuid)!!}
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
@push('js')
@include('tasks.partials._scripts')
@endpush