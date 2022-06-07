@extends('app')

@section('title', $user->name . 'のフォロワー')

@section('content')
  @include('atoms.nav')
  <div class="container">
    @include('users.components.user')
    @include('users.components.tabs', ['hasArticles' => false, 'hasLikes' => false])
    <follow-modal>
      @foreach ($followers as $person)
        @include('users.components.person')
      @endforeach
    </follow-modal>
  </div>
@endsection
