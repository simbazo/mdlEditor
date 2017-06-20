function format ( d ) {
      
 return  $.ajax({
    url: '/tr/'+65,
    method: 'GET',
    beforesend:$('#DataTables_Table_0_wrapper').addClass('spinner2')
}).done(function (response) {
 $.each(response, function (i, item) {
    $('.before').hide();
    trHTML = '<tr class="ajax-tr"><td></td><td>' + item.uuid + '</td><td> <a href="/projectcontent/'+item.ContentStart_ID+'/edit" data-toggle="ajax-content" data-rel="tooltip">' + item.name + '</a></td><td></td><td></td><td><a class="btn btn-success btn-xs" data-rel="tooltip" data-placement="top" href="/projectcontent/'+item.ContentStart_ID+'/edit" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>' + item.ContentStart_ID + '</td></tr>';
    $('.datatable').DataTable().row.add($(trHTML)).draw();
    $('#DataTables_Table_0_wrapper').removeClass('spinner2');
});  
});    
} 

$(document).ready(function () {
    $('form').validator();
    var t = $('.datatable').DataTable( {
        "columnDefs": [ {
            "className":'',
            "searchable": false,
            "orderable": false,
            "targets": 0
        },
        { "data": "ID" },
        { "data": "Name" },
        { "data": "Short Description" },
        { "data": "User Created" }
        ],
        "order": [[ 1, 'asc' ]],
        "bLengthChange": false,
        "bInfo" : false,
        "bFilter" : false,
        "bFilter" : false,     
        "oLanguage": { "sSearch": ""},
    } ); 
    $('.datatable tbody').on('click', 'td.details-control', function () {
        
        console.log('im ready to fire');
        var tr = $(this).closest('tr');
            /*var tid = $(this).closest('tr').find('input.content-start').val();
            console.log(tid);*/
            var row = t.row( tr );
            
            if ( row.child.isShown() ) {
            // if this row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            $('.ajax-tr').hide()
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
    $('div.dataTables_filter input').addClass('form-control');
    $('.modal-body').find('div.dataTables_length select').hide();
    $('.modal-body').find('#DataTables_Table_0_length').hide();
    $('.modal-body').find('td.details-control').removeClass('details-control');
    $('.dataTables_filter').addClass('dataTables_filter pull-right')
        /*t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();*/
//All Okay
    //$('.datepicker').datepicker({format:'yyyy-mm-dd', autoclose:true});
    $('.datepicker').pikaday({ firstDay: 1, format:'YYYY-MM-DD', autoclose:true });
    $(document).ajaxStart(function() { Pace.restart(); });
    $('.chosen-select').chosen({ width: '100%' });
    $('[data-rel="tooltip"]').tooltip();
    /*======================================
       CUSTOM SCRIPTS
       ========================================*/
       var $modal = $('#ajax-modal');
       $(document).on('click', '[data-toggle="ajax-modal"]', function(e){
        e.preventDefault();
        $('#myModal').hide();
        var url = $(this).attr('href');

        if (url.indexOf('#') === 0) {
            $('#mainModal').modal('open');
        } else {
            $.get(url, function(data) {
                $modal.modal();
                $modal.html(data);
                $('.chosen-select').chosen({ width: '100%' });
                dropDown();
                $('#DataTables_Table_0_length').hide();
                $('.datepicker').pikaday({ firstDay: 1, format:'YYYY-MM-DD', autoclose:true });
                $('form').validator().on('submit', function (e) {
                    if (e.isDefaultPrevented()) {
                        return false;
                    }});
            });
        } 
    });

       $(document).on('submit', '.ajax-submit', function(e){
        e.preventDefault();
        var $form = $(this),$modal = $form.closest('.modal-dialog'),$modalBody = $form.find('.modal-body');
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
                $modal.addClass('spinner');
            },
            success : function(data){
                if(data.redirectTo){
                    $modal.close();   
                    nodeChilds(data.redirectTo);
                }else{
                  window.location.reload();  
              }
              
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
            $modal.removeClass('spinner');
        }
    });

    });
       /***Ajaxo content***/
       var $content = $('#ajax-content');
       $(document).on('click', '[data-toggle="ajax-content"]', function(e){
        e.preventDefault();
        $('#ajax-content').show();
        $('#content').addClass('spinner');
        var url = $(this).attr('href');
 
        if (url.indexOf('#') === 0) {
        } else {
            $.get(url, function(data) {
                $content.html(data);
                $('#content').removeClass('spinner');
                $('#ajax-list').hide();
                $('.datepicker').pikaday({ firstDay: 1, format:'YYYY-MM-DD', autoclose:true });
                $('.chosen-select').chosen();
                CKEDITOR.disableAutoInline = true;
                CKEDITOR.inline( 'editor1',{
                    tabSpaces: 4,
                    on: {
                        blur:function(evt){

                            /*ajax call*/
                            $('.content').addClass('spinner2');
                            $('.content .alert-danger').remove();
                            var $form = $('.content-form');
                            var data = $('.content-form select, input, textarea').serializeArray();
                            $.post($form.attr('action'), data , 'json').done(function(data){
                                if(data.errors)
                                {
                                    return;
                                }
                            }).fail(function(jqXhr, json, errorThrown){
                                var errors = jqXhr.responseJSON;
                                var errorStr = '';
                                $.each( errors, function( key, value ) {
                                    $('#'+key).parents('.form-group').addClass('has-error');
                                    $('.'+key).parents('.form-group').addClass('has-error');
                                    errorStr += '- ' + value[0] + '<br/>';
                                });

                                var errorsHtml= '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + errorStr + '</div>';
                                $('.content').prepend(errorsHtml);
                            }).always(function(){
                                $('.content').removeClass('spinner2');
                            });
                            /**endcall*/
                        }
                    }
                });
                /*+++++++New node*/

                //CKEDITOR.instances.editor1.destroy();
                CKEDITOR.instances['editor1'].on('change', function() { CKEDITOR.instances['editor1'].updateElement() });
                
                $('form').validator().on('submit', function (e) {
                    if (e.isDefaultPrevented()) {
                        return false;
                    }});
            });
        } 
    });
       function nodeChilds(redirectTo){
        $('#ajax-content').show();
        $('#content').addClass('spinner');
        var url = redirectTo;

        if (url.indexOf('#') === 0) {
        } else {
            $.get(url, function(data) {
                $content.html(data);
                $('#content').removeClass('spinner');
                $('#ajax-list').hide();
                $('.datepicker').pikaday({ firstDay: 1, format:'YYYY-MM-DD', autoclose:true });
                $('.chosen-select').chosen();
                CKEDITOR.disableAutoInline = true;
                CKEDITOR.inline( 'editor1',{
                    tabSpaces: 4,
                    on: {
                        blur:function(evt){

                            /*ajax call*/
                            $('.content').addClass('spinner2');
                            $('.content .alert-danger').remove();
                            var $form = $('.content-form');
                            var data = $('.content-form select, input, textarea').serializeArray();
                            $.post($form.attr('action'), data , 'json').done(function(data){
                                if(data.errors)
                                {
                                    return;
                                }
                            }).fail(function(jqXhr, json, errorThrown){
                                var errors = jqXhr.responseJSON;
                                var errorStr = '';
                                $.each( errors, function( key, value ) {
                                    $('#'+key).parents('.form-group').addClass('has-error');
                                    $('.'+key).parents('.form-group').addClass('has-error');
                                    errorStr += '- ' + value[0] + '<br/>';
                                });

                                var errorsHtml= '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + errorStr + '</div>';
                                $('.content').prepend(errorsHtml);
                            }).always(function(){
                                $('.content').removeClass('spinner2');
                            });
                            /**endcall*/
                        }
                    }
                });
                /*+++++++New node*/

                //CKEDITOR.instances.editor1.destroy();
                CKEDITOR.instances['editor1'].on('change', function() { CKEDITOR.instances['editor1'].updateElement() });
                
                $('form').validator().on('submit', function (e) {
                    if (e.isDefaultPrevented()) {
                       return false;
                   }});
            });
        } 
    }

    
    $(document).on('click','.btn-preview-close',function(){
        $('#contentpreview').hide();
    });
    /*Ajax Preview*/
    /***Ajaxo content***/
    var $contentpreview = $('#contentpreview');
    $(document).on('click', '[data-toggle="ajax-preview"]', function(e){
        e.preventDefault();
        $('#contentpreview').show();
        $('#c-pr').addClass('spinner');
        var url = $(this).attr('href');

        if (url.indexOf('#') === 0) {
        } else {
            $.get(url, function(data) {
                $contentpreview.html(data);
                $('#c-pr').removeClass('spinner');
            });
        } 
    });
    /*End Preview*/
    
    /*preview List*/
   

    $(document).on('click','#finish-preview',function(e){
        e.preventDefault();
        $('#end-preview').hide();
        $('#finish-preview').removeClass('btn-danger').addClass('btn-success').addClass('ajax-preview-list').attr('id','placed');
        $('#producttable').show();
    })
    /*preview List*/
    $(".animsition").animsition({
        inClass               :   'fade-in',
        outClass              :   'fade-out',
        inDuration            :    1500,
        outDuration           :    800,
        linkElement           :   '.animsition-link',
        loading               :    true,
        loadingParentElement  :   'body', //animsition wrapper element
        loadingClass          :   'animsition-loading',
        unSupportCss          : [ 'animation-duration', '-webkit-animation-duration', '-o-animation-duration'],
        //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay               :   false,
        overlayClass          :   'animsition-overlay-slide',
        overlayParentElement  :   'body'
    });
 
});
$('#clickable').on('click', '.clickable-row', function(event) {
            if($(this).hasClass('success')){
              $(this).removeClass('success'); 
            } else {
              $(this).addClass('success').siblings().removeClass('success');
              //$(this).find('a.preview').show();
            }
            });
