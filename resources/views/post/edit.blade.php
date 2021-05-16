@extends('layout.main')
@section('content')
    <section class="mt-5 bg-gray-100 py-10 px-5 w-full md:px-10 md:w-2/3 md:mx-auto">
        <form action="{{ route('edit.post', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="flex flex-col">
                <p class="m-3 text-sm font-bold uppercase text-gray-500">Edit the title</p>
                <input class="text-3xl font-bold mb-5 input" type="text" name="title" id="title" value="{{ $post->title }}">
            </div>

            <div class="flex flex-col">
                <p class="m-3 text-sm font-bold uppercase text-gray-500">Edit the excerpt</p>
                <textarea class="input" name="excerpt" id="excerpt" cols="30" rows="4">{{ $post->excerpt }}</textarea>
            </div>

            <div class="flex flex-col">
                <p class="m-3 text-sm font-bold uppercase text-gray-500">Edit the post content</p>
                <textarea class="input" name="body" id="body" cols="30" rows="10">{{ $post->body }}</textarea>
            </div>

            <div class="w-full mt-5 md:mt-0 md:w-1/3 md:ml-10">
                <button class="btn bg-blue-500 hover:bg-gray-700" type="submit">Update post</button>
            </div>
            </div>

        </form>
    </section>

@endsection
