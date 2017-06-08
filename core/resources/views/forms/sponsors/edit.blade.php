@extends('templates.modal')
@section('content')
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title">Edit Sponsor</h5>
    </div>
    {!! Form::model($sponsors,['route' => ['sponsors.update',$sponsors->uuid], 'class'=>"ajax-submit",'method'=>'PATCH']) !!}
    <div class="modal-body">
        @include('forms.sponsors.partials._form')
    </div>
    <div class="modal-footer">
        {!! form_buttons() !!}
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection