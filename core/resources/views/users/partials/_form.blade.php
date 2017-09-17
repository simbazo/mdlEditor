<div class="form-group">
    {!! Form::label('username', trans('application.username')) !!}
    {!! Form::text('username', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', trans('application.first_name')) !!}
    {!! Form::text('first_name', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', trans('application.last_name')) !!}
    {!! Form::text('last_name', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', trans('application.email')) !!}
    {!! Form::text('email', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('phone', trans('application.phone')) !!}
    {!! Form::text('mobile', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', trans('application.password')) !!}
    {!! Form::password('password', ['class' => 'form-control input-sm', isset($user) ? '' : 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', trans('application.confirm_password')) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control input-sm']) !!}
</div>