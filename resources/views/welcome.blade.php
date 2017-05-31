@extends('app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1>Hey! Thank you for visiting us.</h1>
				<div class="quote">
					You can find your location and see the site activity <a href="{{ url('/activity') }}">here</a>.
				</div>
			</div>
		</div>
	</div>

@endsection
