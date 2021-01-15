@extends('master')

@section('title', 'Add album')

@section('header')
        <h1 class="display-4">Add album to database</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection


@section('content')
   
<div class="container">
    <h4> Add album: </h4>
    <p></p>
        <div class="form-group text-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}<br>
            @endforeach
        </div>
    <form method="post" action="{{ $action}}"> 
        @csrf
        @method($method)
        <div class="form-row">
            <div class="col-7">
                <input type="text" class="form-control" id="artist" name="artist" value="{{ old('artist', @$model->artist) }}" placeholder="Artist" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',@$model->name) }}" placeholder="Name of Album" required>
            </div>
            <div class="col">
                <select type="text" class="form-control" id="genre" name="genre" required>
                <option selected value="{{ old('genre',@$model->genre) }}">Genre...</option>
                <option value="Trance">Trance</option>
                <option value="Progressive">Progressive</option>
                <option value="DnB">DnB</option>
                </select>
            </div>
            
        </div>
        <p></p>
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" id="numberOfSongs" name="numberOfSongs" value="{{ old('numberOfSongs', @$model->artist) }}" placeholder="Number Of Songs" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="image" name="image" value="{{ old('image',@$model->name) }}" placeholder="Image" required>
            </div>
            <div class="col-8">
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description',@$model->name) }}" placeholder="Description">
            </div>
            
        </div>
        <p></p>
            <div>
            <div>
            <p></p>
        <input type="submit" value="Send" >
        </div>
    </form>
</div>

@endsection

