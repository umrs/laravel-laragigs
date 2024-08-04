<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    public function register() {
        return view('users.register');
    }

    public function store(Request $request) {
        $formData = $request->validate([
                                           'name' => 'required|min:3|max:255',
                                           'email' => 'required|email|max:255|unique:users',
                                           'password' => 'required|min:8|confirmed',
                                       ]);

        $formData['password'] = bcrypt($formData['password']);
        $user = User::create($formData);
        auth()->login($user);
        return redirect()->route('listings.index')->with('message', 'Registration successful!');
    }
}