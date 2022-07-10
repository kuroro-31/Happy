<div class="max-w-5xl mx-auto mb-8">
  <div class="relative z-auto">
    @empty($user->thumbnail)
      <img src="{{ asset('/img/bg.jpeg') }}" alt="" class="rounded min-h-40 min-w-40 flex flex-shrink-0">
    @else
      <thumbnail-zoom :thumbnail='@json($user->thumbnail)'>
        <template #thumbnail>
          <img class="profile-img" src="{{ asset('/img/users/thumbnail/' . $user->thumbnail) }}"
            alt="profile_thumbnail" class="rounded min-h-40 min-w-40 flex flex-shrink-0">
        </template>
      </thumbnail-zoom>
    @endempty
    @if (Auth::id() === $user->id)
      <edit-user-modal class="edit-user-modal">
        @include('_patials._error_card_list')
        {{-- HTMLのformタグは、PUTメソッドやPATCHメソッドをサポートしていない(DELETEメソッドもサポートしていない) --}}
        <form id="submit-form" method="POST" action="{{ route('users.update', ['username' => $user->username]) }}"
          enctype="multipart/form-data">
          {{-- LaravelのBladeでPATCHメソッド等を使う場合は、formタグではmethod属性を"POST"のままとしつつ、@methodでPATCHメソッド等を指定する --}}
          @method('PATCH')
          @include('users._patials.form')
          <button id="submit-btn" type="submit" class="btn-primary w-full py-4">更新する</button>
        </form>
      </edit-user-modal>
    @endif
  </div>
  <div class="flex items-end -mt-16 px-16 bg-white dark:bg-dark-2 rounded-2xl pb-6">
    <div class="text-dark z-10">
      @empty($user->avatar)
        <img src="{{ asset('/img/avatar.jpeg') }}" alt="" class="avatar">
      @else
        <avatar-zoom :avatar='@json($user->avatar)'>
          <template #avatar>
            <img src="{{ asset('/img/users/avatar/' . $user->avatar) }}" alt="avatar" class="avatar">
          </template>
        </avatar-zoom>
      @endempty
    </div>
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
          <a href="{{ route('users.followings', ['username' => $user->username]) }}" class="">
            <span class="font-semibold text-xl">{{ $user->count_followings }}</span>
            フォロー
          </a>
          {{-- <follow-modal :auth-user='@json(Auth::user())' :authorized='@json(Auth::check())'
            :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
            endpoint="{{ route('users.followings', ['username' => $user->username]) }}">
          </follow-modal> --}}
          {{-- フォロワー --}}
          <a href="{{ route('users.followers', ['username' => $user->username]) }}" class="ml-2">
            <span class="font-semibold text-xl">{{ $user->count_followers }}</span>
            フォロワー
          </a>
        </div>
      </div>
      @if (Auth::id() !== $user->id)
        <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('users.follow', ['username' => $user->username]) }}">
        </follow-button>
      @endif
    </div>
  </div>
</div>
