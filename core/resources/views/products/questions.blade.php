
<div class="row">
    <div class="col-md-12 box " id="ajax-list">
        <div class="panel panel-primary">
            <div class="panel-heading content-header">
              <div class="row">
                <div class="col-md-4">
                <h4>Questions</h4>
                </div>
                <div class="col-md-6"><!--
                <a href="{{route('productlist.index')}}" class="mb-sm btn-lg btn btn-success btn-outline ajax-preview-list" id="placed">Enable Preview</a>
                  <div class="form-group  pull-right">
                    <input type="text" name="" id="searchInput" class="form-control input-md" placeholder="Search...">
                  </div>-->
                </div>
                <div class="col-md-2">
                        <div class="pull-right">
                      <a href="{{ route('products.create') }}" class="btn btn-danger btn-xs pull-right" data-toggle="ajax-modal"> <i class="fa fa-list"></i> {{trans('application.new_product')}}</a>
                        </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
            <div class="col-md-12 table-responsive table01" id="preview-separate">
            <div id="contentspace">
            @include('products.table')
            </div>
            </div>
            <div id="contentpreview">
            
            </div>  
            </div>
        </div>
        <!-- End  Hover Rows  -->
    </div>
    </div>