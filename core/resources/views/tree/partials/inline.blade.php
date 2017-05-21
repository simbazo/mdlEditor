@extends('templates._master')

@section('content')

<div class="col-md-12">
    <section class="content" id="ajaxcontent">
  <div class="row">
    <div class="col-md-12 box">

        <div class="panel panel-default">
                <div class="box-header with-border">
                   <div class="col-md-12">
                     <p>Click Bellow to start Editing</p>
                   </div>
                </div>
            <div class="panel-body" id="pb">
              {!! Form::open(['route' => ['content.store'], 'class'=>"ajax-submit"]) !!}
              <div class="modal-body">
            <div class="row">
            <input type="hidden" name="project_id" value="{{Session::get('tree.0')}}">
            <div class="col-md-12">
            {!! Form::textarea('content',null,['class'=>'form-control vg','id'=>'editor1','rows'=>'10','cols'=>'80','placeholder'=>'Type your content here','required'])!!}
            </div>
        </div>
  
    </div>
    <div class="modal-footer">
        {!! form_buttons() !!}
    </div>
    {!! Form::close() !!}
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
  CKEDITOR.disableAutoInline = true;
  CKEDITOR.inline( 'editor1',{
    tabSpaces: 4
  });
</script>
@endpush