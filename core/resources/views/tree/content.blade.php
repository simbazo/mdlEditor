    {!! Form::model($content, ['route' => ['content.update', $content->uuid], 'method'=>'PATCH', 'class'=>"ajax-submit"]) !!}
        
         <div class="row">
            <input type="hidden" name="project_id" value="{{Session::get('tree.0')}}">
            <div class="col-md-12">
            {!! Form::textarea('content',null,['class'=>'form-control vg','id'=>'editor1','rows'=>'10','cols'=>'80','placeholder'=>'Type your content here','required'])!!}
            </div>
        </div>
        <hr>
        {!! form_buttons() !!}
    {!! Form::close() !!}