@extends('master')

@section('title', 'Results')

@section('header')
        <h1 class="display-4">{{$genre}} Top 10</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection

@section('content')

<div class="container">
    <h3> List of results:  <p class="numVotes"> Number of votes: </p> </h3>
        <?php $counter = 0; ?>
        <ul class="list-group">
            @foreach ($tracks as $track)
            <?php $counter++; 
            if ($counter < 11) {
            ?>
            <li class="list-group-item rounded "> {{ $counter }} . {{ $track->artist }} {{ " - " }} {{ $track->name }} {{ "("  }} {{ $track->genre }} {{ ")" }} &nbsp; 
            <span class="votes"> <b> {{ $track->users_count }} </b> </span>
            </li>
             <?php } ?> 
             @endforeach
        </ul>
</div>

@endsection