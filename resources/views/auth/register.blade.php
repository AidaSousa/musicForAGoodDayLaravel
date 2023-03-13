@extends('layouts.layout')
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>
<body>

@section('content')

<main class="login-form">
    <div class="container-register">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-register card">
                    <div class="header-register card-header">Register Form</div>
                    <div class="card-body">

                        <form action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input class="register" type="text" id="name" class="form-control" name="name" required autofocus placeholder="Insert your name">
                                    @error('name')
                                        <p class="text-danger">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input class="register" type="text" id="username" class="form-control" name="username" required autofocus placeholder="Insert your username">
                                    @error('username')
                                        <p class="text-danger">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input class="register" type="email" id="email" class="form-control" name="email" required autofocus placeholder="Insert your E-mail">
                                    @error('email')
                                        <p class="text-danger">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <select class="register" id="user_type" class="form-control" name="user_type" required>
                                        <option value="">-- Select User Type --</option>
                                        <option value="coder">Coder</option>
                                        <option value="trainer">Trainer</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input class="register" type="password" id="password" class="form-control" name="password" required placeholder="Insert your password">
                                    @error('password')
                                        <p class="text-danger">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input class="register" type="password" id="password_confirmation" class="form-control" name="password_confirmation" required placeholder="Please confirm your password">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn-register btn btn-primary btn-custom">
                                    Register
                                </button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection