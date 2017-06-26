@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
         <!-- START panel-->
         <div id="panelDemo14" class="panel panel-primary">
            <div class="panel-heading">
               Products
               <a href="#" class="btn btn-primary btn-xs pull-right active" data-toggle="ajax-modal"><i class="fa fa-plus-square-o"></i> New Form</a>
            </div>
            <div class="panel-body ">
               <table class="table table-striped table-hover dataTable datatable dtr-inline collapsed searchtable">
                  <thead>
                     <tr>
                        <th>Form Type</th>
                        <th>Form Name</th>
                        <th>Action</th>
                     </tr>
                  </thead> 
                  <tbody>
                      @foreach($products as $product)
                        <tr >
                            <td>{{$product->product_type}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>
                                {!!show_btn('dforms.show',$product->uuid)!!}
                                {!!edit_btn('dforms.edit',$product->uuid)!!}
                                {!!delete_btn('dforms.destroy',$product->uuid)!!}
                            </td>
                        </tr>
                     @endforeach
                  </tbody>
         </tbody>
      </table>
   </div>
</div>
<!-- END panel-->
</div>
</div>
</section>
</div>
@endsection
