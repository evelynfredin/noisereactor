@extends('layout.main')
@section('content')

    <section class="mt-5 bg-gray-100 py-10 px-5 w-full md:px-10 md:w-2/3 md:mx-auto">
        <h3 class="heading--3">Add a Blog Post</h3>

        @if (session('status'))
            <div class="bg-red-600 text-white text-center p-3 mb-5">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('new.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="block" for="title">Post title:</label>
                <input class="input" type="text" name="title" id="title" value="{{ old('title') }}">

                @error('title')
                    <div class="bg-red-600 text-white text-center p-3 mb-5">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div>
                <label class="block" for="excerpt">Post excerpt</label>
                <textarea class="input" name="excerpt" id="excerpt" cols="30" rows="4">{{ old('bio') }}</textarea>

                @error('excerpt')
                    <div class="bg-red-600 text-white text-center p-3 mb-5">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div>
                <label class="block" for="body">Post body:</label>
                <textarea class="input" name="body" id="body" cols="30" rows="10">{{ old('bio') }}</textarea>

                @error('body')
                    <div class="bg-red-600 text-white text-center p-3 mb-5">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button class="btn my-5 bg-blue-500 hover:bg-gray-700" type="submit">Add new post</button>

        </form>

    </section>

@endsection
