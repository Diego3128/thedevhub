@extends('layouts.app')

@section('page_title', 'Create a post')

@section('main_content')
    <div class="md:flex md:gap-4 max-w-5xl mx-auto">
        <div class="mb-5 md:mb-0 md:basis-2/5 border border-red-400 p-2 flex flex-col justify-center gap-3">
            <form action="{{ route('image.store') }}" method="post" class="dropzone w-full  mx-auto " id="dropzone-form"
                enctype="multipart/form-data">
                @csrf
            </form>
        </div>
        <div class="md:basis-3/5 border border-red-400 p-8">
            <form class="mx-auto shadow-2xl rounded-lg py-5 px-3.5 md:py-6 md:px-5" action="{{ route('posts.store') }}"
                method="post" novalidate>
                @csrf
                <fieldset>
                    <legend class="sr-only">create a new post</legend>

                    <div class="mb-2">
                        <label for="title" class="block mb-2 capitalize font-bold text-gray-500">
                            title
                            <span class="text-red-400" aria-hidden="true">*</span>
                            <span class="sr-only">(required)</span>
                        </label>
                        <input
                            class="capitalize w-full border border-gray-300 focus:border-gray-600 outline-none p-3 rounded-lg @error('title') {{ 'border-red-400' }} @enderror"
                            id="title" type="text" name="title" placeholder="post title" required
                            aria-required="true" autocomplete="title" value="{{ @old('title', '') }}">
                        @error('title')
                            <p
                                class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-200 text-red-500 font-bold text-center p-1.5 text-sm">
                                {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="body" class="block mb-2 capitalize font-bold text-gray-500">
                            content
                        </label>
                        <textarea placeholder="Description"
                            class="@error('body') {{ 'border-red-400' }} @enderror w-full min-h-20 max-h-40 border border-gray-300 focus:border-gray-600 outline-none p-3 rounded-lg"
                            name="body" id="body" maxlength="255">{{ @old('body', '') }}</textarea>
                        @error('body')
                            <p
                                class="relative -top-1 rounded-bl-lg rounded-br-lg bg-red-200 text-red-500 font-bold text-center p-1.5 text-sm">
                                {{ $message }}</p>
                        @enderror
                    </div>

                    <input id="image" type="hidden" name="image" value="{{ @old('image', '') }}">
                    @error('image')
                        <p class="rounded-lg bg-red-200 text-red-500 font-bold text-center p-1.5 text-sm">
                            {{ $message }}</p>
                    @enderror
                </fieldset>

                <button
                    class="uppercase mt-6 bg-sky-600 hover:bg-sky-500 transition-colors hover:cursor-pointer p-5 text-center font-bold text-white w-full rounded-lg"
                    type="submit">
                    Post
                </button>
            </form>
        </div>
    </div>
@endsection
