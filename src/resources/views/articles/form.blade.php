@csrf
<div class="mb-4">
  <article-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'>
  </article-tags-input>
</div>
<div class="p-4">
  <label></label>
  <textarea name="body" required class="form-textarea"
    placeholder="どんなよいことがあった？">{{ $article->body ?? old('body') }}</textarea>
</div>
