
@extends('master')

@section('title', 'All tracks')
    

@section('header')
        <h1 class="display-4">All songs in DB</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection


@section('content')
<div class="container">
    <a href="{{ route('track.create') }}" class="btn btn-sm btn-outline-secondary" role="button">Add new</a>
</div>



<p>&nbsp;</p> 

<div class="container">

        <div class="card text-center">
            <div class="card-header">
            </div>
            <div class="card-body">
              <h5 class="card-title">Something has been changed by {!! Auth::user()->name !!}</h5>
              <p>Action successful !</p>
            </div>
          </div>
    <p></p>
    
    <h3> All Songs: </h3>
    <div class="row">
        <?php $counter = 0; ?>
        <ul class="list-group">
            @foreach ($tracks as $track)
            <div class="col">
                <li class="list-group-item"> {{ $track->artist }} {{ " - " }} {{ $track->name }} {{ "("  }} {{ $track->genre }} {{ ")" }} &nbsp;
           
                    <a href="{{ route('track.edit', $track->id) }}" class="btn btn-sm btn-outline-secondary" role="button">Edit</a>
                    <a href="{{ route('track.delete', $track->id) }}" class="btn btn-sm btn-outline-secondary" role="button" data-confirm="Are You Sure?" data-method="DELETE">Delete</a>
                        
                    </li>
            </div>
           
             @endforeach
        </ul>
    </div>
    <p></p>
    <p></p>
    <div >{{ $tracks->links() }}</div>
</div>
 
    
@endsection




       