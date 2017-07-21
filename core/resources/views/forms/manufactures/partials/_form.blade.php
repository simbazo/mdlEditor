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
    {!! Form::label('country', trans('application.country')) !!}
    {!! Form::select('country_uuid',$countries = ['193'=>'South Africa']+$countries, null, ['class' => 'form-control chosen-select input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('province', trans('application.state_province')) !!}
    {!! Form::text('province',null, ['class' => 'form-control input-sm', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('city', trans('application.city')) !!}
    {!! Form::text('town',null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('street_address', trans('application.street_address')) !!}
    {!! Form::text('address1', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('street_address', trans('application.address_2')) !!}
    {!! Form::text('address2', null, ['class' => 'form-control input-sm']) !!}
</div>

<div class="form-group">
    {!! Form::label('postal_zip', trans('application.postal_zip')) !!}
    {!! Form::text('postal_code', null, ['class' => 'form-control input-sm',]) !!}
</div>
