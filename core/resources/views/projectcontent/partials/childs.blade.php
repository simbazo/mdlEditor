
@foreach($childs as $child)

	<tr>
		 
	   <span> {{ $child->header }}</span>

	@if(count($child->childs))

            @include('tree.partials.child',['childs' => $child->childs])

        @endif
	</a>
	</tr>

@endforeach