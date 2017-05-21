<table class="table table-striped table-hover dataTable datatable dtr-inline collapsed">
    <thead>
        <tr>
            <th>{{trans('application.name')}} </th>
            <th>{{trans('application.action')}} </th>
            <th >
             <h3 class="box-title pull-right">
                <div class="box-tools">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-xs pull-right" data-toggle="ajax-modal"> <i class="fa fa-list"></i> {{trans('application.new_list')}}</a>
                </div>
            </h3>
        </th>
    </tr>
</thead>
<tbody class="list-group">
    @foreach($products as $product)
    <tr>
        <td>{{ $product->product_name}}</td>
        <td>
            {!!edit_btn('products.edit',$product->id)!!}
        </td>
        <td></td>
    </tr>
    @endforeach
</tbody>      
</table>