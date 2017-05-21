    var $content = $('#ajax-node');
    $(document).on('click', '[data-toggle="ajax-node"]', function(e){
     
      var $this     = $(this),
          $parentTR = $this.closest('tr');

      $parentTR.clone().insertAfter($parentTR);
     });