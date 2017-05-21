<div class="form-group">
    {!! Form::label('project_id', trans('application.project')) !!}
    <select name="Project_ID" id="project_id" class="form-control chosen-select input-sm">
        @foreach($project as $pr)
        <option value="{{$pr->Project_ID}}">{{$pr->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('short_description', trans('application.short_description')) !!}
    {!! Form::text('short_description', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('short_description', trans('application.short_description')) !!}
    {!! Form::text('short_description', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', trans('application.description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control input-sm', 'required','rows'=>4,'cols'=>0]) !!}
</div>