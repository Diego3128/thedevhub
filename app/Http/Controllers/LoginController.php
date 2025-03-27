<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(LoginUserRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt(credentials: $credentials, remember: false)) {
            // regenerate session
            $request->session()->regenerate();
            //redirect user
            return redirect()->route('post.index')->with('success', __('forms.login_form.logged', ['username' => Auth::user()->username]));
        }
        // authentication failed
        return back()->with(['fail' => __('forms.login_form.fail'),]);
    }
}
