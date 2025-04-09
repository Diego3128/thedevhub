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

                <div class="p-4 bg-white">
                    <div class="flex justify-between items-center mb-2">
                        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                        <p class="font-semibold text-gray-700">{{ $post->user->username }}</p>
                    </div>
                    <p class="text-gray-800 text-sm">{{ $post->description }}</p>
                    <div class="mt-2 text-sm text-gray-600">
                        0 likes
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
