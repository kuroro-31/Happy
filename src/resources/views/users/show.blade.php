@extends('app')

@section('title', $user->name)

@section('content')
  @include('patials._nav')
  <div class="">
    @include('users.components.user')
  </div>
  <div class="flex max-w-5xl w-full mx-auto px-8 md:px-0 justify-center">

    <div class="w-full md:w-1/5 mb-4">
      @include('users.components.tabs', [
          'hasBooks' => true,
          'hasLikes' => false,
          'about' => false,
      ])
    </div>
    <div class="w-full md:w-4/5 rounded-lg md:ml-8 bg-white dark:bg-dark-1 p-6 flex flex-wrap justify-start">
      @if ($books->count())
        @foreach ($books as $book)
          @include('books.components.card')
        @endforeach
      @else
        <div>投稿はありません</div>
      @endif

      {{-- ページネーション --}}
      {{ $books->links() }}
    </div>
  </div>
@endsection
