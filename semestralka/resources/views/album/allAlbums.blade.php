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
  <div class="card col-12 col-lg-4 col-md-4 text-white">
    <img src="{{ $album->image }}" class="card-img-alb" alt="...">
    <div class="card-img-overlay">
      <h5 class="card-title">{{ $album->artist}} </h5>
      <a href={{ route('album.show', $album->id) }}> <h6 class="card-title">{{ $album->name}} </h6> </a>
      <p class="card-text"> {{ $album->description}} </p>
      @if (Auth::user() != null && Auth::user()->admin == 1)  
      <a href="{{ route('album.edit', $album->id) }}" class="btn btn-sm btn-outline-secondary" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
          </svg>
      </a>
      <a href="{{ route('album.delete', $album->id) }}" class="btn btn-sm btn-outline-secondary" role="button" data-confirm="Are You Sure?" data-method="DELETE">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
          </svg>
    </a>
    @endif
    </div>
      {{-- <div> 
      <p></p>
      <h6> &nbsp; Include Tracks:</h6>
      @foreach ($tracks as $track )
      @if ($track->album_id == $album->id)
      {{ $track->artist }} {{ " - " }} {{ $track->name }} {{ ", " }}
      @endif
      @endforeach
    </div> --}}
  </div>
  @endforeach
  </div>
</div>

@endsection