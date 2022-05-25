<nav class="p-4 bg-white">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="/" class="flex items-center">
      {{-- <img src="/docs/images/logo.svg" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" /> --}}
      <span class="self-center text-3xl font-semibold whitespace-nowrap">Pub</span>
    </a>
    <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
      <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:font-medium">
        @auth
          <li class="nav-item">
            <a href="{{ route('articles.create') }}" class="text-sm px-5 py-2.5 rounded-full bg-primary text-white"><i
                class="fas fa-pen mr-1"></i>投稿する</a>
          </li>

        @endauth
        @guest
          <li>
            <a href="{{ route('register') }}" class="block py-2 pl-3 pr-4 border-b border-gray-100">
              ユーザー登録
            </a>
          </li>
        @endguest
        @guest
          <li>
            <a href="{{ route('login') }}" class="block py-2 pl-3 pr-4 border-b border-gray-100">
              ログイン
            </a>
          </li>
          {{-- <li>
                    <a href="{{ route('facebook.login') }}" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i>
                        Login with Facebook
                    </a>
                </li> --}}
        @endguest

        @auth
          <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
              class="flex items-center justify-between w-full pl-3 pr-4 font-medium border-b border-gray-100 md:p-0 md:w-auto">
              <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Bordered avatar">
            </button>

            <div id="dropdownNavbar" class="z-10 hidden divide-y divide-gray-100 rounded shadow w-44 bg-white" style="
                                              position: absolute;
                                              inset: auto auto 0px 0px;
                                              margin: 0px;
                                              transform: translate3d(
                                                  741px,
                                                  2266.5px,
                                                  0px
                                              );
                                          " data-popper-reference-hidden="" data-popper-escaped=""
              data-popper-placement="top">
              <ul class="py-1" aria-labelledby="dropdownLargeButton">
                <li>
                  <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}" class="block px-4 py-2">マイページ</a>
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
    </div>
  </div>
</nav>
