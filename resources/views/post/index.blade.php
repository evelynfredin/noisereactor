@extends('layout.main')
@section('content')

    <h1>Blog</h1>

    <div class="w-full lg:mr-4 rounded-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-10 gap-6">
        @if ($posts->count())
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach

        @else
            <p>Nothing To Show</p>
        @endif
    </div>
@endsection
