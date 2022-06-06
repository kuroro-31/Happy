<div class="max-w-4xl mx-auto">
  <div class="relative">
    @if (empty($user->thumbnail))
      <img src="{{ asset('/img/bg.jpeg') }}" alt="" class="rounded-lg min-h-40 min-w-40 flex flex-shrink-0">
    @else
      <img class="profile-img" src="{{ asset('/img/users/thumbnail/' . Auth::user()->thumbnail) }}"
        alt="profile_thumbnail" class="rounded-lg min-h-40 min-w-40 flex flex-shrink-0">
    @endif
    @if (Auth::id() === $user->id)
      <edit-user-modal class="absolute bottom-4 right-4">
        @include('atoms.error_card_list')
        {{-- HTMLのformタグは、PUTメソッドやPATCHメソッドをサポートしていない(DELETEメソッドもサポートしていない) --}}
        <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}"
          enctype="multipart/form-data">
          {{-- LaravelのBladeでPATCHメソッド等を使う場合は、formタグではmethod属性を"POST"のままとしつつ、@methodでPATCHメソッド等を指定する --}}
          @method('PATCH')
          @include('users.form')
          <button type="submit" class="btn-primary">更新する</button>
        </form>
      </edit-user-modal>
    @endif
  </div>
  <div class="flex items-end -mt-16 px-16 bg-white dark:bg-dark-2 rounded-2xl pb-6">
    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark z-30">
      @if (empty($user->avatar))
        <img src="{{ asset('/img/avatar.jpeg') }}" alt="" class="avatar">
      @else
        <img src="{{ asset('/img/users/avatar/' . Auth::user()->avatar) }}" alt="avatar" class="avatar">
      @endif
    </a>
    <div class="w-full px-6 flex justify-between">
      <div class="flex flex-col">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-4xl font-semibold">
          {{ $user->name }}
        </a>
        <div class="flex items-center text-sm pt-2">
          <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="">
            <span class="font-semibold text-xl">{{ $user->count_followings }}</span>
            フォロー
          </a>
          <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="ml-2">
            <span class="font-semibold text-xl">{{ $user->count_followers }}</span>
            フォロワー
          </a>
        </div>
      </div>
      @if (Auth::id() !== $user->id)
        <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
          :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
        </follow-button>
      @endif
    </div>
  </div>
</div>
