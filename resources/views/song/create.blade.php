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
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Upload your own songs</div>
                  <div class="card-body">
                  <form  method="POST" action="{{ route('song.store') }}" enctype="multipart/form-data">
                    @csrf
                          
                  <div class="modal-body">
                    <div class="tile">
                      <div class="tile-body">
                        <div class="form-group">

                          <input class="form-control" id="txtNombre" name="song" type="text" placeholder="Song's name">
                          <input class="form-control" id="txtNombre" name="artist" type="text" placeholder="Artist">
                          <input class="form-control" id="txtNombre" name="gender" type="text" placeholder="Song's gender">
                          <input type="file" class="form-control" id="txtNombre" name="image" type="text" placeholder="Image">
                          <input class="form-control" id="txtNombre" name="youtube" type="text" placeholder="Youtube URL">
                        
                        </div>
                
                        <div class="tile-footer">
                          <button id="btnActionForm" class="btn btn-primary btn-custom" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Done!</span></button>&nbsp;&nbsp;&nbsp;
                        </div>

                        <label>
                          <input type="radio" name="listened" value="yes"> Played songs
                        </label>

                        <label>
                          <input type="radio" name="listened" value="no"> Unplayed songs
                        </label>
                  </form>
                  <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Fake buscador">
              <div class="checkbox">
                                      
              </div>
              <div class="checkbox">
                                      
              </div>

            </div>

                        
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
</body>
</html>