@extends('layout.main')
@section('content')

    <section class="mt-10 mx-auto lg:w-2/4">
        <p class="text-sm text-gray-500 uppercase">Posted: {{ $post->created_at->toFormattedDateString() }}</p>
        <h2 class="font-black text-5xl my-5">{{ $post->title }}</h2>
        <p class="text-lg">{{ $post->body }}</p>
    </section>

@endsection
