@extends('templates.modal')
@section('content')
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title">New Farm</h5>
    </div>
    {!! Form::open(['route' => ['farms.store'], 'class'=>"ajax-submit"]) !!}
    <div class="modal-body">
        @include('forms.farm.partials._form')
    </div>
    <div class="modal-footer">
        {!! form_buttons() !!}
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection