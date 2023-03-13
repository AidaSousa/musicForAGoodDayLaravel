@extends('layouts.layout')

@section('title', 'Your songs heard')

@section('content')

@foreach($listeneds as $listened)
<div class="listend-card card float-center">
  <div class="list row">
    <div class="col-sm-4">
      <img class="d-block img-fluid" src="{{ $listened->song->image}}" alt="Song's Cover">
    </div>
    <div class="col-md-left-0 d-flex">
      <div class="card-block">
        <h5 class="card-title mt-2">{{ ucfirst($listened->song->song) }}</h5>
        <h6>{{ ucfirst($listened->song->artist) }}</h6>
        <p>{{ ucfirst($listened->song->gender) }}</p>
        <p class="mb-2">Proposed with 🖤 by {{ ucfirst($listened->user->name) }}</p>
      </div>
      <div class="play card-block col-md-5">
        <a href=" {{ $listened->song->youtube }}" target="_blank" class="youtube btn" ><img class="img-fluid" src="/img/play.png"/></a>
      </div>
    </div>
    <div class="actions card-block col-md-1">
            @if ($listened->user_id == Auth::user()->id)
            <a href="{{ route('song.destroy', $listened->song->id) }}" class="btn" onclick="return deleteSong('Are you sure you want to delete this song?')"><img class="options" src="/img/delete.png"/></a>
            <br/>
            <a href="/edit/{{$listened->song->id }}" class="btn"><img class="options" src="/img/edit.png"/></a>
            @endif
            <script>
              function deleteSong(value) {
                action = confirm(value) ? true:event.preventDefault()
              }
            </script>
          </div>
  </div>
</div>
@endforeach
<div class="pagination-container d-flex justify-content-center" style="margin-top: 3em;">
  <a href="{{ route('song.index') }}" class="all-songg btn btn-primary">See all songs</a>
  <p class="pagination">{{ $listeneds->links('pagination::bootstrap-5') }}</p>
</div>


@endsection

