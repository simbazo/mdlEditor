<div class="col-md-6">
   <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed searchtable" id="clickable">
      <thead> 
         <tr> 
            <th>{{trans('application.name')}} </th>
           <!-- <th> </th>-->
            <th >
               <h3 class="box-title pull-right">
                  <div class="box-tools">
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-xs pull-right" data-toggle="ajax-modal"> <i class="fa fa-puzzle"></i> {{trans('application.new_product')}}</a>
                 </div>
              </h3>
           </th>
        </tr>
     </thead>
     <tbody class="list-group">
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
<div class="col-md-6" id="contentpreview">
   
</div>

