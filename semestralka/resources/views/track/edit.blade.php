@extends('master')

@section('title', 'Edit song')

@section('header')
        <h1 class="display-4">Edit song from the database</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection


@section('content')
   
@include('track.addForm')

@endsection