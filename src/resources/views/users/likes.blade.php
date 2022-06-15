@extends('app')

@section('title', $user->name . 'のいいねした記事')

@section('content')
  @include('atoms.nav')
  <div class="">
    @include('users.components.user')
  </div>
  <div class="flex max-w-lg w-full mx-auto px-8 md:px-0 justify-center">
    <div class="py-8 w-full">
      @include('users.components.tabs', [
          'hasBooks' => false,
          'hasLikes' => true,
          'about' => false,
      ])

      @if ($books->count())
        @foreach ($books as $book)
          @include('book.components.card')
        @endforeach
      @else
        <div>いいねはありません</div>
      @endif

      {{-- ページネーション --}}
      {{ $books->links() }}
    </div>
  </div>

@endsection
