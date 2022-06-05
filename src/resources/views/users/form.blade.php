@csrf
<div class="p-4 flex flex-col text-sm">
  <label for="">サムネイル</label>
  <input type="file" name="thumbnail" src="{{ $user->thumbnail ?? old('thumbnail') }}">
  <label for="">アバター</label>
  <input type="file" name="avator" src="{{ $user->avator ?? old('avator') }}">
  <label for="">名前</label>
  <input disabled type="text" name="name" value="{{ $user->name ?? old('name') }}">
  <label for="">メールアドレス</label>
  <input disabled type="email" name="email" value="{{ $user->email ?? old('email') }}">
  <label for="">リンク</label>
  <input type="text" name="website" value="{{ $user->website ?? old('website') }}">
  <label>自己紹介</label>
  <textarea name="body" class="form-textarea" placeholder="">{{ $user->body ?? old('body') }}</textarea>
</div>
