@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
         <!-- START panel-->
         <div id="panelDemo14" class="panel panel-primary">
            <div class="panel-heading">
               <div class="row">
                  <div class="col-md-6">
                     <h5>Files Manager</h5>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group  pull-right">
                       <input type="text" name="" id="searchInput" class="form-control input-md" placeholder="Search...">
                    </div>
                 </div>
              </div>
           </div>
           <div class="panel-body ">

            {!! Form::open(['route' => ['files.store'],'id'=>'fileupload','files'=>true]) !!}
            <!-- Redirect browsers with JavaScript disabled to the origin page-->
            <noscript>
               <input type="hidden" name="redirect" value="{{route('files.index')}}">
            </noscript>
            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload-->
            <div class="row fileupload-buttonbar">
               <div class="col-lg-7">
                  <!-- The fileinput-button span is used to style the file input field as button-->
                  <span class="btn btn-success fileinput-button"><i class="fa fa-fw fa-plus"></i>
                     <span>Add files...</span>
                     <input type="file" name="files" multiple="">
                  </span>
                  <button type="submit" class="btn btn-primary start"><i class="fa fa-fw fa-upload"></i>
                     <span>Start upload</span>
                  </button>
                  <button type="reset" class="btn btn-warning cancel"><i class="fa fa-fw fa-times"></i>
                     <span>Cancel upload</span>
                  </button>
                  <button type="button" class="btn btn-danger delete"><i class="fa fa-fw fa-trash"></i>
                     <span>Delete</span>
                  </button>
                  <!-- The global file processing state-->
                  <span class="fileupload-process"></span>
               </div>
               <!-- The global progress state-->
               <div class="col-lg-5 fileupload-progress fade">
                  <!-- The global progress bar-->
                  <div role="progressbar" aria-valuemin="0" aria-valuemax="100" class="progress progress-striped active">
                     <div style="width:0%;" class="progress-bar progress-bar-success"></div>
                  </div>
                  <!-- The extended global progress state-->
                  <div class="progress-extended">&nbsp;</div>
               </div>
            </div>
            <!-- The table listing the files available for upload/download-->
            <table role="presentation" class="table table-striped">
               <tbody class="files"></tbody>
            </table>
            {!!Form::close()!!}
            <script id="template-upload" type="text/x-tmpl">
               {% for (var i=0, file; file=o.files[i]; i++) { %}
               <tr class="template-upload fade">
                <td>
                  <span class="preview"></span>
               </td>
               <td>
                  <p class="name">{%=file.name%}</p>
                  <strong class="error text-danger"></strong>
               </td>
               <td>
                  <p class="size">Processing...</p>
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
               </td>
               <td>
                  {% if (!i && !o.options.autoUpload) { %}
                  <button class="btn btn-primary start" disabled>
                   <em class="fa fa-fw fa-upload"></em>
                   <span>Start</span>
                </button>
                {% } %}
                {% if (!i) { %}
                <button class="btn btn-warning cancel">
                   <em class="fa fa-fw fa-times"></em>
                   <span>Cancel</span>
                </button>
                {% } %}
             </td>
          </tr>
          {% } %}
       </script>
       <!-- The template to display files available for download-->
       <script id="template-download" type="text/x-tmpl">
         {% for (var i=0, file; file=o.files[i]; i++) { %}
         <tr class="template-download fade">
          <td>
            <span class="preview">
              {% if (file.thumbnailUrl) { %}
              <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
              {% } %}
           </span>
        </td>
        <td>
         <p class="name">
           {% if (file.url) { %}
           <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
           {% } else { %}
           <span>{%=file.name%}</span>
           {% } %}
        </p>
        {% if (file.error) { %}
        <div><span class="label label-success">success</span> {%=file.error%}</div>
        {% } %}
     </td>
     <td>
      <span class="size">{%=o.formatFileSize(file.size)%}</span>
   </td>
   <td>
      {% if (file.deleteUrl) { %}
      <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
       <em class="fa fa-fw fa-trash"></em>
       <span>Delete</span>
    </button>
    {% } else { %}
    <button class="btn btn-warning cancel">
       <em class="fa fa-fw fa-times"></em>
       <span>Cancel</span>
    </button>
    {% } %}
 </td>
</tr>
{% } %}
</script>
       @include('files.partials._table')
</div>
</div>
</div>
<!-- END panel-->
</div>
</div>
</section>
</div>
@endsection

@push('css')

@endpush

@push('js')

<!-- =============== PAGE VENDOR SCRIPTS ===============-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included-->
<script src="{{asset('assets/vendor/jquery-ui/ui/widget.js')}}"></script>
<!-- The Templates plugin is included to render the upload/download listings-->
<script src="{{asset('assets/vendor/blueimp-tmpl/js/tmpl.js')}}"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality-->
<script src="{{asset('assets/vendor/blueimp-load-image/js/load-image.all.min.js')}}"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality-->
<script src="{{asset('assets/vendor/blueimp-canvas-to-blob/js/canvas-to-blob.js')}}"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads-->
<script src="{{asset('assets/vendor/blueimp-file-upload/js/jquery.iframe-transport.js')}}"></script>
<!-- The basic File Upload plugin-->
<script src="{{asset('assets/vendor/blueimp-file-upload/js/jquery.fileupload.js')}}"></script>
<!-- The File Upload processing plugin-->
<script src="{{asset('assets/vendor/blueimp-file-upload/js/jquery.fileupload-process.js')}}"></script>
<!-- The File Upload image preview & resize plugin-->
<script src="{{asset('assets/vendor/blueimp-file-upload/js/jquery.fileupload-image.js')}}"></script>
<!-- The File Upload audio preview plugin-->
<script src="{{asset('assets/vendor/blueimp-file-upload/js/jquery.fileupload-audio.js')}}"></script>
<!-- The File Upload video preview plugin-->
<script src="{{asset('assets/vendor/blueimp-file-upload/js/jquery.fileupload-video.js')}}"></script>
<!-- The File Upload validation plugin-->
<script src="{{asset('assets/vendor/blueimp-file-upload/js/jquery.fileupload-validate.js')}}"></script>
<!-- The File Upload user interface plugin-->
<script src="{{asset('assets/vendor/blueimp-file-upload/js/jquery.fileupload-ui.js')}}"></script>
<!-- Demo-->
<script src="{{asset('assets/js/demo/demo-upload.js')}}"></script>
@endpush