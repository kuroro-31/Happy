@csrf
<div class="mb-4">
  <article-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'>
  </article-tags-input>
</div>
<div class="p-4">
  <label></label>
  <textarea name="body" required class="dark:bg-dark-2 p-2" placeholder="投稿できるのは400文字までです"
    maxlength="400">{{ $article->body ?? old('body') }}</textarea>
</div>
