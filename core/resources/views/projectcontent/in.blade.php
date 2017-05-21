@extends('templates._master')

@section('content')
<div class="row">
    <div class="col-md-12 box">
        <div class="panel panel-primary">
            <div class="panel-body">
                <table id="expandable" class="display table table-striped table-hover dataTable dtr-inline collapsed" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <section class="contents">
<div class="row">
    <div class="col-md-12 box" id="ajax-list">
        <div class="panel panel-primary">
            <div class="panel-body">
             <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed display" role="grid" aria-describedby="datatable2_info" style="width: 988px;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>{{trans('application.name')}} </th>
                            <th>{{trans('application.short_description')}} </th>
                            <th>{{trans('application.user_created')}} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($content as $con)
                        <tr>
                            <td></td>
                            <td>{{$con->uuid}}</td>
                            <td><a data-toggle="ajax-content" data-rel="tooltip" data-placement="top" href="{{route('projectscontet.edit',$con->ContentStart_ID)}}">{{$con->name or ''}}</a></td>
                            <td>{{$con->short_description}}</td>
                            <td>{{$con->user->name or ''}}</td>
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
<script>
     /* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}
 
$(document).ready(function() {
    var table = $('#expandable').DataTable( {
        "ajax": "/assets/ajax/ajax.txt",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "salary" }
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#expandable tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
 </script>
@endpush