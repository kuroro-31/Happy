@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('patials._sub_nav')
  <div class="w-full mx-auto">
    <div class="st-show">
      <img class="st-show-bg-img" src="/img/manga.jpeg" alt="">
      <div class="st-show-bg"></div>
      <div class="st-show-contents">
        <h1 class="st text-6xl text-white">世は漫画の戦国時代。</h1>
      </div>
    </div>
  </div>

  <div class="flex flex-col w-full mx-auto justify-center">
    {{-- <div class="max-w-5xl mx-auto mb-8">
      <h2 class="text-xl font-semibold mb-2">オススメの本</h2>
      <ranking-items></ranking-items>
    </div> --}}
    {{-- <div class="max-w-5xl mx-auto">
      <h2 class="text-xl font-semibold mb-2">ベストセラー</h2>
      <best-seller></best-seller>
    </div> --}}

    <div class="max-w-6xl mx-auto p-8 my-8">
      @include('books.components.tabs')
      <div class="w-full flex flex-wrap justify-start">
        @if (!empty($books))
          @foreach ($books as $book)
            @include('books.components.card')
          @endforeach

          {{ $books->links() }}
        @endif

        @if (!empty($likeRankings))
          @foreach ($likeRankings as $book)
            @include('books.components.card')
          @endforeach
        @endif
      </div>
    </div>
  </div>
@endsection
