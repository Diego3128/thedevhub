<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        dd(session('success'));
        dd(Auth::user());
        dd(route('post.index'));
    }
}
