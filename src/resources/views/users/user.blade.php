<div class="max-w-6xl mx-auto">
  <img src="https://source.unsplash.com/1000x300?fashion" alt="" class="profile-img">
  <div class="flex items-end -mt-16 px-16">
    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
      <img src="https://source.unsplash.com/190x190?woman" alt=""
        class="rounded-full min-h-40 min-w-40 flex flex-shrink-0">
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
