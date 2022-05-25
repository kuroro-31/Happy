@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('atoms.nav')
  <div>
    @foreach ($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
  {{-- {{ $articles->links() }} --}}
  {{-- {{ $articles->links('vendor/pagination/tailwind') }} --}}
  {{-- {{ $articles->withQueryString()->links() }} --}}
  {{-- {{ $articles->onEachSide(5)->links() }} --}}
@endsection
