@extends('layouts.app')

@auth()
    @if (Auth::user()->id === $user->id)
        @section('page_title', __('profile.page_title', ['username' => Auth::user()->username]))
    @else
    @section('page_title', '@' . $user->name)
@endif
@endauth

@guest
@section('page_title', '@' . $user->name)
@endguest


@section('main_content')
<div class="flex justify-center mb-10 pb-10">
    <div class="w-full max-w-3xl border border-amber-400 flex flex-col xs:flex-row gap-5 md:gap-8 xs:justify-around  ">
        <div class="border border-red-300 px-5 ">
            <img draggable="false" class="w-36 md:w-48 mx-auto md:mx-0 rounded-full"
                src="{{ route('user.profile.image', ['user' => $user->username]) }}" alt="user profile picture">
        </div>
        <div class="border border-red-300 max-w-96 mx-auto xs:mx-0">
            <div class="flex items-center gap-2.5 xs:mb-3.5">
                @auth
                    @if (Auth::user()->id === $user->id)
                        <a href="{{ route('profiles.edit') }}" class="hover:bg-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                    @endif
                @endauth
                <p class="text-gray-700 text-xl">{{ $user->username }}</p>
            </div>

            <div class="flex flex-col xs:flex-row xs:flex-wrap xs:justify-center gap-2 xs:gap-3">
                <p class="flex justify-between items-center gap-1.5 md:gap-4 text-gray-800 text-sm">
                    <span class="font-normal capitalize">{{ __('profile.followed') }}</span>
                    <span class="font-bold">{{ 0 }}</span>
                </p>

                <p class="flex justify-between items-center gap-1.5 md:gap-4 text-gray-800 text-sm">
                    <span class="font-normal capitalize">{{ __('profile.following') }}</span>
                    <span class="font-bold">{{ 0 }}</span>
                </p>

                <p class="flex justify-between items-center gap-1.5 md:gap-4 text-gray-800 text-sm">
                    <span class="font-normal capitalize">{{ __('profile.posts') }}</span>
                    <span class="font-bold">{{ $user->posts->count() }}</span>
                </p>
            </div>

        </div>
    </div>
</div>


<section class="border-t-2 border-gray-300 py-10">
    <div class="max-w-6xl mx-auto">
        <h2 class="font-bold text-center capitalize text-3xl md:text-4xl text-gray-800 mb-12">
            Posts
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-5 mb-5">
            @forelse ($posts as $post)
                <a href="{{ route('posts.show', ['user' => $user->username, 'post' => $post->id]) }}"
                    class="block group">
                    <img src='{{ asset("storage/uploads/$post->image_path") }}' alt="Post image {{ $post->title }}"
                        class="w-full h-40 xs:h-48 object-cover rounded-sm shadow-md transition-opacity duration-300 group-hover:opacity-70">
                </a>
            @empty
                <p class="text-center text-gray-600 col-span-full text-lg">
                    No posts available
                </p>
            @endforelse
        </div>
        <div>{{ $posts->links('vendor.pagination.tailwind') }}</div>
    </div>
</section>

@endsection
