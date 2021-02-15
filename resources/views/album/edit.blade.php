@extends('layout.main')
@section('content')

<form action="{{ route('edit.album', $album) }}" method="POST" class="album-container" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="rounded-lg w-80">
        <img src="{{ URL::asset( $album->cover )}}" alt="{{ $album->name }}" class="rounded-lg shadow-lg">
        <input class="input mt-2" type="file" name="cover" id="cover" accept="image/jpeg, image/jpg, image/png">
        <label for="released_at">Release date:</label>
        <input class="input" type="date" name="released_at" id="released_at" value="{{ $album->released_at }}">
        <label for="edition">Album edition:</label>
        <input class="input" type="text" name="edition" id="edition" value="{{ $album->edition }}">
    <button class="btn bg-blue-500 hover:bg-gray-700" type="submit">Update album</button>

    </div>
    <div class="album-container--info">
        <input class="text-xl md:text-3xl font-bold uppercase text-blue-500 mb-3 input" type="text" name="name" id="name" value="{{ $album->name }}">
        <div><textarea class="block border-t pt-3 text-lg input" name="description" id="description" cols="30" rows="10">{{ $album->description }}</textarea></div>
        <div><textarea class="block border-t pt-3 text-lg input" name="review" id="review" cols="30" rows="10">{{ $album->review }}</textarea></div>
    </div>
</form>

        @error('name')
        <div class="bg-red-600 text-white text-center p-3 mb-5">
            {{ $message }}
        </div>
        @enderror

        @error('cover')
        <div class="bg-red-600 text-white text-center p-3 mb-5">
            {{ $message }}
        </div>
        @enderror

        @error('description')
        <div class="bg-red-600 text-white text-center p-3 mb-5">
            {{ $message }}
        </div>
        @enderror

        @error('review')
        <div class="bg-red-600 text-white text-center p-3 mb-5">
            {{ $message }}
        </div>
        @enderror

        @error('edition')
        <div class="bg-red-600 text-white text-center p-3 mb-5">
            {{ $message }}
        </div>
        @enderror

        @error('released_at')
        <div class="bg-red-600 text-white text-center p-3 mb-5">
            {{ $message }}
        </div>
        @enderror

@endsection
