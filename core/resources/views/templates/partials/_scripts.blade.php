
   <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="{{asset('assets/vendor/modernizr/modernizr.custom.js')}}"></script> 
   <!-- MATCHMEDIA POLYFILL-->
   <script src="{{asset('assets/vendor/matchMedia/matchMedia.js')}}"></script>
   <!-- JQUERY-->
   <script src="{{asset('assets/vendor/jquery/dist/jquery.js')}}"></script>
   <!-- BOOTSTRAP-->

  <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
   <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.js')}}"></script>

   <script src="{{ asset('assets/js/bootstrap-dialog.js') }}"></script> 
   <!-- STORAGE API-->
   <script src="{{asset('assets/vendor/jQuery-Storage-API/jquery.storageapi.js')}}"></script>
   <!-- JQUERY EASING-->
   <script src="{{asset('assets/vendor/jquery.easing/js/jquery.easing.js')}}"></script> 
   <!-- ANIMO-->
   <script src="{{asset('assets/vendor/animo.js/animo.js')}}"></script> 
   <!-- SLIMSCROLL-->
   <script src="{{asset('assets/vendor/chosen_v1.2.0/chosen.jquery.min.js')}}"></script>
   <script src="{{asset('assets/vendor/slimScroll/jquery.slimscroll.min.js')}}"></script>
   <!-- SCREENFULL-->
   <script src="{{asset('assets/vendor/screenfull/dist/screenfull.js')}}"></script>
   <!-- LOCALIZE--><!--
   <script src="{{asset('assets/vendor/jquery-localize-i18n/dist/jquery.localize.js')}}"></script>-->
   <!-- RTL demo-->
   <script src="{{asset('assets/js/demo/demo-rtl.js')}}"></script>

<!-- datepicker.js javascript-->
<script src="{{ asset('assets/plugins/pikaday/moment.js') }}"></script>
<script src="{{asset('assets/date_timepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{ asset('assets/plugins/pikaday/pikaday.js') }}"></script>
<script src="{{ asset('assets/plugins/pikaday/pikaday.jquery.js') }}"></script>

   <script src="{{asset('assets/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('assets/vendor/datatables-colvis/js/dataTables.colVis.js')}}"></script>
   <script src="{{asset('assets/vendor/datatables/media/js/dataTables.bootstrap.js')}}"></script>
   <script src="{{asset('assets/vendor/datatables-responsive/js/dataTables.responsive.js')}}"></script>
   <script src="{{asset('assets/vendor/datatables-responsive/js/responsive.bootstrap.js')}}"></script>  
   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <!-- SPARKLINE-->
   <script src="{{asset('assets/vendor/sparkline/index.js')}}"></script>
   <!-- FLOT CHART-->
   <script src="{{asset('assets/vendor/Flot/jquery.flot.js')}}"></script>
   <script src="{{asset('assets/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
   <script src="{{asset('assets/vendor/Flot/jquery.flot.resize.js')}}"></script>
   <script src="{{asset('assets/vendor/Flot/jquery.flot.pie.js')}}"></script>
   <script src="{{asset('assets/vendor/Flot/jquery.flot.time.js')}}"></script>
   <script src="{{asset('assets/vendor/Flot/jquery.flot.categories.js')}}"></script>
   <script src="{{asset('assets/vendor/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
   <!-- CLASSY LOADER-->
   <script src="{{asset('assets/vendor/jquery-classyloader/js/jquery.classyloader.min.js')}}"></script>
   <!-- MOMENT JS-->
   <script src="{{asset('assets/vendor/moment/min/moment-with-locales.min.js')}}"></script>
   <!-- DEMO-->
   <script src="{{asset('assets/js/demo/demo-flot.js')}}"></script>
   <!-- Pace.js -->
   <script src="{{asset('assets/vendor/chosen_v1.2.0/chosen.jquery.min.js')}}"></script>
   <!-- Pace.js -->
   <script src="{{asset('assets/js/animsition.min.js')}}"></script>
   <script src="{{asset('assets/js/pace.min.js')}}"></script>
   <!-- validator.js javascript-->
   <script src="{{asset('assets/js/validator.min.js')}}"></script>
   <!-- SWEET ALERT-->
   <script src="{{asset('assets/vendor/sweetalert/dist/sweetalert.min.js')}}"></script>
   <!-- jscroll-->
   <script src="{{asset('assets/js/jscroll.min.js')}}"></script>
   <!-- ==========Parselay===========-->

   <script src="{{asset('assets/vendor/parsleyjs/dist/parsley.min.js')}}"></script>

<script src="{{ asset('assets/vendor/sweetalert/dist/sweetalert.min.js') }}"></script>
    @stack('upload')
<script src="{{asset('assets/js/bootstrap-editable.min.js')}}"></script>
{{-- <script src="{{asset('assets/js/jquery.treetable.js')}}"></script> --}}

   <script src="{{ asset('assets/plugins/chosen/chosen.ajaxaddition.jquery.js') }}"></script>
   <!-- =============== APP SCRIPTS ===============-->
   @stack('datatable')
  @if(isset($content))
  {{-- @include('projectcontent.partials._treegridjs') --}}
  @endif
   <script src="{{asset('assets/js/app.js')}}"></script>
   <script src="{{asset('assets/js/custom.js')}}"></script>
   <script src="{{asset('assets/js/treejs.js')}}"></script>
   @stack('jsupload')

