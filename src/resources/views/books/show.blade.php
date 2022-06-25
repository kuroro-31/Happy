@extends('app')

@section('title', $book->title)

@section('content')
  @include('atoms.nav')
  <div class="w-full mx-auto">
    <div class="book-show">
      <img class="book-show-bg-img" src="/img/thumbnail.jpeg" alt="">
      <div class="book-show-bg"></div>
      <div class="book-show-contents">
        @empty($book->thumbnail)
          <img src="/img/thumbnail.jpeg" alt="thumbnail" class="">
        @else
          <img src="{{ asset('/img/avatar.jpeg') }}" alt=""
            class="rounded-full h-10 w-10 object-cover mr-3 shadow-lg border border-emerald-50">
        @endempty

        <div class="flex flex-col max-w-lg ml-16">
          <p class="w-full flex flex-wrap text-4xl whitespace-pre-line text-white font-semibold">{{ $book->title }}</p>
          <a href="{{ route('users.show', ['username' => $book->user->username]) }}" class="flex items-center my-4">
            <span class="text-xl text-white">{{ $book->user->name }}</span>
          </a>

          <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
            :initial-count-likes='@json($book->count_likes)' :authorized='@json(Auth::check())'
            endpoint="{{ route('book.like', ['book' => $book]) }}" :big='true' class="text-white">
          </book-like>

          <div class="my-8 flex">
            <a href="/books/{{ $book->id }}/chapters/1"
              class="hover:text-primary bg-white dark:bg-dark-2 rounded px-6 py-2 cursor-pointer font-semibold mr-3">1話へ
            </a>
            <p class="hover:text-primary bg-white dark:bg-dark-2 rounded px-6 py-2 cursor-pointer font-semibold">最新話へ</p>
          </div>
          @if ($book->tags)
            @foreach ($book->tags as $tag)
              @if ($loop->first)
                <div class="">
                  <div class="">
              @endif
              <a href="{{ route('tags.show', ['name' => $tag->name]) }}"
                class="inline-block text-xs btn-border p-1.5 px-2 m-1">
                {{ $tag->hashtag }}
              </a>
              @if ($loop->last)
        </div>
      </div>
      @endif
      @endforeach
      @endif
    </div>

  </div>
  </div>
  </div>



  <div class="card-body">
    {!! nl2br(e(Markdown::parse($book->body))) !!}
  </div>


  <div class="mb-32">
    @if (!empty($chapters))
      <div class="max-w-md mx-auto flex flex-col items-center">
        @if (Auth::id() === $book->user_id)
          <chapter-list :book='@json($book)' :chapters='@json($chapters)'></chapter-list>
        @endif
        <div style="max-height: 600px" class="w-full overflow-y-auto">
          @foreach ($chapters as $chapter)
            <a href="{{ route('book.chapter.show', ['book' => $book, 'chapter' => $chapter]) }}"
              class="cursor-pointer hover:text-primary shadow mb-2 p-4 rounded-lg bg-white flex items-center w-full">
              <div class="flex items-center mr-4">
                <span class="">{{ $chapter->id }}</span>
                <span>話</span>
              </div>
              <span class="truncate font-semibold">{{ $chapter->name }}</span>
            </a>
          @endforeach
        </div>
      </div>
    @endif
  </div>
@endsection
