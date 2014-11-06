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
            <div class="btn-group btn-group-lg">
                <button type="button" class="btn btn-default">+</button>
                <button type="button" class="btn btn-default">-</button>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h3>{{ $actor->fName . ' ' . $actor->lName }}</h3>
        <p>{{ $actor->bio }}</p>
        <h4>Movies associated with {{ $actor->fName . ' ' . $actor->lName }}</h4>
        <h4>Comments about {{ $actor->fName . ' ' . $actor->lName }}</h4>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" class="form-control" id="comment" name="comment" placeholder="Comment">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Submit">
                </div>
            </div>
        </div>
        @foreach(range(1, 10) as $i)
            <div class="comment row">
            <div class="col-md-1">
                <img src="{{ asset('img/user.jpg') }}" alt="User" class="grow-rotate">
            </div>
            <div class="col-md-11">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur eaque eos fugit iure nostrum qui quibusdam quis quod veritatis? Harum impedit laboriosam nam officia, omnis possimus quis? Aut, iusto?</p>
            </div>
            </div>
        @endforeach
    </div>
</div>


@stop