/*--------------------------------------------------------------
 Template select navigation
 --------------------------------------------------------------*/
 $(document).on('change', '#template_select', function(){
    window.location.href = this.value;
});
 $(document).on('blur','.alert',function(){
   
});
 $(document).on('click', '#btn_add_row', function() {
    cloneRow('item_table');
});
 $( document ).on('change', '#currency', function() {
    if ( $(this).val() != '') {
        $( '.currencySymbol' ).text( $( "[name='currency']").val() );
    }
});
 $(document).on('click','.btn-close',function(){
    $('#ajax-content').hide();
    $('#ajax-list').show();
}); 
 $(document).on('click','#edit-content',function(){
    $('#yourTable').find('.aeditable').removeClass('aeditable').addClass('editable');
    $('.btn-editable').show();
    $('#yourTable').find('p.pen').removeClass('non');
    $('#edit-content').removeClass('btn-success').addClass('btn-danger').html('Finish Editing').attr('id','finish-editing');
    $('.editable').editable({
       mode:'inline'
   });
});
 $(document).on('click','#finish-editing',function(){
    $('#yourTable').find('.editable').removeClass('editable editable-click').addClass('aeditable');
    $('#yourTable').find('p.pen').addClass('non');
    $('.btn-editable').hide();
    $('#yourTable').find('.aeditable').removeClass('editable');
    $('#finish-editing').removeClass('btn-danger').addClass('btn-success').html('Edit List').attr('id','edit-content');
});
 $(document).on('click','.editable',function(){
  $('div.editable-buttons').find('i.glyphicon.glyphicon-ok').removeClass('glyphicon glyphicon-ok').addClass('fa fa-check');
  $('div.editable-buttons').find('i.glyphicon.glyphicon-remove').removeClass('glyphicon glyphicon-remove').addClass('fa fa-remove');
});
 $(document).ready(function() {
    //Helper function to keep table row from collapsing when being sorted
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
        $helper.children().each(function(index)
        {
          $(this).width($originals.eq(index).width())
      });
        return $helper;
    };

    //Make diagnosis table sortable
    $("#yourTable tbody").sortable({
        helper: fixHelperModified,
        stop: function(event,ui) {renumber_table('#yourTable')}
    }).disableSelection();

    
});
//drop down dependents
function dropDown(){
    $('#project_id').on('change', function(e){

        var cat_id = e.target.value;

       //ajax

       $.get('/projects/dropdown/' + cat_id, function(data){

           //success data
           $('#subproject_id').empty();
           $('#subproject_id').append(' Please wait');

           $.each(data, function(index, subcatObj){
            $('#subproject_id').append('<option value="'+subcatObj.uuid+'">'
                + subcatObj.name + '</option');


        });



       });


   });
}
//Renumber table rows
function renumber_table(tableID) {
    $(tableID + " tr").each(function() {
        count = $(this).parent().children().index($(this)) + 1;
        $(this).find('.priority').html(count);
    });
}
$(document).ready(function(){
    $(window).scroll(function(){
      var bn = $('#bn');
      if($(window).scrollTop() > 50) {
        bn.css({position:'fixed',float:'right',right:'10px',bottom:'10px'});
    }
    else{
        bn.css('position', 'static');
    }
});

});
$('#yourTable').on('click', '[data-toggle="ajax-node"]', function(e) {
    e.preventDefault();
    $(this).closest('tr').addClass('danger');
    var placeholder = $(this).closest('tr').children('td.parentNode').text();
    var $parent_node_id = $(this).closest('tr').find('input.node-uuid').val();
    var $curRow = $(this).closest('tr');
    var $newRow = '<tr class="">'
    + '<form id="nodeListForm"><td></><td></td><td><input type="hidden" id="node-uuid" name="Parent_ID"><input type="text" required class="form-control input-sm headingc" name="name" placeholder="heading name"/></td>'
    +'<td><input type="text" class="form-control input-sm" required name="description" placeholder="short description"/></td>'
    +'<td class="td-loader"></td>'
    +'<td><button type="sbmit" class="btn btn-primary btn-xs btn-node-submit" onclick ="create_node($(this))"><i class="fa fa-check"></i></button>'
    +' <button class="btn btn-danger btn-xs cancel" onclick ="delete_tr($(this))"><i class="fa fa-remove"></i></button></td>'
    +'</form></tr>';
    $curRow.after($newRow);
    $('#yourTable').find('tr input.headingc').attr("placeholder","New "+ placeholder).blur();
    $('#yourTable').find('tr input#node-uuid').val($parent_node_id);
});
function delete_tr(row)
{
    row.closest('tr').remove();
    $('#yourTable').find('tr.danger').removeClass('danger');


}
function create_node(row){
    row.closest('tr').find('td.td-loader').html('<img src="/assets/img/loading/loading2.gif"/>');
    var node = row.closest('tr').find('input.node-uuid').val();
    
    $('._recipe .alert-danger').remove();
    var $form = row.closest('tr').find('form#nodeListForm');
    var data = row.closest('tr').find('form#nodeListForm select, input, textarea').serializeArray();
    $.post('/nodechild', data , 'json').done(function(data){
        if(data.errors)
        {
            return;
        }
        if(data.redirectTo){
         row.closest('tr').remove();
         $('#ajax-content').show();
         $('#content').addClass('spinner');
         var url = data.redirectTo;

         if (url.indexOf('#') === 0) {
         } else {
            $.get(url, function(data) {
                var $content = $('#ajax-content');
                $content.html(data);
                $('#content').removeClass('spinner');
                $('#ajax-list').hide();
                $('.datepicker').pikaday({ firstDay: 1, format:'YYYY-MM-DD', autoclose:true });
                $('.chosen-select').chosen();
                CKEDITOR.disableAutoInline = true;
                CKEDITOR.inline( 'editor1',{
                    tabSpaces: 4,
                    on: {
                        blur:function(evt){

                            /*ajax call*/
                            $('.content').addClass('spinner2');
                            $('.content .alert-danger').remove();
                            var $form = $('.content-form');
                            var data = $('.content-form select, input, textarea').serializeArray();
                            $.post($form.attr('action'), data , 'json').done(function(data){
                                if(data.errors)
                                {
                                    return;
                                }
                                console.log('all okay');
                            }).fail(function(jqXhr, json, errorThrown){
                                var errors = jqXhr.responseJSON;
                                var errorStr = '';
                                $.each( errors, function( key, value ) {
                                    $('#'+key).parents('.form-group').addClass('has-error');
                                    $('.'+key).parents('.form-group').addClass('has-error');
                                    errorStr += '- ' + value[0] + '<br/>';
                                });

                                var errorsHtml= '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + errorStr + '</div>';
                                $('.content').prepend(errorsHtml);
                            }).always(function(){
                                $('.content').removeClass('spinner2');
                            });
                            /**endcall*/
                        }
                    }
                });
                /*+++++++New node*/

                //CKEDITOR.instances.editor1.destroy();
                CKEDITOR.instances['editor1'].on('change', function() { CKEDITOR.instances['editor1'].updateElement() });
                
                $('form').validator().on('submit', function (e) {
                    if (e.isDefaultPrevented()) {
                        return false;
                    }});
            });
        } 
    }else {
                   //window.location.reload();
               }
           }).fail(function(jqXhr, json, errorThrown){
            var errors = jqXhr.responseJSON;
            var errorStr = '';
            $.each( errors, function( key, value ) {
                $('#'+key).parents('.form-group').addClass('has-error');
                $('.'+key).parents('.form-group').addClass('has-error');
                errorStr += '- ' + value[0] + '<br/>';
            });

            var errorsHtml= '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + errorStr + '</div>';
            $('._recipe').prepend(errorsHtml);
        }).always(function(){
            $('._recipe').removeClass('spinner');
        });
        return false;
    } 
    $('#myTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('.jscroll').jscroll({
        loadingHtml: '<img src="/assets/img/loading/loading2.gif" alt="Loading" /> Loading...',
        padding: 20,
        autoTrigger:true,
        contentSelector: 'p'
    });
// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
  var id = $(e.target).attr("href").substr(1);
  window.location.hash = id;
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#myTab a[href="' + hash + '"]').tab('show');

$("#searchInput").keyup(function () {
    //split the current value of searchInput
    var data = this.value.toUpperCase().split(" ");
    //create a jquery object of the rows
    var jo = $(".fbody").find("tr");
    if (this.value == "") {
        jo.show();
        return;
    }
    //hide all the rows
    jo.hide();

    //Recusively filter the jquery object to get results.
    jo.filter(function (i, v) {
        var $t = $(this);
        for (var d = 0; d < data.length; ++d) {
            if ($t.text().toUpperCase().indexOf(data[d]) > -1) {
                return true;
            }
        }
        return false;
    })
    //show the rows that match.
    .show();
}).focus(function () {
    this.value = "";
    $(this).css({
        "color": "black"
    });
    $(this).unbind('focus');
}).css({
    "color": "#C0C0C0"
});
