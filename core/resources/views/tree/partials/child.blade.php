<ul class="">

@foreach($childs as $child)

	<li>
		 
	   <span> {{ $child->header }}</span>

	@if(count($child->childs))

            @include('tree.partials.child',['childs' => $child->childs])

        @endif
	</a>
	</li>

@endforeach

</ul>