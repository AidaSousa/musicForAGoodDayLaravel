@extends('layouts.layout')

@section('title', 'Songs')

@section('content')
@foreach($songs as $item)
<div class="card float-center">
      <div class="list row">
        <div class="col-sm-4">
          <img class="d-block img-fluid" src="{{ $item->image}}" alt="Song's Cover">
        </div>
        <div class="col-md-left-0 d-flex">
          <div class="card-block">
            <h5 class="card-title mt-2">{{ ucfirst($item->song) }}</h5>
            <h6>{{ ucfirst($item->artist) }}</h6>
            <p>{{ ucfirst($item->gender) }}</p>
            <p class="mb-2">Proposed with 🖤 by {{ $item->user->name }}</p>
            </div>
            <div class="play card-block col-md-5">
            <a href=" {{ $item->youtube }}" target="_blank" class="youtube btn" ><img class="img-fluid" src="/img/play.png"/></a>
            </div>
            <div class="actions card-block col-md-1">
            @if ($item->user_id == Auth::user()->id)
            <a href="{{ route('song.destroy', $item->id) }}" class="btn" onclick="return deleteSong('Are you sure you want to delete this song?')"><img class="options" src="/img/delete.png"/></a>
            <br/>
            <a href="/edit/{{$item->id }}" class="btn"><img class="options" src="/img/edit.png"/></a>
            @endif
            @if ($item->listened == 'no')
            <form class="listen" action="{{ route('song.markAsListened', $item) }}" method="POST">
            @csrf
            <button class="btn-xs ml-2"type="submit">✔️</button>
            </form>
            @endif
            <script>
              function deleteSong(value) {
                action = confirm(value) ? true:event.preventDefault()
              }
            </script>
          </div>
        </div> 
      </div>
    </div>
@endforeach
<div class="pagination-container d-flex justify-content-center" style="margin-top: 3em;">
<a href="{{ route('listened.index') }}" class="listened-song btn">See your listened songs</a>
  <p class="pagination">{{ $songs->links('pagination::bootstrap-5') }}</p>
</div>

@endsection