<script type="text/javascript">
   var $contentpreview = $('#contentpreview');
    $(document).on('click', '[data-toggle="ajax-preview-list"]', function(e){
        e.preventDefault();
        $('#contentpreview').addClass('spinner1');
        $('#placed').removeClass('btn-success').removeClass('ajax-preview-list').addClass('btn-danger').attr('id','finish-preview');
        var url = $(this).data('href');

        if (url.indexOf('#') === 0) {
        } else {
            $.get(url, function(data) {
                $('#producttable').hide();
                $contentpreview.html(data);
                $('#contentpreview').removeClass('spinner');
                pewview();
            });
        } 
    });

  function pewview(){ $('.ajaxChosen').ajaxChosen({
        dataType: 'json',
        type: 'POST',
        url:'/ajaxSearch',
        data: {'_token':"{{ csrf_token() }}"}, //Or can be [{'name':'keyboard', 'value':'cat'}]. chose your favorite, it handles both.
        success: function(data, textStatus, jqXHR){  }
    },{
        processItems: function(data){return data;},
        generateUrl: function(q){ return '{{ url("/ajaxSearch") }}' },
        loadingImg: '{{ asset("assets/plugins/chosen/loading.gif") }}',
        minLength: 2
    });}

    function submitList(){
      $('#productsubmit').on('click',function(e){
        alert('i was clicked');
    });
    }
</script>
   @stack('js')
   <script>
          $(document).ready(function() {
           $.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')
    }
    });
    });
   </script>
   <script>
     var jsonData = {
  "nodeID": {
    "1": [
      
       {"ID": "1.1",
        "childNodeType": "branch",
        "childData": [
          "1.1: column 1",
          "1.1: column 2"
          ]
      },
      {"ID": "1.2",
        "childNodeType": "leaf",
        "childData": [
          "1.2: column 1",
          "1.2: column 2"
          ]
      },
      {"ID":"1.3",
        "childNodeType": "leaf",
        "childData": [
          "1.3: column 1",
          "1.3: column 2"
          ]
      }
      
    ],
    "1.1": [

        {"ID":"1.1.1",
          "childNodeType": "leaf",
          "childData": [
            "1.1.1: column 1",
            "1.1.1: column 2"
            ]
        },
        {"ID":"1.1.2",
          "childNodeType": "leaf",
          "childData": [
            "1.1.2: column 1",
            "1.1.2: column 2"
            ]
        }
 
    ],
    "2": [

        {"ID":"2.1",
          "childNodeType": "leaf",
          "childData": [
            "2.1: column 1",
            "2.1: column 2"
            ]
        },
        {"ID":"2.2",
          "childNodeType": "leaf",
          "childData": [
            "2.2: column 1",
            "2.2: column 2"
            ]
        },
        {"ID":"2.3",
          "childNodeType": "leaf",
          "childData": [
            "2.3: column 1",
            "2.3: column 2"
            ]
        }

    ],
    "3": [

        {"ID":"3.1",
          "childNodeType": "leaf",
          "childData": [
            "3.1: column 1",
            "3.1: column 2"
            ]
        },
        {"ID":"3.2",
          "childNodeType": "leaf",
          "childData": [
            "3.2: column 1",
            "3.2: column 2"
            ]
        },
        {"ID":"3.3",
          "childNodeType": "leaf",
          "childData": [
            "3.3: column 1",
            "3.3: column 2"
            ]
        }
        
    ]
  }
};
/* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
/* This is an echo of some data sent back via ajax                       */
/* This data should be filtered by nodeID and return only childNodeID's. */



// initialize treeTable
// $("#example-basic").treetable({
//     expandable:     true,
//     onNodeExpand:   nodeExpand,
//     onNodeCollapse: nodeCollapse
// });


// // expand node with ID "1" by default
// $("#example-basic").treetable("reveal", '1');


// Highlight a row when selected
$("#example-basic tbody").on("mousedown", "tr", function() {
    $(".selected").not(this).removeClass("selected");
    $(this).toggleClass("selected");
});

function nodeExpand () {
    // alert("Expanded: " + this.id);
    getNodeViaAjax(this.id);  
}


function nodeCollapse () {
    // alert("Collapsed: " + this.id);
}







function getNodeViaAjax(parentNodeID) {
    $("#loadingImage").show();
    
    // ajax should be modified to only get childNode data from selected nodeID
    // was created this way to work in jsFiddle
    $.ajax({
    type: 'GET',
        url: '/pcontent/44',
        data: {
            json: JSON.stringify( jsonData )
        },
        success: function(data) {
            $("#loadingImage").hide();
    
            var childNodes = data.nodeID[parentNodeID];
            
            if(childNodes) {
                var parentNode = $("#example-basic").treetable("node", parentNodeID);

                for (var i = 0; i < childNodes.length; i++) {
                    var node = childNodes[i];

                    var nodeToAdd = $("#example-basic").treetable("node",node['ID']);

                    // check if node already exists. If not add row to parent node
                    if(!nodeToAdd) {
                        // create row to add
                        var row ='<tr data-tt-id="' + 
                            node['ID'] + 
                            '" data-tt-parent-id="' +
                            parentNodeID + '" ';
                        if(node['childNodeType'] == 'branch') {
                            row += ' data-tt-branch="true" ';
                        }

                        row += ' >';

                        // Add columns to row
                        for (var index in node['childData']) {
                            var data = node['childData'][index];
                            row += "<td>" + data + "</td>";
                        }

                        // End row
                        row +="</tr>";
                        
                        $("#example-basic").treetable("loadBranch", parentNode, row);
                    }



                }
            
            }

        },
        error:function(error){
            $("#loadingImage").hide();
            console.log('something went wrong');  
        },
        dataType: 'json'
    });
}
   </script>