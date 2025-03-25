@extends('layouts.app')

@section('page_title', 'Create you account')

@section('main_content')
    <div class="md:flex  md:justify-between">
        <div class="  md:w-1/2 md:flex md:items-center">
            <img class="rounded-lg max-w mb-6 md:mb-0 -5/6 mx-auto" src="{{ asset('img/auth/register.jpg') }}"
                alt="register image">
        </div>
        <div class="mx-auto w-auto md:w-1/2 md:mx-0">
            <form class="mx-auto max-w-5/6 shadow-2xl rounded-lg py-5 px-3.5 md:py-6 md:px-5"
                action="{{ route('register.store') }}" method="post" novalidate>
                @csrf
                <fieldset>
                    <legend class="sr-only">Create an Account</legend>

                    <div class="mb-4">
                        <label for="name" class="block mb-2 capitalize font-bold text-gray-500">
                            Your Name
                            <span class="text-red-400" aria-hidden="true">*</span>
                            <span class="sr-only">(required)</span>
                        </label>
                        <input class="w-full border border-gray-300 focus:border-gray-600 outline-none p-3 rounded-lg"
                            id="name" type="text" name="name" placeholder="Enter your full name" required
                            aria-required="true" autocomplete="name" value="{{ @old('name', '') }}">
                        @error('name')
                            <p
                                class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-400 text-white font-bold text-center p-1.5 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="username" class="block mb-2 capitalize font-bold text-gray-500">
                            Username
                            <span class="text-red-400" aria-hidden="true">*</span>
                            <span class="sr-only">(required)</span>
                        </label>
                        <input class="w-full border border-gray-300 focus:border-gray-600 outline-none p-3 rounded-lg"
                            id="username" type="text" name="username" placeholder="Choose a unique username" required
                            aria-required="true" autocomplete="username" value="{{ @old('username', '') }}">
                        @error('username')
                            <p
                                class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-400 text-white font-bold text-center p-1.5 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block mb-2 capitalize font-bold text-gray-500">
                            Email Address
                            <span class="text-red-400" aria-hidden="true">*</span>
                            <span class="sr-only">(required)</span>
                        </label>
                        <input class="w-full border border-gray-300 focus:border-gray-600 outline-none p-3 rounded-lg"
                            id="email" type="email" name="email" placeholder="Enter your email address" required
                            aria-required="true" autocomplete="email" value="{{ @old('email', '') }}">
                        @error('email')
                            <p
                                class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-400 text-white font-bold text-center p-1.5 text-sm">
                                {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block mb-2 capitalize font-bold text-gray-500">
                            Password
                            <span class="text-red-400" aria-hidden="true">*</span>
                            <span class="sr-only">(required)</span>
                        </label>
                        <input class="w-full border border-gray-300 focus:border-gray-600 outline-none p-3 rounded-lg"
                            id="password" type="password" name="password" placeholder="Create a strong password" required
                            aria-required="true" minlength="8" autocomplete="new-password">
                        @error('password')
                            <p
                                class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-400 text-white font-bold text-center p-1.5 text-sm">
                                {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block mb-2 capitalize font-bold text-gray-500">
                            Confirm Password
                            <span class="text-red-400" aria-hidden="true">*</span>
                            <span class="sr-only">(required)</span>
                        </label>
                        <input class="w-full border border-gray-300 focus:border-gray-600 outline-none p-3 rounded-lg"
                            id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="Repeat your password" required aria-required="true" minlength="8"
                            autocomplete="new-password">
                        @error('password')
                            <p
                                class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-400 text-white font-bold text-center p-1.5 text-sm">
                                {{ $message }}</p>
                        @enderror
                    </div>
                </fieldset>

                <button
                    class="bg-sky-600 hover:bg-sky-500 transition-colors hover:cursor-pointer p-5 text-center font-bold text-white w-full rounded-lg"
                    type="submit">
                    Create Account
                </button>
            </form>
        </div>
    </div>
@endsection
