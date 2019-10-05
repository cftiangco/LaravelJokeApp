@extends('layouts.app')

@section('content')
	<div class="row mt-5">
		<div class="col-sm-2"></div>

		<div class="col-sm-8">
			<h1>Post New Joke</h1>

			@include('error')

			<br />
			<form method="POST" action="/jokes" enctype="multipart/form-data">
				@csrf
				<div class="form-row">
					<div class="col">
						<label for="title">Title</label>
						<input type="text" 
						class="form-control @error('title') is-invalid @enderror" 
						placeholder="Title" id="title" name="title" value="{{ old('title') }}">
					</div>
				</div>

				<div class="form-row">
					<div class="col">
						<label for="details">Details</label>
						<textarea id="details" name="details" 
						class="form-control @error('details') is-invalid @enderror" 
						placeholder="Details">{{ old('details') }}</textarea>
					</div>
				</div>
				<div class="form-group">
				    <label for="exampleFormControlFile1">Upload cover image</label>
				    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
				 </div>
				<br>
				<button type="submit" class="btn btn-primary">Post</button>
			</form>
		</div>

		<div class="col-sm-2"></div>
	</div>
@endsection