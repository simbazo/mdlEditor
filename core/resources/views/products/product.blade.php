<div class="col-md-6">
   <table class="table table-striped table-hover dtr-inline collapsed searchtable" id="clickable">
      <thead> 
         <tr> 
            <th>{{trans('application.name')}} </th>
           <!-- <th> </th>-->
            <th >
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-xs pull-right" data-toggle="ajax-modal"> <i class="fa fa-puzzle"></i> {{trans('application.new_product')}}</a>
           </th>
        </tr>
     </thead>
     <tbody class="fbody">
      @foreach($products as $product)
      <tr data-href="{{route('productspreview',$product->id)}}" data-toggle="ajax-preview-list" class="clickable-row">
         <td><a href="{{route('productspreview',$product->id)}}" data-toggle="ajax-preview-list">{{ $product->product_name}}</a></td>
         <td>
         </td><!--
         <td style="text-align: right;">
           {!!productpreview_btn('productspreview',$product->id)!!}
         </td>-->
      </tr>
      @endforeach
   </tbody>      
</table>
</div>
<div class="col-md-6" id="contentpreview" style="border-left: 1px solid #ccc;">
   
</div>

