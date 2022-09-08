<div class="mr-auto mb-4">
    <a href="{{ route('book.show', ['book' => $book->code]) }}">
        @empty($book->thumbnail)
            <img src="{{ asset('/img/bg.svg') }}" alt="" class="h-[200px] w-[200px] object-cover flex-shrink-0">
        @else
            <img src="/img/{{ $book->thumbnail }}" alt="thumbnail" class="thumbnail">
        @endempty
        <span class="thumbnail-title">{{ $book->title }}</span>
    </a>

    <div class="card-body pt-0 pb-2 pl-3">
        <div class="card-text">
            <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($book->count_likes)' :authorized='@json(Auth::check())'
                endpoint="{{ route('book.like', ['book' => $book]) }}">
            </book-like>
        </div>
    </div>
</div>
