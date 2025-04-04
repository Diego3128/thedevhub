@extends('layouts.app')

@section('page_title', 'Profile Not Found')

@section('main_content')
    <div class="flex flex-col items-center justify-center h-2/4">
        <p class="text-gray-600 mt-2">The profile <span class="font-bold">{{ $username }}</span> could not be found.</p>
        @auth()
            <a href="{{ route('post.index', ['username' => auth()->user()->username]) }}"
                class="mt-4 text-blue-500 hover:underline">Go back home</a>
        @endauth
    </div>
@endsection
