@csrf
<div class="p-4 flex flex-col text-sm">
  <label for="thumbnail">サムネイル</label>
  <input type="file" name="thumbnail">

  <label for="avatar">アバター</label>
  <input type="file" name="avatar">

  <label for="name">名前</label>
  <input disabled type="text" name="name" value="{{ $user->name ?? old('name') }}">

  <label for="email">メールアドレス</label>
  <input disabled type="email" name="email" value="{{ $user->email ?? old('email') }}">

  <label for="website">リンク</label>
  <input type="text" name="website" value="{{ $user->website ?? old('website') }}">

  <label for="body">自己紹介</label>
  <textarea name="body" placeholder="">{{ $user->body ?? old('body') }}</textarea>
</div>
