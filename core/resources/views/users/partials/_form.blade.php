<div class="form-group">
    {!! Form::label('username', trans('application.username')) !!}
    {!! Form::text('username', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', trans('application.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', trans('application.email')) !!}
    {!! Form::text('email', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('phone', trans('application.phone')) !!}
    {!! Form::text('phone', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', trans('application.password')) !!}
    {!! Form::password('password', ['class' => 'form-control input-sm', isset($user) ? '' : 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', trans('application.confirm_password')) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control input-sm']) !!}
</div>