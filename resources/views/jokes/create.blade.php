@extends('layout')

@section('content')
	<div class="row mt-5">
		<div class="col-sm-2"></div>

		<div class="col-sm-8">
			<h1>Post New Joke</h1>
			<br />
			<form method="POST" action="/jokes">
				@csrf
				<div class="form-row">
					<div class="col">
						<label for="author">Author</label>
						<input type="text" class="form-control" placeholder="Author" id="author" name="author">
					</div>
				</div>

				<div class="form-row">
					<div class="col">
						<label for="title">Title</label>
						<input type="text" class="form-control" placeholder="Title" id="title" name="title">
					</div>
				</div>

				<div class="form-row">
					<div class="col">
						<label for="details">Details</label>
						<textarea class="form-control" id="details" name="details" placeholder="Details"></textarea>
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-primary">Post</button>
			</form>
		</div>

		<div class="col-sm-2"></div>
	</div>
@endsection