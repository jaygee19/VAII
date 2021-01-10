
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
                <div class="card-header">Hi {{ Auth::user()->name }} !</div>

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


@endsection
