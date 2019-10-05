@extends('layouts.app')

@section('content')

	<div class="row mt-5">
		<div class="col-sm-2"></div>

		<div class="col-sm-8">

			<div class="jumbotron jumbotron-fluid">
			  <div class="container">
			    <h1 class="display-4">{{ $joke->title }}</h1>
			    <p class="lead">Author: {{ $joke->user->name }}</p>
			    <p>Posted On {{ $joke->created_at }}</p>
			  </div>
			</div>
			<h3><strong>* Details Joke *</strong></h3>
			<div>
				{{ $joke->details }}

			</div>

			<br/>
			@auth
				@if(auth()->user()->id === $joke->user_id)
					<a href="/jokes/{{$joke->id}}/edit" class="btn btn-info mt-3" style="display:inline;">Edit</a>
					<form style="display:inline;" method="POST">
						@method('DELETE')
						@csrf
						<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				@endif
			@endauth
			<br/>
			@auth
				@include('error')
				<form method="POST" action="/jokes/{{$joke->id}}/comments">
					@csrf
					 <div class="form-group">
					    <label for="exampleFormControlTextarea1">Add Comment</label>
					    <textarea class="form-control @error('comment') is-invalid @enderror" 
					    id="exampleFormControlTextarea1" rows="3" name="comment">{{ old('comment') }}</textarea>
					  </div>
					  <button type="submit" class="btn btn-primary float-right">Submit</button>
				</form>
			@endauth
			<br/>
			<br/>
			@if($joke->comments->count())
				<h5>All Comment(s)</h5>
				@foreach($joke->comments as $comment)
					<div class="alert alert-light" role="alert">
						<p>
							@if($joke->user_id == $comment->user_id)
								<strong>{{ $comment->user->name }} (Owner) </strong>
							@else
								<strong>{{ $comment->user->name }}</strong>
							@endif
						</p>

				  		<div class="">
				  			{{ $comment->comment }}
				  		</div>
				  		<small>Posted On {{$comment->created_at}}</small>

				  		@auth
				  			@if(auth()->user()->id === $comment->user_id)
								<form class="float-right" method="POST" action="/jokes/comments/{{$comment->id}}">
									@csrf
									@method("DELETE")
						  			<button tyype="submit" class="btn btn-danger btn-sm" name="submit">Delete</button>
								</form>
							@endif
						@endauth
					</div>
				@endforeach
			@else
				<div class="alert alert-warning" role="alert">
				  No comment on this joke.
				</div>
			@endif

		</div>
		<div class="col-sm-2"></div>
	</div>
@endsection