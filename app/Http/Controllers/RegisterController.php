<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes =  request()->validate([
            'name' => 'required|max:255  ',
            'username' => 'required|max:225|min:3|unique:users,username',
            'email' => 'required|email|max:225|unique:users,email',
            'password' => 'required|min:7|max:255'
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
