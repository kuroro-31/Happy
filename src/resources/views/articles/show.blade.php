@extends('app')

@section('title', '記事詳細')

@section('content')
  @include('components.nav')
  <div class="container">
    @include('articles.card')
  </div>
@endsection
