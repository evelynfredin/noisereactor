@extends('layout.main')
@section('content')

    @if ($albums->count())

        <h2 class="text-blue-600 uppercase text-xl font-bold mt-5">Latest Additions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($albums as $album)
                <x-album :album="$album" />
            @endforeach

        </div>

    @else {{ 'Nothing to show' }}
    @endif

    <div class="flex flex-col lg:flex-row mt-20 justify-between">
        <div class="w-full lg:w-2/3 lg:mr-6 rounded-lg grid grid-cols-1 md:grid-cols-2 gap-6">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
            @else
                <p>No blog posts</p>
            @endif

        </div>
        <div class="mt-5 lg:mt-0 w-full lg:w-1/3">
            @if ($annivRelease->count())
                <div class="p-3 pb-8 border rounded-lg">
                    <h3 class="album-h3">Release Anniversary</h3>
                    <ul class="album-ulist px-3">
                        @foreach ($annivRelease as $album)
                            <div class="border-b">
                                <a href="/album/{{ $album->id }}">
                                    <li class="album-list">
                                        <img class="w-6 h-6 rounded-full mr-2"
                                             src="{{ URL::asset($album->cover) }}"
                                             alt="{{ $album->name }} cover art">{{ $album->name }}
                                    </li>
                                </a>
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection
