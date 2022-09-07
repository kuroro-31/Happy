@extends('app')

@section('title', $book->title)

@section('content')
    @include('_patials._nav')
    @include('_patials._genre_nav')
    <div class="w-full h-full bg-white dark:bg-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:p-8 flex justify-between">
            {{-- 左サイドバー --}}
            <div class="p-4 lg:max-w-[282px] lg:min-w-[282px]">
                @empty($book->thumbnail)
                    <img src="/img/bg.svg" alt="thumbnail" class="w-[250px] h-[250px] object-cover flex-shrink-0">
                @else
                    <img src="/img/{{ $book->thumbnail }}" alt=""
                        class="rounded-full h-10 w-10 object-cover mr-3 -lg border border-emerald-50">
                @endempty
                <h2 class="text-2xl font-semibold my-2 px-2">{{ $book->title }}</h2>
                <div class="flex items-center px-2">
                    <span class="text-3xl pr-4">4.9</span>
                    <svg width="85" height="17" viewBox="0 0 85 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.5 0L10.4084 5.87336L16.584 5.87336L11.5878 9.50329L13.4962 15.3766L8.5 11.7467L3.50383 15.3766L5.41219 9.50329L0.416019 5.87336L6.59163 5.87336L8.5 0Z"
                            fill="#FFA126" />
                        <path
                            d="M25.5 0L27.4084 5.87336L33.584 5.87336L28.5878 9.50329L30.4962 15.3766L25.5 11.7467L20.5038 15.3766L22.4122 9.50329L17.416 5.87336L23.5916 5.87336L25.5 0Z"
                            fill="#FFA126" />
                        <path
                            d="M42.5 0L44.4084 5.87336L50.584 5.87336L45.5878 9.50329L47.4962 15.3766L42.5 11.7467L37.5038 15.3766L39.4122 9.50329L34.416 5.87336L40.5916 5.87336L42.5 0Z"
                            fill="#FFA126" />
                        <path
                            d="M59.5 0L61.4084 5.87336L67.584 5.87336L62.5878 9.50329L64.4962 15.3766L59.5 11.7467L54.5038 15.3766L56.4122 9.50329L51.416 5.87336L57.5916 5.87336L59.5 0Z"
                            fill="#FFA126" />
                        <path
                            d="M76.5 0L78.4084 5.87336L84.584 5.87336L79.5878 9.50329L81.4962 15.3766L76.5 11.7467L71.5038 15.3766L73.4122 9.50329L68.416 5.87336L74.5916 5.87336L76.5 0Z"
                            fill="#FFA126" />
                    </svg>
                </div>

                @if (Auth::id() !== $book->user_id)
                    {{-- 読者だったら --}}
                    <div class="w-full flex flex-col mt-4 px-2">
                        <button class="btn-border mb-2">本棚に追加する</button>
                        <button class="btn-primary">全話をまとめて購入</button>
                    </div>
                @else
                    {{-- 作者だったら --}}
                    <div class="mt-4 px-2 w-full">
                        <button class="btn-border w-full">作品情報を編集する</button>
                    </div>
                @endif
            </div>

            {{-- メインコンテンツ --}}
            <div class="p-4 w-full">
                <div class="w-full mx-auto flex flex-col">

                    {{-- エピソード --}}
                    <div class="w-full flex justify-between mb-2">
                        <h3 class="text-lg font-semibold">エピソード</h3>
                        @if (Auth::id() === $book->user_id)
                            <episode-list :book='@json($book)'></episode-list>
                        @else
                            <div class="btn-border">1話を読む</div>
                        @endif
                    </div>
                    <div class="w-full max-h-[500px] overflow-y-auto">
                        @foreach ($episodes as $episode)
                            <div
                                class="hover:bg-f5 my-2 py-2 border-b border-ddd flex items-center justify-between w-full overflow-hidden rounded-[3px]">
                                <a href="{{ route('book.episode.show', ['book' => $book->code, 'episode' => $episode->code]) }}"
                                    class="flex items-center w-full cursor-pointer">
                                    {{-- @empty($book->thumbnail) --}}
                                    <img src="/img/bg.svg" alt="thumbnail"
                                        class="w-[160px] h-[80px] object-cover flex-shrink-0">
                                    {{-- @else
                                            <img src="/img/{{ $book->thumbnail }}" alt=""
                                                class="rounded-full h-10 w-10 object-cover mr-3 -lg border border-emerald-50">
                                        @endempty --}}

                                    {{-- タイトル --}}
                                    <div class="flex flex-col px-4">
                                        {{-- 日付 --}}
                                        <div class="text-666 text-xs">{{ $episode->created_at->format('Y/m/d') }}
                                        </div>

                                        {{-- 話数 --}}
                                        <div class="w-full truncate">
                                            <span class="pr-3">第{{ $counts-- }}話</span>
                                            {{ $book->title }}
                                        </div>

                                        {{-- ラベル --}}
                                        <div class="flex mt-1">
                                            <span
                                                class="text-xs bg-[#E50111] text-white py-0.5 px-1.5 rounded-[3px]">無料</span>
                                            <span
                                                class="inline-block ml-2 text-xs bg-eee py-0.5 px-1.5 rounded-[3px]">30pt</span>
                                        </div>
                                    </div>
                                </a>

                                {{-- 作者欄 --}}
                                <div class="flex items-center pr-4">
                                    @if (Auth::id() === $book->user_id)
                                        <div class="flex items-center">
                                            <a href="{{ route('book.episode.edit', ['book' => $book->code, 'episode' => $episode->code]) }}"
                                                class="mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 cursor-pointer hover:text-primary" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <delete-modal>
                                                <form method="POST"
                                                    action="{{ route('book.episode.destroy', ['book' => $book->code, 'episode' => $episode->code]) }}"
                                                    class="p-2 rounded">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-danger">削除する</button>
                                                </form>
                                            </delete-modal>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- レビュー --}}
                    <h3 class="text-lg font-semibold mt-8 mb-4">レビュー</h3>
                    <div class=""></div>
                </div>
            </div>

            {{-- 右サイドバー --}}
            <div class="p-4 lg:max-w-[282px] lg:min-w-[282px]">

                {{-- あらすじ --}}
                <div class="flex flex-col mb-4 pb-4 border-b border-ccc">
                    <h3 class="text-lg font-semibold mb-4">あらすじ</h3>
                    <span class="px-2">{!! nl2br($book->body) !!}</span>
                </div>

                {{-- 作品情報 --}}
                <div class="flex flex-col mb-4 pb-4 border-b border-ccc">
                    <h3 class="text-lg font-semibold mb-4">作品情報</h3>
                    <div class="w-full flex items-center mb-2 px-2">
                        <div class="w-1/2">原作</div>
                        <a href="{{ route('users.show', ['username' => $book->user->username]) }}"
                            class="w-1/2 hover:text-primary">{{ $book->user->name }}</a>
                    </div>

                    {{-- 漫画 --}}
                    <div class="w-full flex items-center mb-2 px-2">
                        <div class="w-1/2">漫画</div>
                        <div class="w-1/2">新垣 結衣</div>
                    </div>

                    {{-- アシスタント --}}
                    <div class="w-full flex items-start mb-8 px-2">
                        <div class="w-1/2">アシスタント</div>
                        <ul class="w-1/2 flex flex-col">
                            <li class="mb-1">新垣 結衣</li>
                            <li class="mb-1">新垣 結衣</li>
                            <li class="mb-1">新垣 結衣</li>
                            <li class="mb-1">新垣 結衣</li>
                            <li class="mb-1">新垣 結衣</li>
                        </ul>
                    </div>

                    {{-- カテゴリー --}}
                    <div class="w-full flex items-center mb-2 px-2">
                        <div class="w-1/2">カテゴリー</div>
                        <div class="w-1/2">少年漫画</div>
                    </div>

                    {{-- ジャンル --}}
                    <div class="w-full flex items-start px-2">
                        <div class="w-1/2">ジャンル</div>
                        <ul class="w-1/2 flex flex-col">
                            <li class="mb-1">アドベンチャー</li>
                            <li class="mb-1">海賊</li>
                            <li class="mb-1">海</li>
                            <li class="mb-1">冒険</li>
                            <li class="mb-1">お宝</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>




        <div class="w-full mx-auto">
            <div class="book-show">
                <div class="book-show-contents">
                    @empty($book->thumbnail)
                        <img src="/img/bg.svg" alt="thumbnail" class="">
                    @else
                        <img src="/img/{{ $book->thumbnail }}" alt=""
                            class="rounded-full h-10 w-10 object-cover mr-3 -lg border border-emerald-50">
                    @endempty

                    <div class="flex flex-col max-w-lg ml-16">
                        <p class="w-full flex flex-wrap text-4xl whitespace-pre-line text-white font-semibold">
                            {{ $book->title }}</p>
                        <a href="{{ route('users.show', ['username' => $book->user->username]) }}"
                            class="flex items-center my-4">
                            <span class="text-xl text-white">{{ $book->user->name }}</span>
                        </a>

                        <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                            :initial-count-likes='@json($book->count_likes)' :authorized='@json(Auth::check())'
                            endpoint="{{ route('book.like', ['book' => $book]) }}" :big='true'
                            class="text-white">
                        </book-like>

                        {{-- @if (!empty($episodes))
                        <div class="mt-8 mb-4 flex">
                            <a href="/books/{{ $book->code }}/episodes/1"
                                class="hover:text-primary bg-white dark:bg-dark-1 rounded px-6 py-2 w-full text-center cursor-pointer font-semibold">1話を読む
                            </a>
                        </div>
                    @endif --}}

                        @if ($book->tags)
                            @foreach ($book->tags as $tag)
                                @if ($loop->first)
                                    <div class="">
                                        <div class="">
                                @endif
                                <a href="{{ route('tags.show', ['name' => $tag->name]) }}"
                                    class="inline-block text-xs border border-white text-white rounded-full p-1.5 px-2 m-1">
                                    {{ $tag->hashtag }}
                                </a>
                                @if ($loop->last)
                    </div>
                </div>
                @endif
                @endforeach
                @endif
            </div>

        </div>
    </div>
    </div>


    </div>
@endsection

@section('scripts')
    @include('_patials._submit')
@endsection
