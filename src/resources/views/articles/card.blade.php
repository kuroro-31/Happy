<div class="card p-4 shadow dark:shadow-none rounded-lg bg-white dark:bg-dark-2 mb-6">
  <div class="flex items-center justify-between">
    <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="flex items-center">
      <img src="https://source.unsplash.com/190x190?urban" alt=""
        class="rounded-full h-10 w-10 object-cover mr-3 shadow-lg border border-emerald-50">
      <span class="flex flex-col">
        <span class="font-semibold">{{ $article->user->name }}</span>
        <span class="text-gray text-xs font-semibold">
          {{ $article->created_at->format('Y/m/d H:i') }}
        </span>
      </span>
    </a>
    @if (Auth::id() === $article->user_id)
      <div>
        <edit-modal :article-id='{{ $article->id }}'>
          <a class="block text-sm cursor-pointer p-2 rounded-lg hover:bg-slate-100"
            href="{{ route('articles.edit', ['article' => $article]) }}">
            <i class=""></i>記事を更新する
          </a>
          <form method="POST" action="{{ route('articles.destroy', ['article' => $article->id]) }}"
            class="cursor-pointer text-sm p-2 rounded-lg hover:bg-slate-100">
            @csrf
            @method('DELETE')
            <button type="submit" class="">削除する</button>
          </form>
        </edit-modal>
      </div>
    @endif
  </div>
  <div class="p-4 break-words">
    <div class="card-text">
      {!! nl2br(e($article->body)) !!}
    </div>
  </div>
  <div class="card-body pt-0 pb-2 pl-3">
    <div class="card-text">
      <article-like :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
        :initial-count-likes='@json($article->count_likes)' :authorized='@json(Auth::check())'
        endpoint="{{ route('articles.like', ['article' => $article]) }}">
      </article-like>
    </div>
  </div>
  @if ($article->tags)
    @foreach ($article->tags as $tag)
      @if ($loop->first)
        <div class="">
          <div class="">
      @endif
      <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
        {{ $tag->hashtag }}
      </a>
      @if ($loop->last)
</div>
</div>
@endif
@endforeach
@endif
</div>
