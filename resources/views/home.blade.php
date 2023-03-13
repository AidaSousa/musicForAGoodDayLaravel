@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <div class="container d-flex justify-content-md-center">
        <div class="form-song w-75 p-3 overflow-hidden">
        <h4 class="insert text-center mb-3">Upload your own song</h4>
        <!-- Formulario -->
        <form action="{{ route('song.store') }}" method="POST" enctype="multipart/form-data" class="d-flex justify-content-around text-primary mb-3">
            @csrf
            <div class="form-group">
                <input class="input-song" id="song" name="song" type="text" class="form-control" placeholder="Title song">
                <input class="input-song" id="youtube" name="youtube" type="text" class="form-control" placeholder="URL Youtube">
            </div>
            <div class="form-group">
                <input class="input-song" id="artist" name="artist" type="text" class="form-control" placeholder="Artist">
                <input class="input-song" type="file" class="form-control" id="image" name="image" placeholder="Upload song's cover">
            </div>
            <div class="form-group">
                <input class="input-song" id="gender" name="gender" type="text" class="form-control" placeholder="Gender your song">
                <button type="submit" class="add btn btn-primary m-4 p-2">Add</button>
            </div>
        </form>
        <div class="container d-flex justify-content-md-center">
            <a href="{{ route('song.index') }}" class="all-song btn btn-primary">See all songs</a>
            <a href="{{ route('listened.index') }}" class="listend-song btn btn-primary">See your listened songs</a>
        </div>
    </div>
    </div>
@endsection


</body>
</html>