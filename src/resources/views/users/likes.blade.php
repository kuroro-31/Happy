@extends('app')

@section('title', $user->name . 'のいいねした記事')

@section('content')
  @include('_patials._nav')
  <div class="">
    @include('users._patials.user')
  </div>
  <div class="flex max-w-lg w-full mx-auto px-8 md:px-0 justify-center">
    <div class="py-8 w-full">
      @include('users._patials.tabs', [
          'hasBooks' => false,
          'hasLikes' => true,
          'about' => false,
      ])

      @if ($books->count())
        @foreach ($books as $book)
          @include('books._patials.card')
        @endforeach
      @else
        <div>いいねはありません</div>
      @endif

      {{-- ページネーション --}}
      {{ $books->links() }}
    </div>
  </div>

@endsection
