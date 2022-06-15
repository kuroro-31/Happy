@csrf
<div class="mb-4">
  <book-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'>
  </book-tags-input>
</div>
<div class="p-4">
  <label></label>
  <textarea name="body" required class="dark:bg-dark-2 p-2" placeholder="投稿できるのは400文字までです" maxlength="400">{{ $book->body ?? old('body') }}</textarea>
</div>
