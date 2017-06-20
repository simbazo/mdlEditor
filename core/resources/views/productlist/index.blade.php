<table class="table table-striped table-hover dtr-inline collapsed searchtable">
    <thead>
        <tr>
            <th>{{trans('application.name')}} </th>
            <th></th>
            <th >
             <h3 class="box-title pull-right">
                <div class="box-tools">
                    <a href="{{ route('productlist.create') }}" class="btn btn-primary btn-xs pull-right" data-toggle="ajax-modal"> <i class="fa fa-list"></i> {{trans('application.new_list')}}</a>
                </div>
            </h3>
        </th>
    </tr>
</thead>
<tbody class="fbody">
    @foreach($lists as $product)
    <tr>
        <td>{{ $product->name}}</td>
        <td style="text-align: right;">
            {!!edit_btn('productlist.edit',$product->uuid)!!}
            {!!delete_btn('productlist.destroy',$product->uuid)!!}
        </td>
        <td></td>
    </tr>
    @endforeach
</tbody>      
</table>