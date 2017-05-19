@extends('templates.modal')
@section('content')
<div class="modal-dialog" style="width: 70%">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title">{{trans('application.add_content')}}</h5>
    </div>
    {!! Form::open(['route' => ['content.store'], 'class'=>"ajax-submit"]) !!}
    <div class="modal-body">
    @include('tree.partials._form')
    </div>
    <div class="modal-footer">
        {!! form_buttons() !!}
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection