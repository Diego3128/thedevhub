@extends('layouts.app')

@section('page_title', 'Edit Profile ' . auth()->user()->username)

@section('main_content')
    <a class="inline-block w-fit uppercase mt-6 bg-red-200 hover:bg-red-300 transition-colors hover:cursor-pointer p-5 text-center font-bold text-red-600 rounded-lg"
        href="{{ route('post.index', ['username' => auth()->user()->username]) }}">Cancel</a>

    <div class="mx-auto max-w-xl space-y-7">
        <form method="POST" action="{{ route('profiles.update') }}" enctype="multipart/form-data"
            class="shadow-lg py-7 px-4 md:px-8 md:py-12">
            @csrf
            @method('PUT')

            <fieldset class="border border-gray-300 rounded-xl p-6 shadow-sm space-y-5">
                <legend class="text-lg font-semibold text-gray-700 px-2">Update your profile</legend>
                <div class="mb-2">
                    <label for="username" class="block mb-2 capitalize font-bold text-gray-500">
                        Your Username
                    </label>
                    <input
                        class="capitalize w-full border border-gray-300 focus:border-gray-600 outline-none p-3 rounded-lg @error('username') {{ 'border-red-400' }} @enderror"
                        id="username" type="text" name="username" placeholder="username" autocomplete="username"
                        value="{{ @old('username', auth()->user()->username) }}">
                    @error('username')
                        <p
                            class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-200 text-red-500 font-bold text-center p-1.5 text-sm">
                            {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="image" class="block mb-2 capitalize font-bold text-gray-500">
                        New Profile Picture
                    </label>
                    <input
                        class="capitalize w-full border border-gray-300 hover:border-gray-400 focus:border-gray-600  focus:ring-gray-200 transition-all duration-200 outline-none p-3 rounded-lg shadow-sm cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 @error('image'){{ 'border-red-400 focus:ring-red-200' }} @enderror"
                        id="image" type="file" accept=".jpg, .jpeg, .png" name="image">
                    @error('image')
                        <p
                            class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-200 text-red-500 font-bold text-center p-1.5 text-sm">
                            {{ $message }}</p>
                    @enderror
                </div>
            </fieldset>

            <button
                class="inline-block w-fit uppercase mt-6 bg-sky-600 hover:bg-sky-500 transition-colors hover:cursor-pointer p-5 text-center font-bold text-white rounded-lg"
                type="submit">
                Save
            </button>

        </form>

        <form method="POST" action="{{ route('profiles.update.password') }}" class="shadow-lg py-7 px-4 md:px-8 md:py-12">
            @csrf
            @method('PUT')
            <fieldset class="border border-gray-300 rounded-xl p-6 shadow-sm space-y-5">
                <legend class="text-lg font-semibold text-gray-700 px-2">Update your password</legend>
                <div class="mb-2">
                    <label for="password" class="block mb-2 capitalize font-bold text-gray-500">
                        Your current password
                    </label>
                    <input
                        class="capitalize w-full border border-gray-300 focus:border-gray-600 outline-none p-3 rounded-lg @error('password') {{ 'border-red-400' }} @enderror"
                        id="password" type="password" name="password" placeholder="your password">
                    @error('password')
                        <p
                            class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-200 text-red-500 font-bold text-center p-1.5 text-sm">
                            {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="new_password" class="block mb-2 capitalize font-bold text-gray-500">
                        Your new password
                    </label>
                    <input
                        class="capitalize w-full border border-gray-300 focus:border-gray-600 outline-none p-3 rounded-lg @error('new_password') {{ 'border-red-400' }} @enderror"
                        id="new_password" type="password" name="new_password" placeholder="your new password">
                    @error('new_password')
                        <p
                            class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-200 text-red-500 font-bold text-center p-1.5 text-sm">
                            {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="new_password_confirmation" class="block mb-2 capitalize font-bold text-gray-500">
                        Repeat new password
                    </label>
                    <input
                        class="capitalize w-full border border-gray-300 focus:border-gray-600 outline-none p-3 rounded-lg @error('new_password') {{ 'border-red-400' }} @enderror"
                        id="new_password_confirmation" type="password" name="new_password_confirmation"
                        placeholder="repeat new password">
                    @error('new_password')
                        <p
                            class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-200 text-red-500 font-bold text-center p-1.5 text-sm">
                            {{ $message }}</p>
                    @enderror
                </div>
            </fieldset>

            <button
                class="inline-block w-fit uppercase mt-6 bg-sky-600 hover:bg-sky-500 transition-colors hover:cursor-pointer p-5 text-center font-bold text-white rounded-lg"
                type="submit">
                Save
            </button>

        </form>
    </div>
@endsection
