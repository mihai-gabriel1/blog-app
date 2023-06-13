<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|max:255  ',
            'username' => 'required|max:225|min:3',
            'email' => 'required|email|max:225',
            'password' => 'required|min:7|max:255'
        ]);
    }
}
