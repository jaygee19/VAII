@extends('master')

@section('title', 'Albums')

@section('header')
        <h1 class="display-4">Albums</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection

@section('content')
<div class="container">
    <div class="row">
@foreach ( $albums as $album )
  <div class="card col-7 bg-dark text-white">
    <img src="{{ $album->image }}" class="card-img-alb" alt="...">
    <div class="card-img-overlay">
      <h5 class="card-title">{{ $album->artist}} </h5>
      <a href={{ route('album.show', $album->id) }}> <h6 class="card-title">{{ $album->name}} </h6> </a>
      <p class="card-text"> {{ $album->description}} </p>
    </div>
  </div>
  <div class="card col-5 bg-dark text-white"> 
      <p> &nbsp; Include Tracks:</p>
      @foreach ($tracks as $track )
      @if ($track->album_id == $album->id)
      <p> &nbsp; {{ $track->artist }} {{ " - " }} {{ $track->name }}</p>
      @endif
      @endforeach
  </div>
@endforeach

  </div>
</div>

@endsection