@extends('templates._master')

@section('content')
<div class="col-md-12">
<section class="content">
		<div class="row">

			<div class="col-md-12 box">
				<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<h2>Drag & Drop components</h2>
							<hr>
						</div>
						<div class="col-md-6">

							<h2>Your Form</h2>
							<hr>
						</div>
					</div>
				</div>
				<div class="panel-body">

					<!-- Components -->
					<div class="col-md-6">

						<div class="tabbable">
							<ul class="nav nav-tabs" id="formtabs">
								<!-- Tab nav -->
							</ul>
							<form class="form-horizontal" id="components" role="form">
								<fieldset>
									<div class="tab-content">
										<!-- Tabs of snippets go here -->
									</div>
								</fieldset>
							</form>
						</div>
					</div>
					<!-- / Components -->


					<!-- Building Form. -->
					<div class="col-md-6">
						<div class="clearfix">
							<div id="build">
								<form id="target" class="form-horizontal">
									<!-- coyrights MiDigitalLife-->
								</form>
							</div>
						</div>
					</div>
					<!-- / Building Form. -->
				</div>
			</div>
			</div>

		</div>
	</section>
</div>


@endsection

@push('css')

@endpush

@push('js')
<script data-main="{{asset('assets/formbuilder/js/main-built.js')}}" src="{{asset('assets/formbuilder/js/lib/require.js')}}" >
	@endpush