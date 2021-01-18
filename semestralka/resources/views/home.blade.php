@extends('master')

@section('title', 'Account')

@section('header')
        <h1 class="display-4">Your Account {{ Auth::user()->name }}</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <b>Hi {{ Auth::user()->name }} ! {{ __('You are logged in!') }}</b> 
                    <p></p>
                    <p>Here are song you've been voting for:</p>
                </div>
            </div>
        </div>
    </div>
</div>
<p></p>
<p></p>

<div class="container" >
    <div class="row justify-content-end" id="userVotes">
        @foreach ($tracks as $track)
        <div class="col-md-10">
            <ul>
                <li class="list-group-item rounded"> {{ $track->artist }} {{ " - " }} {{ $track->name }} {{ "("  }} {{ $track->genre }} {{ ")" }} &nbsp;
                    <button class="btn btn-sm btn-outline-secondary" onClick="unvote({{ $track->id }})">Unvote</button>
                    <div>
                        <button class="btn btn-sm btn-outline-secondary" onClick="posi({{ $track->id }})">Position</button>
                    </div>
                </li>  
            </ul>   
        </div>
        @endforeach
    </div>
</div>

@endsection
