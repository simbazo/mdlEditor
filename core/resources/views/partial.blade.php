

@foreach($childs as $child)

	<tr>

	    <td></td>
        <td>{{ $child->name }}</td><td>
        <td>{{$child->Parent_ID}}</td> 
        <td>{{$child->uuid}}</td>

	@if(count($child->childs))

            @include('partial',['childs' => $child->childs])

        @endif

	</tr>

@endforeach