@csrf
<div class="mb-4">
    <label for="title" class="text-xs text-666">タイトル</label>
    <input type="text" name="title" class="w-full p-3 border border-ccc rounded-[3px] dark:bg-dark-2"
        placeholder="30字以内で入力してください" required value="{{ $book->title ?? old('title') }}" maxlength="30">
</div>
<div class="mb-4">
    <label for="tag" class="text-xs text-666">タグ</label>
    <book-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'>
    </book-tags-input>
</div>
<div class="flex flex-col mb-4">
    <label for="story" class="text-xs text-666">あらすじ</label>
    <textarea name="story" required class="dark:bg-dark-2 border border-ccc p-3 h-24 rounded-[3px]" placeholder="投稿できるのは400文字までです"
        maxlength="400">{{ $book->story ?? old('story') }}</textarea>
</div>
