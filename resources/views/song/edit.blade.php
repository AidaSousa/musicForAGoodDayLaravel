@extends('layouts.layout')

@section('title', 'Edit your song')

@section('content')
    <div class="container d-flex justify-content-md-center">
        <div class="form-song w-75 p-3 overflow-hidden">
        <h4 class="insert text-center mb-3">Edit your own song</h4>
        <!-- Formulario -->
        <form action="{{ route('song.update', $song->id) }}" method="POST" enctype="multipart/form-data" class="d-flex justify-content-around text-primary mb-3">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input class="input-song" id="song" name="song" type="text" class="form-control" value="{{$song->song}}">
                <input class="input-song" id="youtube" name="youtube" type="text" class="form-control" value="{{$song->youtube}}">
            </div>
            <div class="form-group">
                <input class="input-song" id="artist" name="artist" type="text" class="form-control" value="{{$song->artist}}">
                <input class="input-song" type="file" class="form-control" id="image" name="image" value="{{$song->image}}">
            </div>
            <div class="form-group">
                <input class="input-song" id="gender" name="gender" type="text" class="form-control" value="{{$song->gender}}">
                <button type="submit" class="add btn btn-primary m-4 p-2">Edit</button>
            </div>
        </form>
        <div class="container d-flex justify-content-md-center">
            <a href="{{ route('song.index') }}" class="add btn btn-primary">See all songs</a>
        </div>
    </div>
    </div>
@endsection



</html>