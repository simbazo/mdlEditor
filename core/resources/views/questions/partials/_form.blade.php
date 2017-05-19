<div class="form-group">
    {!! Form::label('users_assigned', trans('application.question_type')) !!}
    {!! Form::select('list_id',$lists, null, ['class' => 'form-control chosen-select input-sm']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', trans('application.question')) !!}
    {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', trans('application.description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control input-sm', 'rows'=>4,'cols'=>0]) !!}
</div>