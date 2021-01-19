
@extends('master')

@section('title', 'All tracks')
    

@section('header')
        <h1 class="display-4">All songs in DB</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection


@section('content')
<div class="container">
    <a href="{{ route('track.create') }}" class="btn btn-sm btn-outline-secondary" role="button"> Track
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
    </a>
    <a href="{{ route('album.create') }}" class="btn btn-sm btn-outline-secondary" role="button"> Album
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
    </a>
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
            <?php $counter = 0; ?>
            @foreach ($tracks as $track)
            <div class="row">
                <div class="col-9 col-md-7">
                    <ul class="list-group">
                    <li class="list-group-item rounded"> {{ $track->artist }} {{ " - " }} {{ $track->name }} {{ "("  }} {{ $track->genre }} {{ ")" }} &nbsp;                       
                    </li>
                </ul>
                </div>
                <div class="col m-auto votebutton">
                    <a href="{{ route('track.edit', $track->id) }}" class="btn btn-sm btn-outline-secondary" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                    </a>
                    <a href="{{ route('track.delete', $track->id) }}" class="btn btn-sm btn-outline-secondary" role="button" data-confirm="Are You Sure?" data-method="DELETE">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                    </a> 
                </div>
            </div>   
             @endforeach
        <p></p>
    <p></p>
    <div >{{ $tracks->links() }}</div>
    </div>
 
    
@endsection




       