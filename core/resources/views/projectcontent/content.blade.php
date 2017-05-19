
<div class="row">
    <div class="col-md-12 box " >

        <div class="panel panel-default">
                <div class="box-header with-border layout-fixed" id="bn" style="z-index: 121;">
                   <div class="col-md-12">
                    <div class="modal-footer pull-right" >
                        {!! form_close() !!}
                    </div>
                   </div> 
                </div>
            <div class="panel-body jscroll" id="pb">
              {!! Form::model($contents,['route' => ['projectcontent.update',$contents->ID],'method'=>'PATCH', 'class'=>"content-form",'id'=>'content-form']) !!}
            <div class="modal-body content">
            <div class="row">
            <input type="hidden" name="Parent_ID" value="{{$contents->Parent_ID}}">
            <input type="hidden" name="ProjectContent_ID" value="{{$contents->ProjectContent_ID}}">
            <input type="hidden" name="Header" value="{{$contents->Header}}">
            <input type="hidden" name="Level_ID" value="{{$contents->Level_ID}}">
            <input type="hidden" name="SortOrder" value="{{$contents->SortOrder}}">
            <input type="hidden" name="Topic" value="{{$contents->Topic}}">
            <div class="col-md-12">
            <textarea name="Content" class="form-control" id="editor1" cols="10" rows="80" >
            {!!$contents->Content!!}
            </textarea>
            </div>
        </div>
  
    </div>
    {!! Form::close() !!}
    </div>
  </div>
        <!-- End  Hover Rows  -->
    </div>
</div>