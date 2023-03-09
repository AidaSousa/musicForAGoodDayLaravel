 @extends('layouts.layout')

@section('content')
  <div class="container d-flex justify-content-md-center">
    <div class="w-75 p-3 overflow-hidden" style="min-height: 540px; max-height: 540px; background-color: #eee; border-radius: 1em; overflow: scroll;">
      <h4 class="text-primary text-center mb-3">Insert your own song</h4>
      <!-- /////////Formulario/////////// -->
      <form action="{{ route('song.store') }}" method="POST" class="d-flex justify-content-around text-primary mb-3">
        @csrf 
        <div class="form-group">
          <label for="song-name">Song's name:</label> 
          <input id="song-name" name="song-name" type="text" class="form-control">
          <label for="text">Youtube URL:</label> 
          <input id="youtube-url" name="youtube-url" type="youtube-url" class="form-control">
        </div>
        <div class="form-group">
          <label for="text">Artist:</label> 
          <input id="artist" name="artist" type="artist" class="form-control">
          <label for="image-url">Image URL:</label> 
          <input id="image-url" name="image-url" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="your-name">Your name:</label> 
          <input id="your-name" name="your-name" type="text" class="form-control">
        </div>
          <a class="btn btn-primary" href="#" role="button">Add</a>
      </form>
      <!-- ///////Card songs/////// -->
      <div class="song d-flex justify-content-md-center row text-primary">
        @foreach ($Songs as $row)
        <!-- @foreach ($User as $row) -->
        <div class="col-md-2 text-center">
          <img class="w-100" 
          src="https://i.scdn.co/image/ab67616d00001e02f429549123dbe8552764ba1d"
          alt="Song's cover" 
          />
        </div>
        <div class="col-md-5 text-left">
          <h5 class="text-primary">{{ $row->song }}</h5>
          <p class="text-primary mb-1">{{ $row->artist }}</p>
          <p class="text-primary mb-1">{{ $row->gender }}</p>
          <p class="text-secondary">{{ $row->user }}</p>
        </div>
        @endforeach
        <div class="col-md-3 text-center center mt-4">
          <button type="button" class="btn btn-primary mb-1">▶</button>
          <button type="button" class="btn btn-success mb-1">✎</button>
          <button type="button" class="btn btn-danger mb-1">X</button><br>
          <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault">Played</label>
        </div>
      </div>
    </div>
  </div>
@endsection