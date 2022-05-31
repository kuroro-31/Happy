@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('atoms.nav')
  <div class="flex max-w-6xl w-full mx-auto px-8 justify-center">
    <div class="md:w-1/5 relative h-screen py-8 pr-4">
      <div class="fixed">
        <a href="">aajjrgiaj

        </a>
      </div>
    </div>
    <div class="md:w-3/5 p-8">
      @foreach ($articles as $article)
        @include('articles.card')
      @endforeach
    </div>
    <div class="md:w-1/5 relative h-screen py-8 pl-4">
      <div class="fixed">
        <a href="">aajjrgiaj

        </a>
      </div>
    </div>
  </div>
  {{-- {{ $articles->links() }} --}}
  {{-- {{ $articles->links('vendor/pagination/tailwind') }} --}}
  {{-- {{ $articles->withQueryString()->links() }} --}}
  {{-- {{ $articles->onEachSide(5)->links() }} --}}
@endsection
