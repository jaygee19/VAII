
@extends('master')

@section('title', 'All tracks')
    

@section('header')
        <h1 class="display-4">All songs in DB</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection


@section('content')
<div class="container">
    <a href="{{ route('track.create') }}" class="btn btn-sm btn-success" role="button">Add new</a>
</div>

<p>&nbsp;</p> 

<div class="container">
    <h3> All Songs:  
        <p> </p>
        {{-- class="numVotes"> Number of votes:   --}}
    </h3>
        <?php $counter = 0; ?>
        <ul class="list-group">
            @foreach ($tracks as $track)
            <?php $counter++; 
            ?>
            <li class="list-group-item"> {{ $counter }} . {{ $track->artist }} {{ " - " }} {{ $track->name }} {{ "("  }} {{ $track->genre }} {{ ")" }} &nbsp;
           
            <a href="{{ route('track.edit', $track->id) }}" class="btn btn-sm btn-success" role="button">Edit</a>
            <a href="{{ route('track.delete', $track->id) }}" class="btn btn-sm btn-success" role="button" data-confirm="Are You Sure?" data-method="DELETE">Delete</a>
                
            {{-- <span class="votes"> <b> {{ $track->users_count }} </b> </span> --}}
            </li>
             @endforeach
        </ul>
</div>
 
    
@endsection




