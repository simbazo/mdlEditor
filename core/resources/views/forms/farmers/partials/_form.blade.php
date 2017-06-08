<div class="form-group">
    {!! Form::label('first_name', trans('application.first_name')) !!}
    {!! Form::text('first_name', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', trans('application.last_name')) !!}
    {!! Form::text('last_name', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('id_number', trans('application.id_number')) !!}
    {!! Form::text('id_number', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('date_of_birth', trans('application.date_of_birth')) !!}
    {!! Form::text('dob', null, ['class' => 'form-control datepicker input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('gender', trans('application.gender')) !!}
    {!! Form::select('gender_id', $gender,null, ['class' => 'form-control chosen-select input-sm', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('race', trans('Race')) !!}
    {!! Form::select('race_id', $races,null, ['class' => 'form-control chosen-select input-sm', 'required']) !!}
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
    {!! Form::label('country', trans('application.country')) !!}
    {!! Form::select('country_id',$countries = ['193'=>'South Africa']+$countries, null, ['class' => 'form-control chosen-select input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('province', trans('application.state_province')) !!}
    {!! Form::text('province',null, ['class' => 'form-control input-sm', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('city', trans('application.city')) !!}
    {!! Form::text('city',null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('street_address', trans('application.street_address')) !!}
    {!! Form::text('address_line1', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('street_address', trans('application.address_2')) !!}
    {!! Form::text('address_line2', null, ['class' => 'form-control input-sm']) !!}
</div>

<div class="form-group">
    {!! Form::label('postal_zip', trans('application.postal_zip')) !!}
    {!! Form::text('postal_code', null, ['class' => 'form-control input-sm',]) !!}
</div>
