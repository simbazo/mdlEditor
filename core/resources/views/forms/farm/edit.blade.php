@extends('templates.modal')
@section('content')
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title">Edit Farm</h5>
    </div>
    {!! Form::model($farms,['route' => ['farms.update',$farms->uuid], 'class'=>"ajax-submit",'method'=>'PATCH']) !!}
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