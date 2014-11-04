@extends('layouts.master')

@section('content')

<h3>ACTORS</h3>
<br>
@foreach($actors as $actor)
<a href="/actor/{{ $actor->id }}">
<div class="col-md-3 actor-item">
    <div class="text-center">
        <div class="mask grow">
            <img src="{{ $actor->image() }}" alt="{{ $actor->fName }}">
        </div>
        <h4>{{ $actor->fName . ' ' . $actor->lName }}</h4>
    </div>
</div>
</a>
@endforeach

<br>
<div class="text-center">
<br>
{{ $actors->links() }}
</div>
@stop