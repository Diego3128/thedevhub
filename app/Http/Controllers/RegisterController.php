<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterNewUser;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterNewUser $request)
    {
        dd($request->all());
    }
}
