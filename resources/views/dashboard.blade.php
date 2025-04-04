@extends('layouts.app')

@if (Auth::user()->id === $user->id)
    @section('page_title', __('profile.page_title', ['username' => Auth::user()->username]))
@else
    @section('page_title', '@' . $user->name)
@endif


@section('main_content')
    <div class="flex justify-center">
        <div class="w-full max-w-3xl border border-amber-400 flex flex-col xs:flex-row gap-5 md:gap-8 xs:justify-around  ">
            <div class="border border-red-300 px-5 ">
                <img class="w-36 md:w-48 mx-auto md:mx-0" src="{{ asset('img/account/usuario.svg') }}"
                    alt="user profile picture">
            </div>
            <div class="border border-red-300 max-w-96 mx-auto xs:mx-0">
                <p class="text-gray-700 text-xl xs:mb-3.5">{{ $user->username }}</p>

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
                        <span class="font-bold">{{ 0 }}</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
