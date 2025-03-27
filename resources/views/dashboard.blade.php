@extends('layouts.app')

@section('page_title', 'your account')

@section('main_content')
    <div class="flex justify-center">
        <div class="w-full border border-amber-400 md:w-8/12 flex flex-col md:flex-row gap-5 md:gap-8 md:justify-between ">
            <div class="border border-red-300 px-5 ">
                <img src="{{ asset('img/account/usuario.svg') }}" alt="user profile picture">
            </div>
            <div class="border border-red-300 px-5 ">
                <p>{{ Auth::user()->username }}</p>
            </div>
        </div>
    </div>
    <p>Hi {{ Auth::user()->name }}</p>
@endsection
