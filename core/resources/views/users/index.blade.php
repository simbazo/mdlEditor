@extends('templates._master')

@section('content')

<div class="col-md-12">
    <section class="content" id="ajaxcontent">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
                <div class="panel-heading">
                  <div class="row">
                       <div class="col-md-6"><h5>USERS LIST </h5></div>
                  <div class="col-md-6">
                       <a href="{{ route('users.create') }}" class="btn btn-primary pull-right active" data-toggle="ajax-modal">NEW USER</a>
                  </div>
                  </div>
                </div>
            <div class="panel-body">
                    <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed" role="grid" aria-describedby="datatable2_info" style="width: 988px;">
                        <thead>
                        <tr>
                            <th>{{trans('application.name')}} </th>
                            <th>{{trans('application.username')}} </th>
                            <th>{{trans('application.email')}} </th>
                            <th>{{trans('application.action')}} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->first_name . ' '. $user->last_name}} </td>
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