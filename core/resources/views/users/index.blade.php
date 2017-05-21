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
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-xs pull-right" data-toggle="ajax-modal"> <i class="fa fa-user-plus"></i> {{trans('application.new_user')}}</a>
                        </div>
                    </h3>
                </div>
            <div class="panel-body">
                    <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed" role="grid" aria-describedby="datatable2_info" style="width: 988px;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{trans('application.name')}} </th>
                            <th>{{trans('application.username')}} </th>
                            <th>{{trans('application.email')}} </th>
                            <th>{{trans('application.action')}} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td></td>
                            <td>{{ $user->name}} </td>
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