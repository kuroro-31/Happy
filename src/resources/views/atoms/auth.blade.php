<auth-modal>
  <template #login>
    @include('atoms.error_card_list')
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="w-full mb-3">
        <div class="w-full mb-1 text-xs">メールアドレス</div>
        <input class="w-full p-2 rounded border border-slate-300" type="text" name="email" required>
      </div>
      <div class="w-full mb-3">
        <div class="w-full mb-1 text-xs">パスワード</div>
        <input class="w-full p-2 rounded border border-slate-300" type="password" name="password" required>
      </div>
      <input type="hidden" name="remember" value="on">
      <button class="bg-primary text-white font-semibold rounded px-6 py-4 w-full mb-4" type="submit">ログイン</button>
    </form>
  </template>
  <template #login-footer>
    <a href="{{ route('password.request') }}" class="cursor-pointer text-xs">パスワードを忘れた方</a>
  </template>

  <template #register>
    @include('atoms.error_card_list')
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="w-full mb-3">
        <div class="w-full mb-1 text-xs">ニックネーム</div>
        <input class="w-full p-2 rounded border border-slate-300" type="text" name="name" required
          value="{{ old('name') }}">
      </div>
      <div class="w-full mb-3">
        <div class="w-full mb-1 text-xs">ユーザー名</div>
        <input class="w-full p-2 rounded border border-slate-300" type="text" name="name" name="username" required
          value="{{ old('username') }}">
        <small>英数字3〜16文字(登録後の変更はできません)</small>
      </div>
      <div class="w-full mb-3">
        <div class="w-full mb-1 text-xs">メールアドレス</div>
        <input class="w-full p-2 rounded border border-slate-300" type="text" name="email" required>
      </div>
      <div class="w-full mb-3">
        <div class="w-full mb-1 text-xs">パスワード</div>
        <input class="w-full p-2 rounded border border-slate-300" type="password" name="password" required>
      </div>
      <div class="w-full mb-3">
        <div class="w-full mb-1 text-xs">パスワード確認</div>
        <input class="w-full p-2 rounded border border-slate-300" type="password" name="password_confirmation" required>
      </div>
      <button class="bg-primary text-white font-semibold rounded px-6 py-4 w-full mb-4" type="submit">ユーザー登録</button>
    </form>
  </template>
</auth-modal>
