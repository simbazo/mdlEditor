@extends('templates.modal')
@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h5 class="modal-title">{{trans('application.edit_questions')}}</h5>
        </div>
        {!!Form::model($question,['route'=>['questions.update',$question->uuid],'method'=>'PATCH','files'=>true,'id'=>'recipe_form', 'class'=>'ajax-submit'])!!}
        <div class="modal-body">
              @include('questions.partials._form')
        </div>
        <div class="modal-footer">
            {!! form_buttons() !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection