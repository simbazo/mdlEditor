@extends('templates.modal')
@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h5 class="modal-title">{{trans('application.edit_user')}}</h5>
        </div>
            {!! Form::model($contents, ['route' => ['projectcontent.update', $contents->uuid], 'method'=>'PATCH', 'class'=>"ajax-submit"]) !!}
                <div class="modal-body">
                 
            <input type="hidden" name="Parent_ID" value="{{$contents->Parent_ID}}">
            <input type="hidden" name="ProjectContent_ID" value="{{$contents->ProjectContent_ID}}">
            <input type="hidden" name="Header" value="{{$contents->Header}}">
            <input type="hidden" name="Level_ID" value="{{$contents->Level_ID}}">
            <input type="hidden" name="SortOrder" value="{{$contents->SortOrder}}">
            <input type="hidden" name="Topic" value="{{$contents->Topic}}">
            <div class="col-md-12">
            {!!Form::textarea('Content',null,['class'=>'form-control'])!!}                </div>
                <div class="modal-footer">{!! form_buttons() !!}</div>
            {!! Form::close() !!}
    </div>
</div>
@endsection