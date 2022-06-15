@extends('app')

@section('title', $tag->hashtag)

@section('content')
  @include('atoms.nav')
  <div class="tag-hero">
    <div class="z-30 absolute text-white font-semibold text-2xl flex justify-center">
      <h2>{{ $tag->hashtag }}</h2>
      <span class="inline-block ml-6">
        {{ $tag->books->count() }}件
      </span>
    </div>
    <div class="tag-hero-img">
      <img class="" src="/img/balloon.jpeg" alt="">
      <div class="tag-hero-img-bg"></div>
    </div>
  </div>
  <div class="flex max-w-4xl w-full mx-auto px-8 justify-center">
    <div class="md:w-2/5 relative h-screen py-8 pr-8 pr-4">
      <div class="fixed">
        <a href="">

        </a>
      </div>
    </div>
    <div class="md:w-3/5 py-8">
      @foreach ($tag->books as $book)
        @include('books.components.card')
      @endforeach
    </div>

  </div>
@endsection
