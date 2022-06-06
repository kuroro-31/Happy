@extends('app')

@section('title', $tag->hashtag)

@section('content')
  @include('atoms.nav')
  <div class="tag-hero">
    <div class="z-30 absolute text-white font-semibold text-2xl flex justify-center">
      <h2>{{ $tag->hashtag }}</h2>
      <span class="inline-block ml-6">
        {{ $tag->articles->count() }}件
      </span>
    </div>
    <div class="tag-hero-img">
      <img class="" src="/img/balloon.jpeg" alt="">
      <div class="tag-hero-img-bg"></div>
    </div>
  </div>
  <div class="flex max-w-4xl w-full mx-auto px-8 justify-center">
    <div class="md:w-1/4 relative h-screen py-8 pr-4">
      <div class="fixed">
        <a href="">

        </a>
      </div>
    </div>
    <div class="md:w-3/4 py-8 pl-8">
      @foreach ($tag->articles->sortByDesc('created_at') as $article)
        @include('articles.card')
      @endforeach
    </div>

  </div>
@endsection
