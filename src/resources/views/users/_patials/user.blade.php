<div class="max-w-6xl mx-auto">
    <div class="relative z-auto">
        @empty($user->thumbnail)
            <img src="/img/bg.svg" alt=""
                class="dark:hidden lg:h-[300px] rounded-b flex flex-shrink-0 w-full object-cover">
            <img src="/img/bg-dark.svg" alt=""
                class="hidden dark:flex lg:h-[300px] rounded flex-shrink-0 w-full object-cover">
        @else
            <thumbnail-zoom :thumbnail='@json($user->thumbnail)'>
                <template #thumbnail>
                    <img class="profile-img" src="{{ asset('/img/users/thumbnail/' . $user->thumbnail) }}"
                        alt="profile_thumbnail" class="rounded min-h-40 min-w-40 flex flex-shrink-0 w-full">
                </template>
            </thumbnail-zoom>
        @endempty
        @if (Auth::id() === $user->id)
            <edit-user-modal>
                <template #trigger>プロフィールを編集</template>
                <template #header>プロフィールの更新</template>
                {{-- HTMLのformタグは、PUTメソッドやPATCHメソッドをサポートしていない(DELETEメソッドもサポートしていない) --}}
                <form id="submit-form" class="scroll-none overflow-y-auto max-h-[80vh]" method="POST"
                    action="{{ route('users.update', ['username' => $user->username]) }}" enctype="multipart/form-data">
                    @csrf
                    {{-- LaravelのBladeでPATCHメソッド等を使う場合は、formタグではmethod属性を"POST"のままとしつつ、@methodでPATCHメソッド等を指定する --}}
                    @method('PATCH')
                    @include('users._patials.form')
                    <button id="submit-btn" type="submit" class="btn w-full py-4">更新する</button>
                </form>
            </edit-user-modal>
        @endif
    </div>
    <div class="flex mx-12 pb-4 border-b border-ccc">
        <div class="text-dark z-10 -mt-8">
            @empty($user->avatar)
                <img src="{{ asset('/img/noimage-user.svg') }}" alt="" class="avatar">
            @else
                <avatar-zoom :avatar='@json($user->avatar)'>
                    <template #avatar>
                        <img src="{{ asset('/img/users/avatar/' . $user->avatar) }}" alt="avatar" class="avatar">
                    </template>
                </avatar-zoom>
            @endempty
        </div>
        <div class="w-full px-6 flex justify-between mt-4">
            <div class="flex flex-col">
                <div class="flex items-center">
                    <h3 class="font-semibold pr-2" style="font-size: 32px;">{{ $user->name }}</h3>
                    <div class="h-full flex items-center text-primary">
                        <svg class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="-mt-1 text-lg text-t-color-3"><span>@</span>{{ $user->username }}</div>

                <div class="flex items-center text-sm pt-2">
                    <a href="{{ route('users.followings', ['username' => $user->username]) }}" class="">
                        <span class="font-semibold text-lg">{{ $user->count_followings }}</span>
                        <span class="text-t-color-3 pl-1">フォロー</span>
                    </a>
                    {{-- <follow-modal :auth-user='@json(Auth::user())' :authorized='@json(Auth::check())'
            :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
            endpoint="{{ route('users.followings', ['username' => $user->username]) }}">
          </follow-modal> --}}
                    {{-- フォロワー --}}
                    <a href="{{ route('users.followers', ['username' => $user->username]) }}" class="ml-2">
                        <span class="font-semibold text-lg">{{ $user->count_followers }}</span>
                        <span class="text-t-color-3 pl-1">フォロワー</span>
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

    <div class="bg-white dark:bg-dark w-full mx-12 flex-none lg:z-20">
        <div class="max-w-8xl mx-auto">
            <div class="relative flex items-center">
                <a href=""
                    class="py-3 px-6 border-b-2 border-white dark:border-dark dark:hover:border-primary hover:border-primary hover:text-primary hover:font-semibold">作品</a>
                @if (Auth::id() === $user->id)
                    <a href=""
                        class="py-3 px-6 border-b-2 border-white dark:border-dark dark:hover:border-primary hover:border-primary hover:text-primary hover:font-semibold">本棚</a>
                    <a href=""
                        class="py-3 px-6 border-b-2 border-white dark:border-dark dark:hover:border-primary hover:border-primary hover:text-primary hover:font-semibold">アカウントサービス</a>
                @endif
            </div>
        </div>
    </div>
</div>
