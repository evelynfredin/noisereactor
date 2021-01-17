@extends('layout.main')
@section('content')

<section class="grid md:grid-cols-3 lg:grid-cols-5 md:gap-5 mt-5">
    @foreach ($artists as $artist)
    <div>
        <img src="{{ $artist->pic }}" alt="">
        <h4 class="uppercase text-blue-500 mt-2 text-lg text-center font-semibold">{{ $artist->name }}</h4>
    </div>
    @endforeach
</section>

@endsection
