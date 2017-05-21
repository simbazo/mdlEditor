<div class="rowm">
	<div class="col-md-12">
		 <div class="form-group">
            {!! Form::label('invoice_id', trans('application.invoice').' *') !!}
            @if(isset($invoice))
                {!! Form::select('project_id',array($project->uuid . $project->user->name), $project->uuid, ['class' => 'form-control', 'required']) !!}
            @else
                @if(isset($project->uuid)) <strong> {{ $project->name }} </strong> @endif
                {!! Form::select('invoice_id',array(), null, ['class' => 'form-control ajaxChosen input-sm', !isset($project->uuid) ? 'required' : '', 'data-placeholder' => 'Type atleast 2 characters of the project name']) !!}
            @endif
        </div>
	</div>
</div>