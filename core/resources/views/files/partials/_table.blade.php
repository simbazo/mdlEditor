<table class="table table-striped table-hover dataTable datatable dtr-inline collapsed searchtable">
    <thead>
        <tr>
            <th>{{trans('application.name')}} </th>
            <th>Node ID</th>
            <th style="text-align: right;">{{trans('application.action')}}</th>
    </tr>
</thead>
<tbody class="list-group">
    @foreach($files as $file)
    <tr>
        <td><a href="{{route('files.show',$file->uuid)}}">{{ $file->name}}</a></td>
        <td>{{ $file->node_id}}</td>
        <td style="text-align: right;">
            {!!show_btn('files.show',$file->uuid)!!}
            {!!delete_btn('files.destroy',$file->uuid)!!}
        </td>
    </tr>
    @endforeach
</tbody>      
</table>