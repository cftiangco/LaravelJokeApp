@extends('layouts.app')

@section('content')
    <div class="row m-5">
        <div class="col-sm-2"></div>

            <div class="col-sm-8">
            @foreach($jokes as $joke)
                <div class="card mb-3" style="max-width: 100%;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="{{ $joke->image }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">{{ $joke->title }}</h5>
                        <p class="card-text"><small class="text-muted">Author {{ $joke->user->name }}</small></p>
                        <p class="card-text">{{ Str::limit($joke->details,150) }}</p>
                        <p class="card-text"><small class="text-muted">Posted On {{ $joke->created_at }}</small></p>
                        <a href="/jokes/{{ $joke->id }}" class="btn btn-outline-primary float-right">Read</a>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
            </div>

        <div class="col-sm-2"></div>
    </div>
@endsection