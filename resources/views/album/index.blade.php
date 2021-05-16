@extends('layout.main')
@section('content')

    <x-status />

    <x-search />

    <section>
        @if ($albums)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($albums as $album)
                    <x-album :album="$album" />
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
