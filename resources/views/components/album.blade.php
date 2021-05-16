@props(['album' => $album])

<div class="album">
    <a href="{{ route('show.album', $album->id) }}">
        <div class="flex relative">
            <div class="album-tr album-info">
                <p>{{ $album->artist->name }}</p>
                <p class="uppercase font-semibold text-right -mt-2">{{ $album->name }}
                    <span>
                        <svg class="w-5 text-current inline-block" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd">
                            </path>
                        </svg>
                    </span>
                </p>
            </div>
            <div class="cover">
                <img src="{{ URL::asset($album->cover) }}" alt="Album cover for {{ $album->name }}" class="h-full w-full object-cover">
            </div>
        </div>
        <div class="text-right text-xs mt-1">Added {{ $album->created_at->diffForHumans() }}</div>
    </a>
</div>
