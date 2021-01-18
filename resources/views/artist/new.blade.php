@extends('layout.main')
@section('content')

<section class="mt-5 bg-gray-100 py-10 px-5 w-full md:px-10 md:w-2/3 md:mx-auto">
    <h3 class="heading--3">Add a New Artist</h3>

    @if(session('status'))
    <div class="bg-red-600 text-white text-center p-3 mb-5">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('new.artist') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="block" for="name">Artist name:</label>
            <input class="input" type="text" name="name" id="name" value="{{ old('name') }}">

            @error('name')
            <div class="bg-red-600 text-white text-center p-3 mb-5">
                {{ $message }}
            </div>
            @enderror

        </div>

        <div>
            <label class="block" for="bio">Biography</label>
            <textarea class="input" name="bio" id="bio" cols="30" rows="10">{{ old('bio') }}</textarea>

            @error('bio')
            <div class="bg-red-600 text-white text-center p-3 mb-5">
                {{ $message }}
            </div>
            @enderror

        </div>

        <div>
            <label class="block" for="website">Artist website:</label>
            <input class="input" type="url" name="website" id="website" value="{{ old('website') }}">

            @error('bio')
            <div class="bg-red-600 text-white text-center p-3 mb-5">
                {{ $message }}
            </div>
            @enderror

        </div>

        <div>
            <label class="block" for="pic">Artist picture</label>
            <input class="input" type="file" name="pic" id="pic" accept="image/jpeg, image/jpg, image/png">

            @error('pic')
            <div class="bg-red-600 text-white text-center p-3 mb-5">
                {{ $message }}
            </div>
            @enderror

        </div>

        <button class="btn my-5 bg-blue-500 hover:bg-gray-700" type="submit">Add new artist</button>

    </form>

</section>

@endsection
