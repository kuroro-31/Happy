@extends('app')

@section('title', $user->name)

@section('content')
  @include('_patials._nav')
  <div class="">
    @include('users._patials.user')
  </div>
  <div class="flex max-w-lg w-full mx-auto px-8 md:px-0 justify-center">
    <div class="py-8 w-full">
      @include('users._patials.tabs', [
          'hasBooks' => false,
          'hasLikes' => false,
          'about' => false,
      ])
      <follow-modal :user-name='@json($user->name)'>
        @if ($followers->count())
          @foreach ($followers as $person)
            @include('users._patials.person')
          @endforeach
        @else
          <p>フォロワーはいません</p>
        @endif
      </follow-modal>
    </div>
  </div>
@endsection
