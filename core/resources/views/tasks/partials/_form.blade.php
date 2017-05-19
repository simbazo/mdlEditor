
<div class="form-group">
    {!! Form::label('task_title', trans('application.task_title')) !!}
    {!! Form::text('task_title', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('project_id', trans('application.project')) !!}
    {!! Form::select('project_id',$project, null, ['class' => 'form-control chosen-select input-sm', 'required','id'=>'project_id']) !!}
</div>
<div class="form-group">
    {!! Form::label('content_start', trans('application.content_start')) !!}
    {!! Form::select('content_start',[], null, ['class' => 'form-control input-sm', 'required','id'=>'subproject_id']) !!}
</div>
<div class="form-group">
    {!! Form::label('users', trans('application.user_assigned')) !!}
    {!! Form::select('users[]',$users, null, ['class' => 'form-control chosen-select input-sm', 'required','multiple']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', trans('application.description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control input-sm', 'required','rows'=>4,'cols'=>0]) !!}
</div>