@extends('app')

@section('title', $user->name . 'のフォロー中')

@section('content')
  @include('atoms.nav')
  <div class="container">
    @include('users.components.user')
    @include('users.components.tabs', ['hasArticles' => false, 'hasLikes' => false])
    <follow-modal>
      @foreach ($followings as $person)
        @include('users.components.person')
      @endforeach
    </follow-modal>
  </div>
@endsection
