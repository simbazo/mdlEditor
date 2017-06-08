@extends('templates.modal')
@section('content')
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title">Farmer : {{$farmer->first_name. ' '. $farmer->last_name}}</h5>
    </div>
    {!! Form::model($farmer,['route' => ['farmer.farm',$farmer->uuid], 'class'=>"ajax-submit",'method'=>'POST']) !!}
    <div class="modal-body">
        <div class="form-group">
    {!! Form::label('gender', trans('Farms List')) !!}
    {!! Form::select('farmer_id', $farms,null, ['class' => 'form-control chosen-select input-sm', 'required']) !!}
</div>
    </div>
    <div class="modal-footer">
        {!! form_buttons() !!}
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection