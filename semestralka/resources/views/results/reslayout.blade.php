@extends('master')

@section('title', 'Results')

@section('header')
        <h1 class="display-4">{{$genre}} Top 10</h1>
        <p class="lead">Vote each month your top three songs in various genres. </p>
@endsection

@section('content')

<div class="container">
<h3> List of results: </h3>
<p></p>
<table class="table table-dark">
    <thead>
      <tr class="firstrow">
        <th scope="col">#</th>
        <th scope="col">Artist</th>
        <th scope="col">Name of song</th>
        <th scope="col">Number of votes</th>
      </tr>
    </thead>
    <tbody>
        <?php $counter = 0; ?>
        @foreach ($tracks as $track)
        <?php $counter++; 
            if ($counter < 11) {
        ?>
      <tr>
        <th scope="row">{{ $counter }}.</th>
        <td>{{ $track->artist }}</td>
        <td>{{ $track->name }}</td>
        <td><b><i>{{ $track->users_count }}</i></b></td>
      </tr>
      <?php } ?> 
      @endforeach
    </tbody>
  </table>
</div>

@endsection