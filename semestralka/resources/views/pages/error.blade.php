@extends('master')

@section('title', 'Error')
    

@section('header')
        <h1 class="display-4">Something went wrong :(</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection


@section('content')
<div class="container">
    <div class="card text-center">
        <div class="card-header">
        </div>
        <div class="card-body">
          <h5 class="card-title">Error</h5>
          @if ($notify == '1')
          <p> "You have already voted for this song" </p>
          @endif
          @if ($notify == '2')
          <p> "You have already voted for maximum number of songs" </p>
          @endif
          @if ($notify == '3')
          <p> "You couldn't cancel this vote" </p>
          @endif
        </div>
      </div>
</div>
@endsection
