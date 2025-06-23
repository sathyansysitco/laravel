@extends('layouts.app')

@section('content')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>

    @foreach($post->images ?? [] as $image)
        <img src="{{ asset('uploads/' . $image) }}" width="150" class="mb-2 me-2">
    @endforeach

    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
