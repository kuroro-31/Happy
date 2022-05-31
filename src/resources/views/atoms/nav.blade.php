<div class="bg-white dark:bg-dark-2 sticky top-0 z-40 w-full flex-none lg:z-50">
  <div class="max-w-8xl mx-auto">
    <div class="py-4 border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 mx-4 lg:mx-0">
      <div class="relative flex items-center">
        <a href="/" class="mr-3 flex-none w-[2.0625rem] overflow-hidden md:w-auto">
          <span class="sr-only">Tailwind CSS home page</span>
          <span class="text-2xl font-semibold">Public</span>
        </a>
        <div class="relative hidden lg:flex items-center ml-auto">
          <nav class="text-sm leading-6 font-semibold">
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
                <li class="mr-6 bg-primary text-white rounded-full py-2.5 px-6">
                  <a href="{{ route('articles.create') }}">
                    投稿する
                  </a>
                </li>
                <li>
                  <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                    class="flex items-center justify-between w-full pl-3 pr-4 font-medium border-b border-gray-100 md:p-0 md:w-auto">
                    <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                      src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Bordered avatar">
                  </button>

                  <div id="dropdownNavbar" class="z-10 hidden divide-y divide-gray-100 rounded shadow w-44 bg-white"
                    data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                    <ul class="py-1" aria-labelledby="dropdownLargeButton">
                      <li>
                        <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}"
                          class="block px-4 py-2">マイページ</a>
                      </li>
                    </ul>
                    <div class="py-1">
                      <button form="logout-button" type="submit" class="block px-4 py-2">ログアウト</button>
                      <form id="logout-button" method="POST" action="{{ route('logout') }}">@csrf</form>
                    </div>
                  </div>
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
