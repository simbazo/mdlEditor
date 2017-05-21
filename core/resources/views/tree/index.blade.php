@extends('templates._master')

@section('content')

<div class="col-md-12">
    <section class="content" id="ajaxcontent">
<div class="row">
    <div class="col-md-12 box">
        <div class="panel panel-default" id="content">
                <div class="box-header with-border">
                    <h3 class="box-title pull-right">
                        <div class="box-tools">
                           <!-- <a href="{{ route('content.create') }}" class="btn btn-primary btn-xs pull-right" data-toggle="ajax-modal"> <i class="icon-pencil"></i> {{trans('application.add_content')}}</a>--><!--
                            <a href="{{ route('content.create') }}" class="btn btn-primary btn-xs pull-right"> <i class="icon-pencil"></i> {{trans('application.add_content')}}</a>-->
                        </div>
                    </h3>
                </div>
            <div class="panel-body">
                  <div id="accordion" role="tablist" aria-multiselectable="true" class="panel-group">
                      <div id="ajax-content">
                             
                      </div>
                         
                           
                  </div>

            </div>
        </div>
        <!-- End  Hover Rows  -->
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
<script>
   CKEDITOR.replace( 'editor1' );
  </script>
@endpush