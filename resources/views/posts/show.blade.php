@extends('layouts.app')

@section('page_title', $post->title)

@section('main_content')

    <div
        class="flex flex-col md:flex-row bg-white shadow-md rounded-xl overflow-hidden py-3 lg:max-w-5xl 2xl:max-w-6xl mx-auto">
        {{-- Left Side (Post Content) --}}
        <div class="md:flex-6/12 p-4 ">
            <div class="relative group rounded-md overflow-hidden border border-gray-200 shadow-sm">
                <img draggable="false" class="w-full h-auto object-cover transition-opacity duration-300"
                    src="{{ asset('storage/uploads/' . $post->image_path) }}" alt="Image for {{ $post->title }}">
                @auth
                    @can('delete', $post)
                        <form method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button
                                class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-red-500 text-white text-xs px-3 py-1 rounded-lg shadow hover:bg-red-600"
                                type="submit" title="Delete Post">
                                Delete
                            </button>
                        </form>
                    @endcan
                @endauth

                <div class="px-4 py-2 bg-white">
                    <div class="flex justify-between items-center mb-2">
                        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                        <p class="font-semibold text-gray-700">{{ $post->user->username }}</p>
                    </div>
                    <p class="text-gray-800 text-sm">{{ $post->description }}</p>
                    <div class="mt-2 text-sm text-gray-600 border border-red-500 flex gap-1.5 items-center">
                        @auth
                            @if ($post->checkLike(auth()->user()))
                                {{-- dislike post --}}
                                <form class="flex items-center"
                                    action="{{ route('posts.like.destroy', ['post' => $post->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hover:cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="red" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                    </button>
                                </form>
                            @else
                                {{-- like post --}}
                                <form class="flex items-center" action="{{ route('posts.like.store', ['post' => $post->id]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="hover:cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                    </button>
                                </form>
                            @endif

                        @endauth

                        <p class="font-bold text-gray-600">{{ $post->likes()->count() }} likes</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Right Side (Comments) --}}
        <div class="md:w-5/12 bg-white md:border-l-2 md:border-gray-200 px-4 md:py-6 ">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Comments</h3>
            @include('posts._partials.comments')
            @auth()
                <form method="POST" action="{{ route('comment.store', ['user' => $user->username, 'post' => $post->id]) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">
                            Add a comment
                        </label>
                        <input id="comment" name="comment" type="text" placeholder="Write something..." maxlength="255"
                            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-sky-600 focus:outline-none transition @error('comment') border-red-400 @enderror">
                        @error('comment')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-fit px-2 bg-sky-600 hover:bg-sky-500 text-white font-bold py-3 rounded-md uppercase tracking-wide transition-colors mb-3 md:mb-0">
                        Comment
                    </button>
                </form>
            @endauth
        </div>
    </div>
@endsection
