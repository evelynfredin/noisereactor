@extends('layout.main')
@section('content')
<section class="mt-5">
    <form action="{{ route('edit.artist', $artist) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="flex">
            <input class="text-3xl font-bold mb-5 input" type="text" name="name" id="name" value="{{ $artist->name }}">
            <input class="font-normal text-xl ml-3 input" type="url" name="website" id=website"" value="{{ $artist->website }}">
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-2/3 h-auto">
                <img src="{{ URL::asset($artist->pic) }}" alt="{{ $artist->name }}" class="w-full h-full object-cover">
                <input class="input mt-2" type="file" name="pic" id="pic" accept="image/jpeg, image/jpg, image/png">
            </div>
            <div class="w-full mt-5 md:mt-0 md:w-1/3 md:ml-10">
                <div><textarea class="input" name="bio" id="bio" cols="30" rows="10">{{ $artist->bio }}</textarea></div>
                <input class="font-normal input" type="text" name="slug" id=slug"" value="{{ $artist->slug }}">
                <button class="btn bg-blue-500 hover:bg-gray-700" type="submit">Update {{ $artist->name }}</button>
            </div>
        </div>

    </form>
</section>

@endsection
