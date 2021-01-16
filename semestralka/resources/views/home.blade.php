
@extends('master')

@section('title', 'Account')

@section('header')
        <h1 class="display-4">FIND YOUR TOP 10</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <b>Hi {{ Auth::user()->name }} !</b> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<p></p>
<p></p>

<div class="container" >
    <div class="row justify-content-center" id="userVotes">
        @foreach ($tracks as $track)
        <div class="col-md-8">
                <li class="list-group-item rounded"> {{ $track->artist }} {{ " - " }} {{ $track->name }} {{ "("  }} {{ $track->genre }} {{ ")" }} &nbsp;
                        <button id="del" onClick="unvote({{ $track->id }})">Unvote</button>
                </li>
            </div>
        @endforeach
    </div>
</div>


@endsection
