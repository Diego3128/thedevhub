<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        try {
            $validatedData = $request->validated();
            // password is hashed automatically
            $user = User::create($validatedData);
            // log in user
            Auth::login(user: $user, remember: false);
            return redirect()->route('post.index')->with('success', __('forms.register_form.created', ['username' => $user->username]));
        } catch (\Throwable $th) {
            Log::error("User registration failed: " . $th->getMessage(), ['exception' => $th]);
            return redirect()->back()->with('error', __('forms.register_form.fail'));
        }
    }
}
