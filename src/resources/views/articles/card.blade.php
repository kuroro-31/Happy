<div class="card p-4 border">
  <div class="flex items-center justify-between">
    <span class="flex items-center">
      <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt=""
        class="rounded-full h-10 w-10 object-cover mr-3">
      <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="flex flex-col">
        <span class="font-semibold">{{ $article->user->name }}</span>
        <span class="text-gray text-xs font-semibold">
          {{ $article->created_at->format('Y/m/d H:i') }}
        </span>
      </a>
    </span>
    @if (Auth::id() === $article->user_id)
      <div>
        <edit-modal :article-id='{{ $article->id }}'>
          <a class="cursor-pointer" href="{{ route('articles.edit', ['article' => $article]) }}">
            <i class=""></i>記事を更新する
          </a>
          <form method="POST" action="{{ route('articles.destroy', ['article' => $article->id]) }}"
            class="cursor-pointer">
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
