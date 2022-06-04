<div class="bg-white dark:bg-dark sticky top-0 z-40 w-full flex-none lg:z-50">
  <div class="max-w-8xl mx-auto">
    <div class="py-4 border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 mx-4 lg:mx-0">
      <div class="relative flex items-center">
        <a href="/" class="mr-3 flex-none w-[2.0625rem] overflow-hidden md:w-auto">
          <span class="sr-only">Tailwind CSS home page</span>
          <span class="text-2xl font-semibold">Happy</span>
        </a>
        <div class="relative hidden lg:flex items-center ml-auto">
          <nav class="text-sm">
            <ul class="flex items-center">
              @guest
                <li>
                  <a href="{{ route('register') }}">
                    ユーザー登録
                  </a>
                </li>
                <li>
                  <a href="{{ route('login') }}">
                    ログイン
                  </a>
                </li>
              @endguest
              @auth
                <li class="mr-6 bg-primary hover:bg-opacity-90 shadow shadow-primary text-white rounded-xl py-2 px-6">
                  <a href="{{ route('articles.create') }}">
                    投稿する
                  </a>
                </li>
                <li>
                  <header-user-modal :user-name='{{ Auth::user()->name }}'>
                    <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}"
                      class="block text-sm cursor-pointer p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-dark-2">
                      マイページ
                    </a>
                    <div>
                      <button form="logout-button" type="submit"
                        class="w-full text-left cursor-pointer p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-dark-2">
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
