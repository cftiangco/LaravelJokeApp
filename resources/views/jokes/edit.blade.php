@extends('layouts.app')

@section('content')

	<div class="row mt-5">
		<div class="col-sm-2"></div>

		<div class="col-sm-8">
			<h1>Edit  Joke</h1>

			@include('error')

			<br />
			<form method="POST" action="/jokes/{{ $joke->id }}">
				@method('PATCH')
				@csrf
				
				<div class="form-row">
					<div class="col">
						<label for="title">Title</label>
						<input type="text" class="form-control" placeholder="Title" id="title" name="title" 
						value="{{ $errors->has('title') ? old('title') : $joke->title }}">
					</div>
				</div>

				<div class="form-row">
					<div class="col">
						<label for="details">Details</label>
						<textarea class="form-control" id="details" 
						name="details">{{ $errors->has('details') ? old('details'):$joke->details }}</textarea>
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-primary">Post</button>
			</form>
		</div>

		<div class="col-sm-2"></div>
	</div>
@endsection