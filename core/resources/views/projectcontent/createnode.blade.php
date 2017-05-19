@extends('templates.modal')
@section('content')
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title">{{trans('application.new_node')}}</h5>
    </div>
    {!! Form::open(['route' => ['nodechild'], 'class'=>"ajax-submit"]) !!}
    <div class="modal-body">
        <div class="form-group">
        {!! Form::label('parentNode', trans('application.parent_node')) !!}
        <input type="text" class="form-control input-sm" value="{{$parent->name}}" disabled>
        <input type="hidden" name="Parent_ID" value="{{$parent->uuid}}">
    </div>
        
    <div class="form-group">
        {!! Form::label('name', trans('application.node_name')) !!}
        {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', trans('application.description')) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control input-sm', 'required','rows'=>4,'cols'=>0]) !!}
    </div>

    </div>
    <div class="modal-footer">
        {!! form_buttons() !!}
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection