
<script>
    // Upload Demo
// ----------------------------------- 

$('#files').on('submit', function(e){
  e.preventDefault();
  var $form = $(this),$modal = $form.closest('.panel-body'),$modalBody = $form.find('.errors');
  $modalBody.find('.alert-danger').remove();
  var formData = new FormData(this);

  $.ajax({
    type: "POST",
    url: $form.attr('action'),
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend : function(){
      $('#submitfiles').hide();
      $('#loadingfiles').show();
    },
    success : function(response){
      console.log(response);
      window.location.reload();
    },
    error : function(jqXhr, json, errorThrown){
      var errors = jqXhr.responseJSON;
      var errorStr = '';
      $.each( errors, function( key, value ) {
        $('input[name="'+key+'"]').parents('.form-group').addClass("has-error");
        errorStr += '- ' + value[0] + '<br/>';
      });
      var errorsHtml= '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + errorStr + '</div>';
      $modalBody.prepend(errorsHtml);
    },
    complete : function(){
      $('#loadingfiles').hide();
      $('#submitfiles').show();
    }
  });

});
</script>