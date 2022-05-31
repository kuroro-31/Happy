@extends('app')

@section('title', $user->name)

@section('content')
  @include('atoms.nav')
  <div class="">
    @include('users.user')
  </div>
  <div class="flex max-w-6xl w-full mx-auto px-8 justify-center">
    <div class="md:w-1/5 relative h-screen py-8 pr-4">
      <div class="sticky">
        <a href="">aajjrgiaj
        </a>
      </div>
    </div>
    <div class="md:w-3/5 p-8">
      @include('users.tabs', ['hasArticles' => true, 'hasLikes' => false])
      @foreach ($articles as $article)
        @include('articles.card')
      @endforeach
    </div>
    <div class="md:w-1/5 relative h-screen py-8 pl-4">
      <div class="sticky">
        <a href="">aajjrgiaj
        </a>
      </div>
    </div>
  </div>

@endsection
