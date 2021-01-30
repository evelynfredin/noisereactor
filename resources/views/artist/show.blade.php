@extends('layout.main')
@section('content')

@if(Session::has('status'))
    <div class="bg-green-500 text-gray-50">
        <p class="py-2 px-3">{{Session::get('status')}}</p>
    </div>
@endif

<section class="mt-5">
    <h2 class="text-3xl font-bold mb-5">{{ $artist->name }} <span class="font-normal text-xl ml-3"><a class="hover:text-blue-700" href="{{ $artist->webite }}">{{ $artist->website }}</a></span></h2>
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-2/3 h-auto">
            <img src="{{ URL::asset($artist->pic) }}" alt="{{ $artist->name }}" class="w-full h-full object-cover">
        </div>
        <div class="w-full mt-5 md:mt-0 md:w-1/3 md:ml-10">
            <div >{{ $artist->bio }}</div>
            <div>
                <h3 class="text-xl font-bold mt-3">Genres</h3>
                @foreach ($artist->genres as $genre)
                    <p class="bg-blue-300 inline-block px-3 py-2 rounded-3xl mt-3 mr-2">{{ $genre->genre }}</p>
                @endforeach
            </div>
        </div>
    </div>
</section>

@auth
<div class="inline-block my-5">
    <form action="{{ route('edit.artist', $artist->id) }}" method="get">
        @csrf
        <button class="p-2 bg-green-500 text-gray-50 hover:bg-green-700" type="submit"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
    </form>
</div>
@endauth

@endsection
