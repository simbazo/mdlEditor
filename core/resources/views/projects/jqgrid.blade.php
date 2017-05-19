@extends('templates._master')

@section('content')

<div class="col-md-12">
	<div class="row">
		<div class="col-md-12 box">
			<div class="panel panel-default">
				<div class="box-header with-border">
					
				</div>
				<div class="panel-body">
          <div id="tree1"></div>
  <!--gridCompleteEvent must be previously declared as a javascript function-->
         </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@push('css')
<link rel="stylesheet" href="{{asset("assets/css/jqtree.css")}}">
@endpush

@push('js')
 <!-- JQGRID-->
   <script src="{{asset('assets/js/tree.jquery.js')}}"></script>
   <script src="{{asset('assets/js/jquery.cookie.js')}}"></script>
   <script>
     var data = [
    {
        name: 'node1',
        children: [
            { name: 'child1' },
            { name: 'child2' }
        ]
    },
    {
        name: 'node2',
        children: [
            { name: 'child3' }
        ]
    }
];
$(function() {
    $('#tree1').tree({
        data: data
    });
});
   </script>
@endpush