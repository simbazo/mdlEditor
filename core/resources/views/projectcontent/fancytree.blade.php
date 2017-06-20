@extends('templates._master')
@section('content')
<div class="col-md-12">
    <section class="contents">
<div class="row">
    <div class="col-md-12 box " id="ajax-list">
        <div class="panel panel-primary">
            <div class="panel-heading content-header">
              <div class="row">
                <div class="col-md-6">
                <button class="mb-sm btn-lg btn btn-success btn-outline" id="edit-content">Edit List</button>
                </div>
                <div class="col-md-6">
                <button type="button" class="mb-sm btn-lg btn btn-success btn-outline" id="preview-mode">Enable Preview</button>
                  <div class="form-group  pull-right">
                    <input type="text" name="" id="searchInput" class="form-control input-md" placeholder="Search...">
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
            <div class="col-md-12 table-responsive table01" id="preview-separate">
            <table class="table  tree-2  table-fixed searchtable" id="yourTable">
            <thead> 
                        <tr>
                            <th style="width: 2%"></th>
                            <th class="tr-previewd list-iconclass"><!--<p class="non pen">{{trans('Sibling')}}</p>--></th>
                            <th class="list-nameclass" style="width: 30%">{{trans('application.name')}} </th>
                            <th class="tr-previewd list-iconclass" style="width: 13%"><!--<p class="non pen">Child</p>--></th>
                            <th class="tr-previewd list-iconclass" style="width: 12%">{{trans('Act')}}</th>
                            <th class="tr-previewd list-iconclass" style="width: 13%">{{trans('PDF')}}</th>
                            <th class="tr-previewd " style="width: 30%">{{trans('application.updated_at')}}</th>
                        </tr>
                        </thead>
                        <tbody class="fbody">
                          
                
                        </tbody>       
            </table>
            </div>
            <div id="contentpreview">
            
            </div>  
            </div>
        </div>
        <!-- End  Hover Rows  -->
    </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="ajax-content">
            <!-- all okay-->
        </div>
    </div>
</section>
</div>
@endsection

  @push('ccs')
<link rel="stylesheet" href="{{asset('assets/ckeditor/css/samples.css')}}">
<link rel="stylesheet" href="{{asset('assets/ckeditor/toolbarconfigurator/lib/codemirror/neo.css')}}">
 {{-- All okay --}}
@endpush

@push('js')
 <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endpush