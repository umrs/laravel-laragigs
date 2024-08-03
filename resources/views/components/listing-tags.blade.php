@props(['tags'])

<ul class="flex">
    @foreach(explode(',', $tags) as $tag)
        <li
                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
        >
            <a href="{{ route('listings.index', ['tag' => $tag]) }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>