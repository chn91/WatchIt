@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-3 actor-prof">
        <br>
        <div class="text-center">
            <img src="{{ $movie->cover() }}" alt="{{ $movie->title }}">
            <br>
            <div class="actor-rating">
            {{ $movie->likes() }}
            </div>
            {{ Form::open(['route' => ['movieLike', $movie->id]]) }}
                <input type="submit" value="+" name="plus" class="btn grow btn-default">
                <input type="submit" value="-" name="minus" class="btn grow btn-default">
            {{ Form::close() }}
            <div>
                <br>
                {{ Form::open(['route' => ['movieWatch', $movie->id]]) }}
                <input type="submit" class="btn grow btn-primary btn-block" value="I have watched this">
                {{ Form::close() }}
                <p class="small">{{ $movie->watched() }} have watched this!</p>
                {{ Form::open(['route' => ['movieToWatch', $movie->id]]) }}
                <input type="submit" class="btn grow btn-primary btn-block" value="I want to watch this">
                {{ Form::close() }}
                <p class="small">{{ $movie->toWatch() }} want to watch this!</p>
            </div>
        </div>
    </div>
    <div class="col-md-9 movie-detail">
        <h3>{{ $movie->title }} <span class="pull-right">{{ date('Y', strtotime($movie->release)) }}</span></h3>
        <ul class="genres">
            @foreach($movie->genres as $genre)
                <li class="grow-rotate">{{ $genre->name }}</li>
            @endforeach
        </ul>
        <p>{{ $movie->resume }}</p>
        <hr/>
        <h4>Actors associated with {{ $movie->title }}</h4>
        <div class="row actors">
            @foreach($movie->actors as $actor)
                <a href="/actor/{{ $actor->id }}">
                    <div class="col-md-2">
                        <div class="actor-img grow">
                            <img src="{{ $actor->image() }}" alt="{{ $actor->fName . ' ' . $actor->lName }}">
                        </div>
                        <p>{{ $actor->fName . ' ' . $actor->lName }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <hr/>
        <h4>Comments for {{ $movie->title }}</h4>
        {{ Form::open(['route' => ['movieComment', $movie->id]]) }}
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" class="form-control" id="comment" name="comment" placeholder="Comment">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="submit" class="btn grow btn-primary btn-block" value="Submit">
                </div>
            </div>
        </div>
        {{ Form::close() }}
        @foreach($movie->comments as $comment)
            <div class="comment row">
            <div class="col-md-1">
                <img src="{{ asset('img/user.jpg') }}" alt="User" class="grow-rotate">
            </div>
            <div class="col-md-11">
            <p><strong>{{ $comment->user->fName }}: </strong><br>
            {{ $comment->comment }}</p>
            </div>
            </div>
        @endforeach
    </div>
</div>


@stop