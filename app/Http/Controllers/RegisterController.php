<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'user_type' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::create(request(['name', 'username', 'email', 'user_type', 'password']));

        auth()->login($user);
        return redirect()->to('/');
    }
}
