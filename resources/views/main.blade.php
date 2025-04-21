@extends('layouts.app')

@section('page_title', 'Posts')

@section('main_content')
    <x-post-list :posts="$posts" />
@endsection
