@extends('layout')

@section('content')

	<div class="row mt-5">
		<div class="col-sm-2"></div>

		<div class="col-sm-8">

			<div class="jumbotron jumbotron-fluid">
			  <div class="container">
			    <h1 class="display-4">{{ $joke->title }}</h1>
			    <p class="lead">Author: {{ $joke->author }}</p>
			    <p>Posted On {{ $joke->created_at }}</p>
			  </div>
			</div>
			<h3><strong>* Details Joke *</strong></h3>
			<div>
				{{ $joke->details }}

			</div>

			<br/>

			<a href="/jokes/{{$joke->id}}/edit" class="btn btn-info mt-3" style="display:inline;">Edit</a>
			<form style="display:inline;" method="POST">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-danger btn-sm">Delete</button>
			</form>
		</div>

		<div class="col-sm-2"></div>
	</div>
@endsection