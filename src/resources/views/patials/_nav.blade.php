<div class="bg-white dark:bg-dark sticky top-0 z-40 w-full flex-none lg:z-20">
  <div class="max-w-8xl mx-auto">
    <div class="py-4 border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 mx-4 lg:mx-0">
      <div class="relative flex items-center">
        <a href="/" class="mr-3 flex-none w-[2.0625rem] overflow-hidden md:w-auto">
          <span class="sr-only">Tailwind CSS home page</span>
          <h1 class="text-2xl font-semibold">Starbooks</h1>
        </a>
        <div class="hidden lg:flex items-center ml-auto">
          <nav class="text-sm">
            <ul class="flex items-center">
              @guest
                <li>
                  <a href="/login" class="btn-border">ログイン</a>
                </li>
              @endguest
              @auth
                <li class="mr-6">
                  <create-modal>
                    @include('patials._error_card_list')
                    <form method="POST" action="{{ route('book.store') }}">
                      @include('books.components.form')
                      <button type="submit" class="btn-primary justify-end">投稿する</button>
                    </form>
                  </create-modal>
                </li>
                <li>
                  <header-user-modal>
                    <template #avatar>
                      @if (empty(Auth::user()->avatar))
                        <div class="flex items-center">
                          <img src="{{ asset('/img/avatar.jpeg') }}" alt="" class="w-10 h-10  rounded-full">
                          <span class="ml-2">{{ Auth::user()->name }}</span>
                        </div>
                      @else
                        <img src="{{ asset('/img/users/avatar/' . Auth::user()->avatar) }}"
                          alt="w-10 h-10  rounded-full" class="w-10 h-10  rounded-full">
                      @endif
                    </template>
                    <a href="{{ route('users.show', ['username' => Auth::user()->username]) }}"
                      class="block text-sm cursor-pointer p-3 rounded hover:bg-slate-100 dark:hover:bg-dark whitespace-nowrap">
                      マイページ
                    </a>
                    <div>
                      <button form="logout-button" type="submit"
                        class="w-full text-left cursor-pointer p-3 rounded hover:bg-slate-100 dark:hover:bg-dark whitespace-nowrap">
                        ログアウト
                      </button>
                      <form id="logout-button" method="POST" action="{{ route('logout') }}">
                        @csrf
                      </form>
                    </div>
                  </header-user-modal>
                </li>
              @endauth
            </ul>
          </nav>
          <theme-toggle></theme-toggle>
        </div>
      </div>
    </div>
  </div>
</div>
