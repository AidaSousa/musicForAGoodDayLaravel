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
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Upload your own songs</div>
                  <div class="card-body">
                  <form  method="POST">
                          
                  <div class="modal-body">
          <div class="tile">
            <div class="tile-body">
              <form id="formRol" name="formRol">
                <input type="hidden" id="idRol" name="idRol" value="">
                <div class="form-group">

                  <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Song's name">
                  <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Artist">
                  <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Song's gender">
                  <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Your name">
                   <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Youtube URL">
                
                </div>
                
                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-primary btn-custom" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Done!</span></button>&nbsp;&nbsp;&nbsp;
                </div>
              </form>
              <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Fake buscador">
              <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="played-songs"> Played songs
                                      </label>
              </div>
              <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="unplayed-songs"> Unplayed songs
                                      </label>
              </div>

                     </div>  
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection