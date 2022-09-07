@csrf
<div class="mb-4">
    <label for="title" class="text-xs text-gray">タイトル</label>
    <input type="text" name="title" class="w-full p-2 border border-slate-300 rounded dark:bg-dark-2"
        placeholder="30字以内で入力してください" required value="{{ $article->title ?? old('title') }}" maxlength="30">
</div>
<div class="mb-4">
    <label for="tag" class="text-xs text-gray">タグ</label>
    <book-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'>
    </book-tags-input>
</div>
<div class="flex flex-col mb-4">
    <label for="body" class="text-xs text-gray">あらすじ</label>
    <textarea name="body" required class="dark:bg-dark-2 border border-slate-300 p-2 h-24" placeholder="投稿できるのは400文字までです"
        maxlength="400">{{ $book->story ?? old('story') }}</textarea>
</div>
