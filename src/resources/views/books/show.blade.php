@extends('app')

@section('title', '記事詳細')

@section('content')
  @include('atoms.nav')
  <div class="container">
    @include('books.components.card')
  </div>
@endsection
