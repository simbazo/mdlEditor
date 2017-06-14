<div class="" style="border: 0px">
  <div class="col-md-12">
   <div class="panel-heading ">
     <div class="col-md-6">
       <h4>{{$product->product_name}}</h4>
     </div>
     <div class="col-md-6" style="text-align: right;">
       {!!edit_btn('products.edit',$product->id)!!}
       {!!delete_btn('products.destroy',$product->id)!!}
     </div>
   </div>
 </div>
 <div class="panel-body">
   <hr>
   <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <input type="hidden" name="product_id" value="{{$product->id}}" id="product_id">
        <div class="input-group">

          {!! Form::select('question_id',array(), null, ['class' => 'form-control ajaxChosen input-sm noborder', !isset($payment->invoice_id) ? 'required' : '', 'data-placeholder' => 'Type atleast 2 characters of the question','id'=>'question_id']) !!}

          <span class="input-group-btn">

           <input type="submit" id="productsubmit" value="Add" class="btn btn-primary pull-right"/>

         </span>

       </div>
     </div>
     {!! Form::close() !!}
     <div id="errorexists">

     </div>
   </div>
   

   <div class="col-md-12">
    <br><br>
    <div class="list-group" id="sortable">
      @foreach($product->questions as $question)
      <li class="list-group-item">{{$question->name}} <a href="{{ route('farmer.farm',$question->uuid) }}" class="btn btn-danger btn-xs pull-right" data-toggle="deletequestion"> <i class="fa fa-trash"></i></a> <input type="hidden" value="{{$question->uuid}}" class="deletequestion"></li>
      @endforeach
    </div>
  </div>
</div>
</div>
</div>

<script>
  $('#productsubmit').click(function(e){
    e.preventDefault();
    var $contentpreview = $('#contentpreview');
    var question_id = $('#question_id').val(),
    product_id  = $('#product_id').val();
    $.ajax({
      url:"{{route('productquestion')}}",
      method:'POST',
      data:{question_id:question_id,product_id:product_id,_token:"{{csrf_token()}}"},
      beforesend:$('#productsubmit').html('processing...')
    }).always(function(response){
     if(response.success === false){
       var errorStr = "This question is already associated with this product";
       var errors = swal({title: "Error",text:errorStr ,type: "error"});
       $('#errorexists').html(errors);
     }else{
      $contentpreview.html(response);
      pewview();
    }

  }).fail(function(jqXhr, json, errorThrown){
    var errors = jqXhr.responseJSON;
    console.log(errors);
    var errorStr = '';
    $.each( errors, function( key, value ) {
      $('select[name="'+key+'"]').parents('.form-group').addClass("has-error");
      errorStr += '- ' + value[0] + '<br/>';
    });
    var errorsHtml= '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="">&times;</button>' + errorStr + '</div>';
    $('#msg').html(errorsHtml);
    save();
  }).complete(function(){
    $('#productsubmit').html('save');
  })
});
  $('[data-toggle="deletequestion"]').click(function(e){
    e.preventDefault();
    var q =$(this).closest('li').find('input.deletequestion').val();
    var p = $('#product_id').val();
    $(this).closest('li').addClass('remove');
    console.log(q);
    $.ajax({
      url:"{{route('questionsdetach')}}",
      method:"POST",
      data:{question_id:q,product_id:p,_token:"{{csrf_token()}}"}
    }).always(function(response){
      if(response.success === true){
        $('.list-group').find('li.remove').remove();
      }
    }).fail(function(){
      alert('Oops! Question not deleted, please try again.');
    }).complete(function(){
      console.log('all okay');
    })
  });
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
</script>