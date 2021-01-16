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
    <div class="row">
        <ul class="list-group">
            @foreach ($tracks as $track)
            <div class="col">
                {{-- @if($track->genre == $genre) --}}
                <form method="post" action="{{ $action}}">  
                @csrf
                @method($method) {{-- zbytocnost --}}
                <input type="hidden" id="id" name="id" value= {{ $track->id }}> {{-- zbytocnost --}}
                <li class="list-group-item rounded"> {{ $track->artist }} {{ " - " }} {{ $track->name }} {{ "("  }} {{ $track->genre }} {{ ")" }} 
                <input type="submit" value="Vote" > 
                
                {{-- <div class="track btn btn-success" id={{ $track->id }} ></div>  --}}
                </li>
                </form>
            </div>
            {{-- @endif --}}
            @endforeach
        </ul>
    </div>
</div>

<p></p>
<p></p>
<div class="container">{{ $tracks->links() }}</div>

@endsection