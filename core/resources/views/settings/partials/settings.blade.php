@extends('templates._master')

@section('content')

		<div class="row">
		<div class="col-md-12">
			@include('settings.partials._menu')
			@yield('settings-page')
		</div>
		</div>

@endsection