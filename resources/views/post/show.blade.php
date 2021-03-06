@extends('layout.main')
@section('content')

    <x-status />

    <section class="mt-10 mx-auto lg:w-2/4">
        <p class="text-sm text-gray-500 uppercase">Posted: {{ $post->created_at->toFormattedDateString() }}</p>
        <h2 class="font-black text-5xl my-5">{{ $post->title }}</h2>
        <p class="text-lg">@markdown($post->body)</p>
    </section>


    @auth
        <!-- Edit / Delete Start -->
        <div class="my-5 lg:max-w-5xl mx-auto flex">
            <form action="{{ route('edit.post', $post) }}" method="get">
                @csrf
                <button class="p-2 bg-green-500 text-gray-50 hover:bg-green-700" type="submit">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </button>
            </form>
            <div x-data="{ isOpen: false }">
                <button
                        class="ml-3 p-2 bg-red-500 text-gray-50 hover:bg-red-700"
                        @click="isOpen = true
                                                                                                                                                                            $nextTick(() => $refs.modalCloseButton.focus())">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>

                <div
                     style="background-color: rgba(0, 0, 0, .5)"
                     class="mx-auto absolute top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                     x-show="isOpen"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-out duration-100"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0">
                    <div class="w-auto mx-auto rounded p-4 mt-2 overflow-y-auto">
                        <div class="bg-white rounded px-8 py-8">
                            <h1 class="font-bold text-xl mb-3">Are you sure?</h1>
                            <div class="mt-4 flex">
                                <button
                                        class="bg-green-600 text-white px-4 py-3 mt-4 text-sm rounded mr-1"
                                        @click="isOpen = false"
                                        x-ref="modalCloseButton">
                                    Cancel
                                </button>

                                <form action="{{ route('destroy.post', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white px-4 py-3 mt-4 text-sm rounded ml-1" type="submit">Delete</button>
                                </form>
                            </div> <!-- Wrapper For Buttons Inside Modal End -->
                        </div>
                    </div> <!-- Modal Window Content End -->
                </div> <!-- Modal Window End -->
            </div> <!-- Delete Button End -->
        </div> <!-- Edit/Delete End -->
    @endauth


@endsection
