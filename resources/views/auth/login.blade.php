@extends('layouts.layout')

@section('title', 'Login')

@section('content')

<main class="login-form">
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-login card">
                    <div class="header-login card-header">Login</div>
                    <div class="card-body">
    
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="email" id="email" class="login form-control" name="email" placeholder="Email" required autofocus>
                                    
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="password" id="password" class="login form-control" name="password" placeholder="Password" required>

                                    @error('message')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                            </div>
                            
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn-login btn btn-primary btn-custom">
                                    Login
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