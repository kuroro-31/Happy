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
                  <auth-modal>
                    <div class="tabs">
                      <input id="all" type="radio" name="tab_item" checked>
                      <label class="tab_item" for="all">ログイン</label>
                      <input id="programming" type="radio" name="tab_item">
                      <label class="tab_item" for="programming">新規登録</label>

                      <div class="tab_content" id="all_content">
                        @include('atoms.error_card_list')
                        <form method="POST" action="{{ route('login') }}">
                          @csrf

                          <div class="md-form">
                            <label for="email">メールアドレス</label>
                            <input class="form-control" type="text" id="email" name="email" required>
                          </div>

                          <div class="md-form">
                            <label for="password">パスワード</label>
                            <input class="form-control" type="password" id="password" name="password" required>
                          </div>

                          <input type="hidden" name="remember" id="remember" value="on">

                          <div class="text-left">
                            <a href="{{ route('password.request') }}" class="card-text">パスワードを忘れた方</a>
                          </div>

                          <button class="btn-primary" type="submit">ログイン</button>

                        </form>


                      </div>
                      <div class="tab_content" id="programming_content">
                        @include('atoms.error_card_list')

                        <form method="POST" action="{{ route('register') }}">
                          @csrf
                          <div class="md-form">
                            <label for="name">ニックネーム</label>
                            <input class="form-control" type="text" id="name" name="name" required
                              value="{{ old('name') }}">
                          </div>
                          <div class="md-form">
                            <label for="name">ユーザー名</label>
                            <input class="form-control" type="text" id="username" name="username" required
                              value="{{ old('username') }}">
                            <small>英数字3〜16文字(登録後の変更はできません)</small>
                          </div>
                          <div class="md-form">
                            <label for="email">メールアドレス</label>
                            <input class="form-control" type="text" id="email" name="email" required
                              value="{{ old('email') }}">
                          </div>
                          <div class="md-form">
                            <label for="password">パスワード</label>
                            <input class="form-control" type="password" id="password" name="password" required>
                          </div>
                          <div class="md-form">
                            <label for="password_confirmation">パスワード(確認)</label>
                            <input class="form-control" type="password" id="password_confirmation"
                              name="password_confirmation" required>
                          </div>
                          <button class="btn-primary" type="submit">ユーザー登録</button>
                        </form>

                      </div>
                  </auth-modal>
                </li>
              @endguest
              @auth
                <li class="mr-6">
                  <create-modal>
                    @include('atoms.error_card_list')
                    <form method="POST" action="{{ route('articles.store') }}">
                      @include('articles.components.form')
                      <button type="submit" class="btn-primary justify-end">投稿する</button>
                    </form>
                  </create-modal>
                </li>
                <li>
                  <header-user-modal>
                    <template #avatar>
                      @if (empty(Auth::user()->avatar))
                        <img src="{{ asset('/img/avatar.jpeg') }}" alt="" class="w-10 h-10 shadow rounded-full">
                      @else
                        <img src="{{ asset('/img/users/avatar/' . Auth::user()->avatar) }}"
                          alt="w-10 h-10 shadow rounded-full" class="w-10 h-10 shadow rounded-full">
                      @endif
                    </template>
                    <a href="{{ route('users.show', ['username' => Auth::user()->username]) }}"
                      class="block text-sm cursor-pointer p-3 rounded-lg hover:bg-slate-100 dark:hover:bg-dark whitespace-nowrap">
                      マイページ
                    </a>
                    <div>
                      <button form="logout-button" type="submit"
                        class="w-full text-left cursor-pointer p-3 rounded-lg hover:bg-slate-100 dark:hover:bg-dark whitespace-nowrap">
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
