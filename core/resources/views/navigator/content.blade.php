@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
       <!-- START panel-->
       <div  id="ajax-list" class="panel panel-primary">
        <div class="panel-heading">
         <div class="row">
          <div class="col-md-6">
            <a class="btn btn-primary active" href="
            @if($project->Parent_ID == 1 || $project->Parent_ID == 0)
            {{url('/')}}
            @else
            {{route('navigator.edit',$project->Parent_ID)}}
            @endif ">
            <i class="fa fa-chevron-left" aria-hidden="false"></i> 
          </a> &nbsp;<b style="text-transform: uppercase;">{{$project->parent->name or ''}}</b>
        </div>
        <div class="col-md-6">
         <div class="form-group  pull-right">
           <div class="dropdown">
             <button class="btn btn-primary dropdown-toggle active" type="button" data-toggle="dropdown">New 
              <span class="caret"></span></button>
              <ul class="dropdown-menu pull-right">
                <li><a href="{{route('navigator.show',$project->uuid)}}"  data-toggle="ajax-modal"><i class="fa fa-folder-open" aria-hidden="true"></i> Sub Project</a></li>
                <li><a href="{{route('nodechilds',$project->uuid)}}" data-toggle="ajax-modal"><i class="fa fa-file-o" aria-hidden="true"></i> File</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-body ">
     <table class="table table-striped table-hover datatable">
      <thead>
        <tr>
         <th>{{trans('application.project_name')}} </th>
         <th>{{trans('application.owner')}} </th>
         <th>{{trans('application.action')}} </th>
       </tr>
     </thead> 
     <tbody>
       @foreach($content as $folder)
       <tr>
        <td><i class="fa fa-folder" aria-hidden="true"></i> {{ $folder->name  or ''}} </td>
        <td>{{ $folder->user->first_name  or ''}}</td>
        <td style="width: 6%;">
          @if(count($folder->ContentStart_ID) >0)
          {!!editj_btn('projectcontent.edit',$folder->ContentStart_ID)!!}
          @endif
          <a href="{{route('navigator.edit',$folder->uuid)}}" class="btn btn-warning btn-xs" data-placement="top" data-rel="tooltip" title="Show or add sub items"><i class="fa fa-share"></i></a>
        </td>
      </tr>
      @endforeach
      @if(count($sub) >0)
      @foreach($sub as $child)
      <tr>
        <td><i class="fa fa-file-o" aria-hidden="true"></i> {{ $child->Header  or ''}} </td>
        <td>{{ $child->user->first_name  or ''}}</td>
        <td style="width: 6%;">{!!editj_btn('projectcontent.edit',$child->ID)!!}
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </tbody>
</table>
</div>
</div>
</div>
</div>
<!-- END panel-->
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