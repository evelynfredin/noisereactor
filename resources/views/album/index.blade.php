@extends('layout.main')
@section('content')

@if(Session::has('status'))
    <div class="bg-green-500 text-gray-50">
        <p class="py-2 px-3">{{Session::get('status')}}</p>
    </div>
@endif

<section>

    @if($albums)

<h2 class="text-blue-600 uppercase text-xl font-bold mt-5">Latest Additions</h2>
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-5">

    @foreach ($albums as $album)

    <div class="border rounded-lg bg-white">
        <div>
            <img src="{{ URL::asset($album->cover)}}" alt="{{ $album->name }}" class="object-cover object-center rounded-lg shadow-md">
        </div>
        <h3 class="px-3 pt-3">{{ $album->artist->name }}</h3>
        <p class="px-3 uppercase font-semibold pb-3">{{ $album->name }}</p>
    </div>

    @endforeach

</div>

@else {{'Nothing to show'}}
@endif

</section>

@endsection
