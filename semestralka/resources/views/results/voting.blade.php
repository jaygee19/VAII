@extends('master')

@section('title', 'Time for voting')

@section('header')
        <h1 class="display-4"> {{$genre}} list</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection

@section('content')

<div class="container">   

<div class="container">
    <div class="row">
        <form class="form-inline" action="{{ route('vote.filter') }}">
            @csrf
            @method('get')
            <input type="hidden" id="genre" name="genre" value="{{ $genre }}"> 
            <input type="text" class="form-control" id="artist" name="artist" value="" placeholder="Artist"> 
            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Name of song">
            <button type="submit" class="btn btn-primary my-1">Filter by</button>
        </form>
    </div>
</div>
<p></p>
<h3>Full list: </h3>
    <p></p>
    <ul class="list-group">
    @foreach ($tracks as $track)
    <div class="row"> 
            <div class="col-10 col-md-7">
                <form method="post" action="{{ $action}}">  
                @csrf
                @method($method) 
                <input type="hidden" id="id" name="id" value= {{ $track->id }}> 
                <li class="list-group-item rounded"> {{ $track->artist }} {{ " - " }} {{ $track->name }}     
                </li>
                </form>
            </div>
            <div class="col m-auto votebutton">
                <input class="btn btn-sm btn-outline-secondary" type="submit" value="Vote" > 
            </div>
        </div>
        @endforeach
    </ul>
</div>
<p></p>
<p></p>

@endsection