@extends('master')

@section('title', 'Time for voting')

@section('header')
        <h1 class="display-4"> {{$genre}} list</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection

@section('content')

<div class="container">   
    <h3>Full list: </h3>
    <p></p>
    <div class="row">
        <ul class="list-group">
            @foreach ($tracks as $track)
            <div class="col">
                @if($track->genre == $genre)
                <form method="post" action="{{ $action}}">
                @csrf
                @method($method)
                <input type="hidden" id="id" name="id" value= {{ $track->id }}> 
                <li class="list-group-item rounded"> {{ $track->artist }} {{ " - " }} {{ $track->name }} {{ "("  }} {{ $track->genre }} {{ ")" }} 
                <input type="submit" value="Vote" >
                </li>
                </form>
            </div>
            @endif
            @endforeach
        </ul>
    </div>
</div>

@endsection