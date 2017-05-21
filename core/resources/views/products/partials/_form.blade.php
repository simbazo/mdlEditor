
<div class="form-group">
    {!! Form::label('name', trans('application.task_title')) !!}
    {!! Form::text('product_name', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', trans('application.description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control input-sm', 'rows'=>4,'cols'=>0]) !!}
</div>