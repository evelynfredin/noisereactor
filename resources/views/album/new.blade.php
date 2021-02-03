@extends('layout.main')
@section('content')

<section class="mt-5 bg-gray-100 py-10 px-5 w-full md:px-10 md:w-2/3 md:mx-auto">
    <h3 class="heading--3">Add a New Album</h3>

    <form action="{{ route('new.album') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="block" for="name">Album name:</label>
            <input class="input" type="text" name="name" id="name" value="{{ old('name') }}">

            @error('name')
            <div class="bg-red-600 text-white text-center p-3 mb-5">
                {{ $message }}
            </div>
            @enderror
        </div> <!-- END INPUT -->

        <div>
            <label class="block" for="edition">Album edition:</label>
            <input class="input" type="text" name="edition" id="edition" value="{{ old('edition') }}">

            @error('edition')
            <div class="bg-red-600 text-white text-center p-3 mb-5">
                {{ $message }}
            </div>
            @enderror
        </div> <!-- END INPUT -->

        <div>
            <label class="block" for="description">Description</label>
            <textarea class="input" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>

            @error('description')
            <div class="bg-red-600 text-white text-center p-3 mb-5">
                {{ $message }}
            </div>
            @enderror
        </div> <!-- END INPUT -->

        <div>
            <label class="block" for="artist_id">Choose artist:</label>
            <select class="input" id="artist_id" name="artist_id">
                @foreach ($artists as $artist)
                    <option value="{{ $artist->id }}">{{ $artist->name  }}</option>
                @endforeach
            </select>

            @error('artist_id')
            <div class="bg-red-600 text-white text-center p-3 mb-5">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button class="btn my-5 bg-blue-500 hover:bg-gray-700" type="submit">Add new album</button>

    </form>

</section>

@endsection
