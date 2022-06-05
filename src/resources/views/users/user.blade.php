<div class="max-w-4xl mx-auto">
  <div class="relative">
    @if (Auth::user()->thumbnail)
      <img class="profile-img" src="{{ asset('/img/' . Auth::user()->thumbnail) }}" alt="profile_thumbnail"
        class="rounded-full min-h-40 min-w-40 flex flex-shrink-0">
    @else
      <img src="https://source.unsplash.com/1000x300?fashion" alt="" class="profile-img">
    @endif
    <edit-user-modal class="absolute bottom-4 right-4">
      @include('atoms.error_card_list')
      {{-- HTMLのformタグは、PUTメソッドやPATCHメソッドをサポートしていない(DELETEメソッドもサポートしていない) --}}
      <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}">
        {{-- LaravelのBladeでPATCHメソッド等を使う場合は、formタグではmethod属性を"POST"のままとしつつ、@methodでPATCHメソッド等を指定する --}}
        @method('PATCH')
        @include('users.form')
        <button type="submit" class="btn-primary">更新する</button>
      </form>
    </edit-user-modal>
  </div>
  <div class="flex items-end -mt-16 px-16 bg-white dark:bg-dark-2 rounded-2xl pb-6">
    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark z-50">
      @if (Auth::user()->image)
        <img class="image rounded-circle" src="{{ asset('/img/' . Auth::user()->image) }}" alt="profile_image"
          class="rounded-full min-h-40 min-w-40 flex flex-shrink-0">
      @else
        <img src="https://source.unsplash.com/190x190?woman" alt=""
          class="rounded-full min-h-40 min-w-40 flex flex-shrink-0">
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
