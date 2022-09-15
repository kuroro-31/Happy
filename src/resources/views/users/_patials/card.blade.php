<div class="list-item">
    <a href="{{ route('book.show', ['book' => $book->code]) }}">
        @empty($book->thumbnail)
            <img src="{{ asset('/img/bg.svg') }}" alt="" class="h-[200px] w-[200px] object-cover flex-shrink-0">
        @else
            <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt="thumbnail"
                class="w-[200px] h-[200px] object-cover flex-shrink-0">
        @endempty
        <span class="thumbnail-title">{{ $book->title }}</span>
    </a>

    <div class="flex items-center">
        {{-- お気に入り --}}
        {{-- <div class="w-full flex items-center">
            <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($book->count_likes)' :authorized='@json(Auth::check())'
                endpoint="{{ route('book.like', ['book' => $book]) }}">
            </book-like>
        </div> --}}
        {{-- 再生数 --}}
        {{-- @empty(!$book) --}}
        <div class="w-full flex items-center justify-between">
            <div class="flex items-center">
                <span class="text-666">1,322,200</span>
                <span class=" text-aaa pl-2 whitespace-nowrap">回再生</span>
            </div>
        </div>
        {{-- @endempty --}}
    </div>
</div>
