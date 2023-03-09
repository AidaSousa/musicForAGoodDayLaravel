@extends('layout')

@section('modalBootstrap')
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
  E
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('song.store') }}" method="POST">
            <div class="modal-body" id="formEditarSong">
                    <input class="form-control" id="e-Song" name="txtNombre" type="text" placeholder="Song's name">
                    <input class="form-control" id="e-Artist" name="txtNombre" type="text" placeholder="Artist">
                    <input class="form-control" id="e-Gender" name="txtNombre" type="text" placeholder="Song's gender">
                    <input class="form-control" id="e-Youtube" name="txtNombre" type="text" placeholder="Youtube URL">
            </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" class="modalButton">Save changes</button>
      </div>
    </div>
  </div>
</div>
  @endsection

  <!-- @section('#exampleModalCenter')
<script>
    let modalEditarSong = $('#exampleModalCenter');
    let urlEditar = "{{ url('/songs') }}";
    let formEditarVideo = document.querySelector('#formEditarSong');
    let eSong = document.querySelector('#e-Song');
    let eArtist = document.querySelector('#e-Artist');
    let eGender = document.querySelector('#e-Gender');
    let eYoutube = document.querySelector('#e-Youtube');

    modalEditarSong.on('show.bs.modal', function (event) {
        let botonPresionado = $(event.relatedTarget);
    console.log(botonPresionado)
    });
</script>
    @endsection -->

  @yield('modalBootstrap')
  <!-- @yield('#exampleModalCenter') -->