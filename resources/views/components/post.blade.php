@props(['post' => $post])

<div class="bg-white rounded-lg shadow-md flex flex-col justify-between">
    <a href="{{ route('show.post', $post->slug) }}">
        <div class=" p-5">
            <p class="text-gray-500 uppercase text-xs mb-3 ">Posted: {{ $post->created_at->diffForHumans() }}</p>
            <h2 class="text-3xl font-black hover:text-blue-700 mb-5">{{ $post->title }}</h2>
            <p>
                {{ $post->excerpt }}
            </p>
        </div>
        <div class="flex justify-end items-end">
            <a class="self-end flex bg-blue-400 text-white p-2 rounded-br-lg hover:bg-blue-500" href="{{ route('show.post', $post->slug) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </a>
</div>
