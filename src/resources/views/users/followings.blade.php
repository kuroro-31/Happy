@extends('app')

@section('title', $user->name)

@section('content')
  @include('patials._nav')
  <div class="">
    @include('users.components.user')
  </div>
  <div class="flex max-w-lg w-full mx-auto px-8 md:px-0 justify-center">
    <div class="py-8 w-full">
      @include('users.components.tabs', [
          'hasBooks' => false,
          'hasLikes' => false,
          'about' => false,
      ])

      <follow-modal :user-name='@json($user->name)'>
        @if ($followings->count())
          @foreach ($followings as $person)
            @include('users.components.person')
          @endforeach
        @else
          <p>フォローしている人はいません</p>
        @endif
      </follow-modal>

    </div>
  </div>
@endsection
