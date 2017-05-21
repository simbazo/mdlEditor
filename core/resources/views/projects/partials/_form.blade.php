<div class="form-group">
    {!! Form::label('name', trans('application.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('users_assigned', trans('application.users_assigned')) !!}
    {!! Form::select('users_id',$users, null, ['class' => 'form-control chosen-select input-sm']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', trans('application.description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control input-sm', 'required','rows'=>4,'cols'=>0]) !!}
</div>