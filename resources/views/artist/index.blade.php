@extends('layout.main')
@section('content')

@if(Session::has('status'))
    <div class="bg-green-500 text-gray-50">
        <p class="py-2 px-3">{{Session::get('status')}}</p>
    </div>
@endif

<section class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-5">
    @foreach ($artists as $artist)
    <div class="bg-white rounded overflow-hidden shadow-sm border relative hover:shadow-lg">
        <a href="{{ route('show.artist', $artist->slug) }}">
            <img src="{{ $artist->pic }}" alt="{{ $artist->name }}" class="w-full h-full sm:h-52 object-cover">
            <div class="bg-white text-secondary-200 rounded-full py-1 px-2 absolute bottom-0 right-0 m-2 mt-2">
                <span class="text-md">{{ $artist->name}}</span>
            </div>
            <div class="bg-white text-secondary-200 text-xs font-bold rounded-full py-1 px-2 absolute top-0 m-2 mt-2">
                <svg class="w-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                <span>2 albums</span>
            </div>
        </a>
    </div>
    @endforeach
</section>

@endsection
