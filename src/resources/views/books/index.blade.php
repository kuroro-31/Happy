@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('patials._sub_nav')
  <div class="w-full mx-auto">
    <div class="st-show">
      <img class="st-show-bg-img" src="/img/manga.jpeg" alt="">
      <div class="st-show-bg"></div>
      <div class="st-show-contents">
        <h1 class="st text-6xl text-white">世はまさに漫画時代。</h1>
      </div>
    </div>
  </div>

  <div class="flex w-full mx-auto justify-center">
    <div class="container flex flex-col md:flex-row mx-auto p-4 lg:p-8 my-8">
      <div class="w-full md:w-1/5 mb-4">
        @include('books.components.tabs')
      </div>

      <div class="w-full md:w-4/5 rounded-lg md:ml-8">
        <div class="w-full rounded-lg bg-white dark:bg-dark-1 p-6 flex flex-wrap justify-start">
          @if (!empty($books))
            @foreach ($books as $book)
              <div class="px-0 pb-4 md:p-4 mx-auto">
                <a href="{{ route('book.show', ['book' => $book]) }}">
                  <img src="https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg" alt="thumbnail"
                    class="thumbnail">
                  <span class="thumbnail-title">{{ $book->title }}</span>
                </a>

                <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                  :initial-count-likes='@json($book->count_likes)' :authorized='@json(Auth::check())'
                  endpoint="{{ route('book.like', ['book' => $book]) }}">
                </book-like>
              </div>
            @endforeach
          @endif
        </div>

        <div class="w-full flex justify-center mt-8">{{ $books->links() }}</div>
      </div>
    </div>
  </div>
@endsection
