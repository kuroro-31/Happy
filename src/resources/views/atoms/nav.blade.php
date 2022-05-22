<nav class="p-4 bg-white">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="/" class="flex items-center">
            {{-- <img src="/docs/images/logo.svg" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" /> --}}
            <span class="self-center text-2xl font-semibold whitespace-nowrap">Wisher</span>
        </a>
        <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:font-medium">
                @auth
                <li class="nav-item">
                    <a href="{{ route('articles.create') }}" class="py-3 px-6 rounded-full bg-primary text-white"><i
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
                @endguest

                @auth
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium border-b border-gray-100 md:p-0 md:w-auto">
                        Dropdown
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <div id="dropdownNavbar" class="z-10 hidden divide-y divide-gray-100 rounded shadow w-44 bg-white"
                        style="
                                    position: absolute;
                                    inset: auto auto 0px 0px;
                                    margin: 0px;
                                    transform: translate3d(
                                        741px,
                                        2266.5px,
                                        0px
                                    );
                                " data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                        <ul class="py-1" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('users.show', ['name'=> Auth::user()->name]) }}"
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
        </div>
    </div>
</nav>
