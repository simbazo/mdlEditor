
   <script type="text/javascript" src="{{asset('assets/treegrid/js/jquery.treegrid.js')}}"></script>
  <script type="text/javascript"> 
         $(document).ready(function () {
          $('.append-td').hide();
          $(document).on('click','#preview-mode',function(){
          $(this).html('Disable Preview').attr('id','disable-preview');
            $('body').addClass('aside-collapsed');
            $('#preview-separate').removeClass('col-md-12').addClass('col-md-4');
            $('#yourTable  tr a.preview-enable').removeClass('non').removeClass('preview');
            $('#yourTable th.tr-previewd, td.tr-previewd').addClass('non');
            $(this).addClass('in-edit-mode');
            $(this).removeClass('btn-outline btn-success').addClass('btn-danger');
          });
          $(document).on('click','#disable-preview',function(){
            $('body').removeClass('aside-collapsed');
            $(this).html('Enable Preview').removeClass('btn-danger').addClass('btn-outline btn-success').attr('id','preview-mode');
            $('#preview-separate').removeClass('col-md-4').addClass('col-md-12');
            $('#yourTable  tr a.preview-enable').addClass('non').addClass('preview');
            $('#yourTable th.non, td.non').removeClass('non').addClass('tr-previewd');
            $('#contentpreview').hide();
          });
          $('#yourTable').on('click', '.clickable-row', function(event) {
            if($(this).hasClass('success')){
              $(this).removeClass('success'); 
            } else {
              $(this).addClass('success').siblings().removeClass('success');
              //$(this).find('a.preview').show();
            }
            });        
            f1();
            $('.tree-2').treegrid({
                initialState: 'collapsed',
                expanderExpandedClass: 'icon-minus',
                expanderCollapsedClass: 'icon-plus',
            });
        });
            function f1() {
              var m = 1, line = '';
                for (i = 1; i < 3; i++) {
                    m = i + 1;
                    if (i == 1) {
                        line = '<tr class="treegrid-' + m + ' clickable-row">'
                          + '<td></td><td>{!!node1_btn('projectcontent.edit',$content->uuid)!!}</td><td class="list-iconclass"><input type="hidden" class="node-uuid" name="parent-node-id" value="{{$content->uuid}}"><a  data-type="text" data-rel="tooltip" data-placement="top" data-pk="{{$content->uuid}}" data-url="{{route('node',$content->uuid)}}"  href="#" class="aeditable">{{$content->name or ''}} <i class="fa fa-pencil btn-editable" style="display:none;"></a></td><td> {!!node_btn('projectcontent.edit',$content->uuid)!!}</td><td class="preview-enable tr-previewd">@if(!count($content->childs)) {!!doc_null_btn('projectcontent.edit',$content->uuid)!!} {!!doc_none_btn('projectcontent.edit',$content->uuid)!!} {!!doc_edit_btn('projectcontent.edit',$content->uuid)!!} @else {!!doc_null_btn('nodechilds',$content->uuid)!!} @endif</td><td></td><td class="preview-enable tr-previewd">{{$content->updated_at}}</td></tr>';
                    }
                    else { 
                        line = '@foreach($childs as $child)<tr class="treegrid-' + m + ' treegrid-parent-' + i + ' clickable-row">'
                          + '<td></td><td class="list-iconclass">{!!node1_btn('projectcontent.edit',$child->uuid)!!}</td><td >&nbsp; <input type="hidden" class="node-uuid" name="parent-node-id" value="{{$child->uuid}}"><a  data-type="text" data-rel="tooltip" data-placement="top" title="Edit Header" data-pk="{{$child->uuid}}" data-url="{{route('node',$child->uuid)}}"  href="#" class="aeditable active">{{$child->name or ''}} <i class="fa fa-pencil btn-editable" style="display:none;"></i> &nbsp;</a></td><td> @if(count($child->content->Content)) {!!preview_btn('preview',$child->ContentStart_ID)!!} @endif {!!node_btn('projectcontent.edit',$child->uuid)!!} </td><td class="tr-previewd">@if(!count($child->childs)) @if(is_null($child->ContentStart_ID)) {!!doc_null_btn('projectcontent.edit',$child->uuid)!!} @elseif(is_null($child->content->Content)){!!doc_none_btn('projectcontent.edit',$child->ContentStart_ID)!!} @else {!!doc_edit_btn('projectcontent.edit',$child->ContentStart_ID)!!} @endif @endif </td><td>{!!pdf_btn('projectcontent.edit',$child->ContentStart_ID)!!}</td><td class="tr-previewd">{{$child->content->updated_at}}</td></tr>@endforeach';
                    }

                    $('.tree-2').append(line);
                }
            } 

    
    </script>