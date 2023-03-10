@extends('layouts.layout')
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload your own song</title>
</head>
<body>
@section('content')
    <div class="container d-flex justify-content-md-center">
        <div class="w-75 p-3 overflow-hidden" style="min-height: 540px; max-height:540px; background-color: #eee; border-radius: 1em; overflow:scroll;">
        <h4 class="text-primary text-center mb-3">Insert your own song</h4>
        <!-- Formulario -->
        <form action="{{ route('song.store') }}" method="POST" enctype="multipart/form-data" class="d-flex justify-content-around text-primary mb-3">
            @csrf
            <div class="form-group">
                <label for="song">Song's name:</label>
                <input id="song" name="song" type="text" class="form-control">
                <label for="youtube">Youtube URL:</label>
                <input id="youtube" name="youtube" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="artist">Artist:</label>
                <input id="artist" name="artist" type="text" class="form-control">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input id="gender" name="gender" type="text" class="form-control">
                <button type="submit" class="btn btn-primary m-4 p-2">Add</button>
            </div>
        </form>
        <div class="container d-flex justify-content-md-center">
            <a href="{{ route('song.index') }}" class="btn btn-primary" style="background-color: blue;">See all songs</a>
        </div>
    </div>
    </div>
@endsection


</body>
</html>
