@extends('app')

@section('title', $user->name)

@section('content')
  @include('atoms.nav')
  <div class="">
    @include('users.user')
  </div>
  <div class="flex max-w-4xl w-full mx-auto px-8 md:px-0 justify-center">
    <div class="md:w-2/5 relative h-screen py-8 pr-8">
      <div class="bg-white dark:bg-dark-2 rounded-lg p-6">

        {{-- 見出し --}}
        <p class="text-gray text-xs font-semibold mb-4 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span class="pl-2">私について</span>
        </p>

        {{-- 自己紹介 --}}
        <span class="whitespace-pre-line">{{ $user->body }}</span>

        {{-- リンク --}}
        <a class=" mt-4 text-sm leading-2 flex items-center" href="{{ $user->website }}" target="_blank"
          rel="noreferrer noopener">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
          </svg>
          <span class="pl-2 text-primary">{{ $user->website }}</span>
        </a>

      </div>
    </div>
    <div class="md:w-3/5 py-8">
      @include('users.tabs', ['hasArticles' => true, 'hasLikes' => false])
      @foreach ($articles as $article)
        @include('articles.card')
      @endforeach
    </div>
  </div>
@endsection
