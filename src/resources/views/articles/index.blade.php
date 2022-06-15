@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('atoms.nav')

  {{-- @if (Auth::user())
    <div class="top-hero">
      <div class="z-30 absolute text-white font-semibold text-3xl flex justify-center">
        嬉しかったこと、楽しかったことを共有しよう
      </div>
      <div class="top-hero-img">
        <img class="" src="/img/family.jpeg" alt="">
        <div class="top-hero-img-bg"></div>
      </div>
    </div>
  @else
    <div class="top-authed-hero">
      <div class="text-6xl font-bold mr-24 leading-snug">嬉しいこと<br> 楽しいことを<br> 共有しよう</div>
      <div class="heart"></div>
    </div>
  @endif --}}
  <div class="flex flex-col w-full mx-auto px-8 justify-center">
    <div class="max-w-5xl mx-auto">
      <h2 class="text-xl font-semibold mb-2">オススメの本</h2>
      <ranking-items></ranking-items>
    </div>

    <div class="max-w-5xl mx-auto py-8">
      @include('book.components.tabs')
      {{-- <app-timeline></app-timeline> --}}
      @if (!empty($books))
        @foreach ($books as $book)
          @include('book.components.card')
        @endforeach

        {{ $books->links() }}
      @endif

      @if (!empty($likeRankings))
        @foreach ($likeRankings as $book)
          @include('book.components.card')
        @endforeach
      @endif
    </div>
  </div>
@endsection
