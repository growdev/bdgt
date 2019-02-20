@extends('guest')

@section('content')
	<div class="row">
		<div class="col-xs-12 text-center">
			<div class="jumbotron">
				<h1>bdgt
					<span class="badge">alpha</span></h1>
			</div>
			@if (!Auth::user())
			<p><a class="btn btn-success btn-lg" href="/login" role="button">Sign In</a></p>
			@endif
		</div>
	</div>
@endsection
