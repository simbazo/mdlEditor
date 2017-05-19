// Forms Demo
// ----------------------------------- 


(function(window, document, $, undefined){

  // Forms Demo
// ----------------------------------- 
$(document).on('click', '[data-toggle="ajax-divForm"]',function(e){
        e.preventDefault();
        $('#ajaxcontent').addClass('spinner');
        $.get("/admin/products/create").done(function(data){ 
            $('#ajaxdiv-body').html(data);
            wizzard();
        }).always(function(){
            $('#ajaxcontent').removeClass('spinner');
        });
    });

function wizzard(){

    // Wizard By Jacinto Joao
    // ----------------------------------- 
    var form = $(".wizzard-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.children("div").steps({
        headerTag: "h4",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
           
           var $form = $(this),$modal = $form.closest('.panelbody-ajax'),$modalBody = $form.find('.errors');
           var formData = new FormData(this);

            $.ajax({
            type: "POST",
            url: $form.attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend : function(){
                $('#ajaxcontent').addClass('spinner');
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
                $('#ajaxcontent').removeClass('spinner');
            }
        });
        }
    });
}


})(window, document, window.jQuery);
