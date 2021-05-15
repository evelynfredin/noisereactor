@extends('layout.main')
@section('content')

    @if (Session::has('status'))
        <div class="bg-green-500 text-gray-50">
            <p class="py-2 px-3">{{ Session::get('status') }}</p>
        </div>
    @endif

    <section>
        <form method="GET" action="#" class="bg-gray-100 rounded-xl md:w-1/2 lg:w-1/3 border-2 border-gray-500">
            <input type="text"
                   name="search"
                   placeholder="Search for albums"
                   class="bg-transparent w-full px-3 py-3 placeholder-gray-500 font-semibold text-sm"
                   value="{{ request('search') }}">
        </form>
    </section>

    <section>
        @if ($albums)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($albums as $album)

                    <div class="album">
                        <a href="{{ route('show.album', $album->id) }}">
                            <div class="flex relative">
                                <div class="album-tr album-info">
                                    <p>{{ $album->artist->name }}</p>
                                    <p class="uppercase font-semibold text-right -mt-2">{{ $album->name }}
                                        <span>
                                            <svg class="w-5 text-current inline-block" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd">
                                                </path>
                                            </svg>
                                        </span>
                                    </p>
                                </div>
                                <div class="cover">
                                    <img src="{{ URL::asset($album->cover) }}" alt="" class="h-full w-full object-cover">
                                </div>
                            </div>
                            <div class="text-right text-xs mt-1">Added {{ $album->created_at->diffForHumans() }}</div>
                        </a>
                    </div>

                @endforeach

            </div>

            <div class="mt-10">
                {{ $albums->links() }}
            </div>

        @else
            <p>There are no albums to show</p>
        @endif

    </section>

@endsection
