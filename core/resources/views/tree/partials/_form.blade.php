        <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                {!! Form::label('header', trans('application.title')) !!}
                {!! Form::text('header', null, ['class' => 'form-control', 'required','placeholder'=>'Header']) !!}
                </div>
                <div class="form-group">
                {!! Form::label('topic', trans('application.topic')) !!}
                {!! Form::text('topic', null, ['class' => 'form-control', 'required','placeholder'=>'Content Topic']) !!}
                </div>

                <input type="hidden" name="project_id" value="{{Session::get('tree.0')}}">
                
                <div class="form-group">
                {!! Form::label('reference', trans('application.reference')) !!}
                {!! Form::text('reference', null, ['class' => 'form-control','placeholder'=>'Content reference']) !!}
                </div>
                </div>
        </div>
        <div class="row">
                    
            <div class="col-md-12">
            {!! Form::textarea('content',null,['class'=>'form-control','id'=>'editor1','rows'=>'10','cols'=>'80','placeholder'=>'Type your content here','required'])!!}
            </div>
        </div>

