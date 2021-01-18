@extends('layout.main')
@section('content')

<section class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 mt-5">
    @foreach ($artists as $artist)
    <div class="hover:shadow-lg hover:bg-white transition-shadow ease-in-out duration-500">
        <img class="w-full h-36 object-cover object-center" src="{{ $artist->pic }}" alt="">
        <h4 class="uppercase text-blue-500 my-2 text-lg text-center font-semibold">{{ $artist->name }}</h4>
    </div>
    @endforeach
</section>

@endsection
