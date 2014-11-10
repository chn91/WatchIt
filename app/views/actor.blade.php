@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3 actor-prof">
        <br>
        <div class="text-center">
            <img src="{{ $actor->image() }}" alt="{{ $actor->fName }}">
            <br>
            <div class="actor-rating">
            {{ $actor->likes() }}
            </div>
            {{ Form::open(['route' => ['actorLike', $actor->id]]) }}
                <input type="submit" value="+" name="plus" class="btn grow btn-default">
                <input type="submit" value="-" name="minus" class="btn grow btn-default">
            {{ Form::close() }}
            <br/>
        </div>
    </div>
    <div class="col-md-9">
        <h3>{{ $actor->fName . ' ' . $actor->lName }}</h3>
        <p>{{ $actor->bio }}</p>
        <hr/>
        <h4>Movies associated with {{ $actor->fName . ' ' . $actor->lName }}</h4>
        <div class="row movies">
            @foreach($actor->movies as $movie)
                <a href="/movie/{{ $movie->id }}">
                    <div class="col-md-2">
                        <div class="cover">
                            <img src="{{ $movie->cover() }}" class="grow" alt="{{ $movie->title }}">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <hr/>
        <h4>Comments about {{ $actor->fName . ' ' . $actor->lName }}</h4>
        {{ Form::open(['route' => ['actorComment', $actor->id]]) }}
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
        @foreach($actor->comments as $comment)
            <div class="comment row">
            <div class="col-md-1">
                <img src="{{ asset('img/user.jpg') }}" alt="User" class="grow-rotate">
            </div>
            <div class="col-md-11">
            <p><strong>{{ $comment->user->fName }}: </strong><br>
            {{ $comment->comment }}</p>
            </div>
            <hr/>
            </div>
        @endforeach
    </div>
</div>


@stop