<div class="card p-4 rounded bg-white dark:bg-dark-2 mb-6">
  <div class="flex items-center justify-between">
    <a href="{{ route('users.show', ['username' => $article->user->username]) }}" class="flex items-center">
      @empty($article->user->avatar)
        <img src="{{ asset('/img/avatar.jpeg') }}" alt=""
          class="rounded-full h-10 w-10 object-cover mr-3 shadow-lg border border-emerald-50">
      @else
        <img src="{{ asset('/img/users/avatar/' . Auth::user()->avatar) }}" alt="avatar"
          class="rounded-full h-10 w-10 object-cover mr-3 shadow-lg border border-emerald-50">
      @endempty
      <span class="flex flex-col">
        <span class="font-semibold">{{ $article->user->name }}</span>
        <span class="text-gray text-xs font-semibold">
          {{ $article->created_at->format('Y/m/d H:i') }}
        </span>
      </span>
    </a>
    @if (Auth::id() === $article->user_id)
      <div class="flex items-center">
        <edit-modal class="mr-2">
          @include('atoms.error_card_list')
          {{-- HTMLのformタグは、PUTメソッドやPATCHメソッドをサポートしていない(DELETEメソッドもサポートしていない) --}}
          <form method="POST" action="{{ route('articles.update', ['article' => $article->id]) }}">
            {{-- LaravelのBladeでPATCHメソッド等を使う場合は、formタグではmethod属性を"POST"のままとしつつ、@methodでPATCHメソッド等を指定する --}}
            @method('PATCH')
            @include('articles.form')
            <button type="submit" class="btn-primary">更新する</button>
          </form>
        </edit-modal>
        <delete-modal>
          <form method="POST" action="{{ route('articles.destroy', ['article' => $article->id]) }}"
            class="p-2 rounded-lg">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">削除する</button>
          </form>
        </delete-modal>
      </div>
    @endif
  </div>
  <div class="card-body">
    {!! nl2br(e(Markdown::parse($article->body))) !!}
  </div>
  @if ($article->tags)
    @foreach ($article->tags as $tag)
      @if ($loop->first)
        <div class="">
          <div class="">
      @endif
      <a href="{{ route('tags.show', ['name' => $tag->name]) }}"
        class="inline-block text-xs btn-border p-1.5 px-2 m-1">
        {{ $tag->hashtag }}
      </a>
      @if ($loop->last)
</div>
</div>
@endif
@endforeach
@endif
<div class="card-body pt-0 pb-2 pl-3">
  <div class="card-text">
    <article-like :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
      :initial-count-likes='@json($article->count_likes)' :authorized='@json(Auth::check())'
      endpoint="{{ route('articles.like', ['article' => $article]) }}">
    </article-like>
  </div>
</div>

</div>
