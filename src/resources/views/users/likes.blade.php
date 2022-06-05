@extends('app')

@section('title', $user->name . 'のいいねした記事')

@section('content')
  @include('atoms.nav')
  <div class="">
    @include('users.user')
  </div>
  <div class="flex max-w-4xl w-full mx-auto px-8 justify-center">
    <div class="md:w-1/4 relative h-screen py-8 pr-4">
      <div class="sticky">
        <a href="">aajjrgiaj
        </a>
      </div>
    </div>
    <div class="md:w-3/4 p-8">
      @include('users.tabs', ['hasArticles' => false, 'hasLikes' => true])
      @foreach ($articles as $article)
        @include('articles.card')
      @endforeach
    </div>
  </div>

@endsection
