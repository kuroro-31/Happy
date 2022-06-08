@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('atoms.nav')

  @if (Auth::user())
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
  @endif
  <div class="flex max-w-4xl w-full mx-auto px-8 justify-center">
    <div class="md:w-2/5 relative h-screen py-8 pr-8 pr-4">
      <div class="fixed">
        <a href="">

        </a>
      </div>
    </div>
    <div class="md:w-3/5 py-8">
      @if ($articles->count())
        @foreach ($articles as $article)
          @include('articles.card')
        @endforeach
      @else
        <div class="">投稿はありません</div>
      @endif

      {{-- ページネーション --}}
      {{ $articles->links() }}
    </div>
  </div>
@endsection
