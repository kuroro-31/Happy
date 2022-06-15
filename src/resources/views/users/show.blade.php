@extends('app')

@section('title', $user->name)

@section('content')
  @include('atoms.nav')
  <div class="">
    @include('users.components.user')
  </div>
  <div class="flex max-w-lg w-full mx-auto px-8 md:px-0 justify-center">
    <div class="py-8 w-full">
      @include('users.components.tabs', [
          'hasBooks' => true,
          'hasLikes' => false,
          'about' => false,
      ])

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
