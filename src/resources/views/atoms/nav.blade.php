<div
  class="bg-white sticky top-0 z-40 w-full backdrop-blur flex-none transition-colors duration-500 lg:z-50 lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06] supports-backdrop-blur:bg-white/60 dark:bg-transparent">
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
          <div class="flex items-center border-l border-slate-200 ml-6 pl-6 dark:border-slate-800">
            <label class="sr-only" id="headlessui-listbox-label-3">
              Theme
            </label>
            <button type="button" id="headlessui-listbox-button-4" aria-haspopup="true" aria-expanded="false"
              aria-labelledby="headlessui-listbox-label-3 headlessui-listbox-button-undefined">
              <span class="dark:hidden">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="w-6 h-6">
                  <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" class="stroke-slate-400 dark:stroke-slate-500">

                  </path>
                  <path
                    d="M12 4v1M17.66 6.344l-.828.828M20.005 12.004h-1M17.66 17.664l-.828-.828M12 20.01V19M6.34 17.664l.835-.836M3.995 12.004h1.01M6 6l.835.836"
                    class="stroke-slate-400 dark:stroke-slate-500">
                  </path>
                </svg>
              </span>
              <span class="hidden dark:inline">
                <svg viewBox="0 0 24 24" fill="none" class="w-6 h-6">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M17.715 15.15A6.5 6.5 0 0 1 9 6.035C6.106 6.922 4 9.645 4 12.867c0 3.94 3.153 7.136 7.042 7.136 3.101 0 5.734-2.032 6.673-4.853Z"
                    class="fill-transparent">
                  </path>
                  <path
                    d="m17.715 15.15.95.316a1 1 0 0 0-1.445-1.185l.495.869ZM9 6.035l.846.534a1 1 0 0 0-1.14-1.49L9 6.035Zm8.221 8.246a5.47 5.47 0 0 1-2.72.718v2a7.47 7.47 0 0 0 3.71-.98l-.99-1.738Zm-2.72.718A5.5 5.5 0 0 1 9 9.5H7a7.5 7.5 0 0 0 7.5 7.5v-2ZM9 9.5c0-1.079.31-2.082.845-2.93L8.153 5.5A7.47 7.47 0 0 0 7 9.5h2Zm-4 3.368C5 10.089 6.815 7.75 9.292 6.99L8.706 5.08C5.397 6.094 3 9.201 3 12.867h2Zm6.042 6.136C7.718 19.003 5 16.268 5 12.867H3c0 4.48 3.588 8.136 8.042 8.136v-2Zm5.725-4.17c-.81 2.433-3.074 4.17-5.725 4.17v2c3.552 0 6.553-2.327 7.622-5.537l-1.897-.632Z"
                    class="fill-slate-400 dark:fill-slate-500">
                  </path>
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M17 3a1 1 0 0 1 1 1 2 2 0 0 0 2 2 1 1 0 1 1 0 2 2 2 0 0 0-2 2 1 1 0 1 1-2 0 2 2 0 0 0-2-2 1 1 0 1 1 0-2 2 2 0 0 0 2-2 1 1 0 0 1 1-1Z"
                    class="fill-slate-400 dark:fill-slate-500">
                  </path>
                </svg>
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
