@extends('settings.partials.settings')

@section('settings-page')
    <div class="col-md-9">

        <div class="panel panel-default">
            <div class="panel-body">
                    
                    @if (count($errors) > 0)
                        {!! form_errors($errors) !!}
                    @endif

                    {!! Form::open(['route' => ['producttypes.store']]) !!}
                    <div class="form-group">
                        {!! Form::label('name', trans('application.name')) !!}
                        <div class="input-group col-md-4">
                        {!! Form::text('name', null, ['class' => "form-control input-sm", 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', trans('application.description')) !!}
                        <div class="input-group col-md-4">
                        {!! Form::textarea('description', null, ['class' => "form-control input-sm", 'required', 'rows'=>'2','col'=>'0']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit(trans('application.save'), ['class="btn btn-sm btn-primary"']) !!}
                    </div>
                    {!! Form::close() !!}
                    
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered datatable">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{trans('application.name')}}</th>
                            <th>{{trans('application.description')}}</th>
                            <th>{{trans('application.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
  </div>


@endsection