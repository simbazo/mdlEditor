@extends('templates._master')

@section('content')
<div class="col-md-12">
    <section class="contents">
<div class="row">
    <div class="col-md-12 box" id="ajax-list">
        <div class="panel panel-primary">
            <div class="panel-body">
             <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed display" role="grid" aria-describedby="datatable2_info" style="width: 988px;">
                        <thead>
                        <tr>
                            <th style="width: 5%"></th>
                            <th>ID</th>
                            <th>{{trans('application.name')}} </th>
                            <th>{{trans('application.short_description')}} </th>
                            <th>{{trans('application.user_created')}} </th>
                            <th>{{trans('application.action')}}</th>
                        </tr>
                        </thead>
                        <tbody id="tr">
                        @foreach($content as $con)
                        <tr>
                            <td></td>
                            <td class="id">{{$con->uuid}} <input type="hidden" class="content-start" value="{{$con->ContentStart_ID}}"></td>
                            <td><a id="username"  data-type="text" data-pk="{{$con->uuid}}" data-url="{{route('projectcontent.update',$con->uuid)}}"  href="#">{{$con->name or ''}} <i class="fa fa-pencil"></a></td>
                            <td>{{$con->short_description}}</td>
                            <td>{{$con->user->name or ''}}</td>
                            <td>{!!_edit_btn('projectcontent.edit',$con->ContentStart_ID)!!}</td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        <!-- End  Hover Rows  -->
    </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="ajax-content">
            
        </div>
    </div>
</section>
</div>

@endsection

@push('ccs')
<link rel="stylesheet" href="{{asset('assets/ckeditor/css/samples.css')}}">
<link rel="stylesheet" href="{{asset('assets/ckeditor/toolbarconfigurator/lib/codemirror/neo.css')}}">

@endpush

@push('js')
 <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endpush
@push('datatable')
@endpush