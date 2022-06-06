<div class="max-w-4xl mx-auto">
  <div class="relative">
    @if (empty($user->thumbnail))
      <img src="{{ asset('/img/bg.jpeg') }}" alt="" class="rounded-lg min-h-40 min-w-40 flex flex-shrink-0">
    @else
      <img class="profile-img" src="{{ asset('/img/users/thumbnail/' . Auth::user()->thumbnail) }}"
        alt="profile_thumbnail" class="rounded-lg min-h-40 min-w-40 flex flex-shrink-0">
    @endif
    @if (Auth::id() === $user->id)
      <edit-user-modal class="edit-user-modal">
        @include('atoms.error_card_list')
        {{-- HTMLのformタグは、PUTメソッドやPATCHメソッドをサポートしていない(DELETEメソッドもサポートしていない) --}}
        <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}"
          enctype="multipart/form-data">
          {{-- LaravelのBladeでPATCHメソッド等を使う場合は、formタグではmethod属性を"POST"のままとしつつ、@methodでPATCHメソッド等を指定する --}}
          @method('PATCH')
          @include('users.form')
          <button type="submit" class="btn-primary w-full py-4">更新する</button>
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
        <div class="text-4xl font-semibold flex items-center">
          <span class="pr-2">{{ $user->name }}</span>

          <div class="h-full flex items-center text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd" />
            </svg>
          </div>

        </div>
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
