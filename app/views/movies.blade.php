@extends('layouts.master')

@section('content')

<h3>MOVIES</h3>
<br>
    <div class="movie-list">
        @foreach($movies as $movie)
        <a href="/movie/{{ $movie->id }}">
            <div class="movie-item pull-left">
                <span class="movie-cover-fade">
                    <div class="image" style="background-image: url('{{ $movie->cover() }}')"></div>
                    <span class="movie-info">
                        <h4>{{ $movie->title }}</h4>
                        <p>{{ date('Y', strtotime($movie->release)) }}</p>
                    </span>
                </span>
            </div>
        </a>
        @endforeach
    </div>
<br>
<div class="text-center">
<br>
{{ $movies->links() }}
</div>
@stop