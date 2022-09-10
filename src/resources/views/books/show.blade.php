@extends('app')

@section('title', $book->title)

@section('content')
    @include('_patials._nav')
    @include('_patials._genre_nav')
    <div class="w-full h-full bg-white dark:bg-dark">
        <div class="max-w-7xl mx-auto md:py-12 flex justify-between">
            {{-- 左サイドバー --}}
            <div class="top-0 sticky lg:h-[500px] pb-4 pr-4 lg:max-w-[266px] lg:min-w-[266px]">
                @empty($book->thumbnail)
                    <img src="/img/bg.svg" alt="thumbnail"
                        class="block dark:hidden w-[250px] h-[250px] object-cover flex-shrink-0">
                    <img src="/img/bg-dark.svg" alt="thumbnail"
                        class="hidden dark:block w-[250px] h-[250px] object-cover flex-shrink-0">
                @else
                    <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt="book thumbnail"
                        class="w-[250px] h-[250px] object-cover flex-shrink-0">
                @endempty

                {{-- 作品タイトル --}}
                <h2 class="text-2xl font-semibold my-2 px-2">{{ $book->title }}</h2>

                {{-- 評価 --}}
                {{-- @empty(!$book->rate) --}}
                <div class="w-full flex items-center px-2 mb-4">
                    <span class="text-3xl pr-4">4.8{{ $book->rate }}</span>
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
                {{-- @endempty --}}

                @if (Auth::id() !== $book->user_id)
                    {{-- 読者だったら --}}
                    <div class="w-full flex flex-col mt-6 px-2">
                        <button class="btn-border py-3 mb-2">本棚に追加する</button>
                        <button class="btn-primary py-3">全話をまとめて購入</button>
                    </div>
                @else
                    {{-- 作者だったら --}}
                    <div class="mt-6 px-2 w-full">
                        <book-edit-modal>
                            <template #trigger>作品内容を更新する</template>
                            <template #header>作品内容の更新</template>
                            @include('_patials._error_card_list')
                            {{-- HTMLのformタグは、PUTメソッドやPATCHメソッドをサポートしていない(DELETEメソッドもサポートしていない) --}}
                            <form id="submit-form" method="POST" enctype="multipart/form-data"
                                action="{{ route('book.update', ['book' => $book->id]) }}">
                                @csrf
                                {{-- LaravelのBladeでPATCHメソッド等を使う場合は、formタグではmethod属性を"POST"のままとしつつ、@methodでPATCHメソッド等を指定する --}}
                                @method('PATCH')
                                @include('books._patials.form')
                                <div class="w-full flex justify-end"><button id="submit-btn" type="submit"
                                        class="btn">更新する</button></div>
                            </form>
                        </book-edit-modal>
                    </div>
                @endif
            </div>

            <div class="w-full flex">
                {{-- メインコンテンツ --}}
                <div class="px-6 lg:w-2/3">
                    <book-tab>
                        <template #episode>
                            <div class="w-full flex justify-end mb-2">
                                @if (Auth::id() !== $book->user_id)
                                    <div class="btn-border">1話を読む</div>
                                @endif
                            </div>
                            <div class="w-full max-h-[500px] overflow-y-auto scroll-none">
                                @if (Auth::id() === $book->user_id)
                                    <div
                                        class="w-full flex justify-end py-4 mb-2 cursor-pointer hover:bg-f5 rounded-[3px] border-dotted border-2 border-ccc">
                                        <episode-list :book='@json($book)'>
                                            エピソードを追加する
                                        </episode-list>
                                    </div>
                                @endif
                                @foreach ($episodes as $episode)
                                    <div
                                        class="hover:bg-f5 my-2 py-2 border-b border-ddd flex items-center justify-between w-full overflow-hidden rounded-[3px]">
                                        <a href="{{ route('book.episode.show', ['book' => $book->code, 'episode' => $episode->code]) }}"
                                            class="flex items-center w-full cursor-pointer">
                                            @empty($book->thumbnail)
                                                <img src="/img/bg.svg" alt="thumbnail"
                                                    class="w-[160px] h-[80px] object-cover flex-shrink-0">
                                            @else
                                                <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt=""
                                                    class="w-[160px] h-[80px] object-cover flex-shrink-0">
                                            @endempty

                                            {{-- タイトル --}}
                                            <div class="w-full flex flex-col px-4">
                                                {{-- 日付 --}}
                                                <div class="text-666 text-xs">{{ $episode->created_at->format('Y/m/d') }}
                                                </div>


                                                <div class="w-full flex justify-between items-center">
                                                    {{-- 話数 --}}
                                                    <span class="">第{{ $counts-- }}話</span>
                                                    {{-- 値段 --}}
                                                    <div class="flex items-center ml-4">
                                                        @if ($episode->is_free)
                                                            <span
                                                                class="text-xs bg-[#E50111] text-white py-0.5 px-1.5 rounded-[3px]">無料</span>
                                                        @else
                                                            <span
                                                                class="inline-block ml-2 text-xs bg-eee py-0.5 px-1.5 rounded-[3px]">{{ $episode->price }}
                                                                pt</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="flex mt-1"></div>
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
                        </template>
                        <template #story>
                            {!! nl2br($book->story) !!}
                        </template>
                        <template #info>

                            {{-- 原作 --}}
                            @empty(!$book->author)
                                <div class="w-full flex items-center mb-4 pl-2">
                                    <div class="w-1/2">原作</div>
                                    <a href="{{ route('users.show', ['username' => $book->user->username]) }}"
                                        class="w-1/2 hover:text-primary">{{ $book->author }}</a>
                                </div>
                            @endempty

                            {{-- 漫画 --}}
                            @empty(!$book->manga_artist)
                                <div class="w-full flex items-center mb-4 pl-2">
                                    <div class="w-1/2">漫画</div>
                                    <a href="" class="w-1/2 hover:text-primary">{{ $book->manga_artist }}</a>
                                </div>
                            @endempty

                            {{-- アシスタント --}}
                            @empty(!$book->assistant)
                                <div class="w-full flex items-start mb-4 pl-2">
                                    <div class="w-1/2">アシスタント</div>
                                    <ul class="w-1/2 flex flex-col">
                                        @foreach ($book->assistant as $assistant)
                                            @if ($loop->first)
                                            @endif
                                            <li class="mb-1">
                                                <a href="" class="hover:text-primary">
                                                    {{ $assistant->name }}
                                                </a>
                                            </li>
                                            @if ($loop->last)
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endempty

                            {{-- カテゴリー --}}
                            @empty(!$book->category)
                                <div class="w-full flex items-center mb-4 pl-2">
                                    <div class="w-1/2">カテゴリー</div>
                                    <div class="w-1/2">{{ $book->category }}</div>
                                </div>
                            @endempty

                            {{-- タグ --}}
                            @empty(!$book->tags)
                                <div class="w-full flex items-start pl-2">
                                    <div class="w-1/2">タグ</div>
                                    <div class="w-1/2 flex flex-wrap items-center">
                                        @foreach ($book->tags as $tag)
                                            @if ($loop->first)
                                            @endif
                                            <a href="{{ route('tags.show', ['name' => $tag->name]) }}"
                                                class="inline-block mr-2 mb-2 text-xs text-666 rounded-[3px] border border-aaa hover:border-primary hover:text-primary p-1.5 px-2">
                                                {{ $tag->hashtag }}
                                            </a>
                                            @if ($loop->last)
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endempty
                        </template>
                    </book-tab>


                    <div class="w-full mx-auto flex flex-col">
                        {{-- レビュー --}}
                        {{-- <div class="flex flex-col mb-8 pb-8">
                            <h3 class="text-lg font-semibold mb-4">レビュー</h3>
                            <div class="mb-2 pt-2 px-2 pb-4 border-b border-ccc">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="/img/bg.svg" alt="" class="h-8 w-8 rounded-full">
                                        <div class="flex flex-col ml-2">
                                            <span>ミランダカー</span>
                                            <span class="text-xs text-666">2022/08/22</span>
                                        </div>
                                    </div>
                                    <svg width="76" height="16" viewBox="0 0 76 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.6 0L9.30631 5.25147H14.828L10.3609 8.49706L12.0672 13.7485L7.6 10.5029L3.13283 13.7485L4.83914 8.49706L0.371971 5.25147H5.89369L7.6 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M22.8 0L24.5063 5.25147H30.028L25.5609 8.49706L27.2672 13.7485L22.8 10.5029L18.3328 13.7485L20.0391 8.49706L15.572 5.25147H21.0937L22.8 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M38 0L39.7063 5.25147H45.228L40.7609 8.49706L42.4672 13.7485L38 10.5029L33.5328 13.7485L35.2391 8.49706L30.772 5.25147H36.2937L38 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M53.2 0L54.9063 5.25147H60.428L55.9609 8.49706L57.6672 13.7485L53.2 10.5029L48.7328 13.7485L50.4391 8.49706L45.972 5.25147H51.4937L53.2 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M68.4 0L70.1063 5.25147H75.628L71.1609 8.49706L72.8672 13.7485L68.4 10.5029L63.9328 13.7485L65.6391 8.49706L61.172 5.25147H66.6937L68.4 0Z"
                                            fill="#FFA126" />
                                    </svg>

                                </div>
                                <div class="px-4 pt-4 text-666">
                                    とても良かったがエロが足りなかった。
                                </div>
                            </div>
                            <div class="mb-2 pt-2 px-2 pb-4 border-b border-ccc">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="/img/bg.svg" alt="" class="h-8 w-8 rounded-full">
                                        <div class="flex flex-col ml-2">
                                            <span>ミランダカー</span>
                                            <span class="text-xs text-666">2022/08/22</span>
                                        </div>
                                    </div>
                                    <svg width="76" height="16" viewBox="0 0 76 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.6 0L9.30631 5.25147H14.828L10.3609 8.49706L12.0672 13.7485L7.6 10.5029L3.13283 13.7485L4.83914 8.49706L0.371971 5.25147H5.89369L7.6 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M22.8 0L24.5063 5.25147H30.028L25.5609 8.49706L27.2672 13.7485L22.8 10.5029L18.3328 13.7485L20.0391 8.49706L15.572 5.25147H21.0937L22.8 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M38 0L39.7063 5.25147H45.228L40.7609 8.49706L42.4672 13.7485L38 10.5029L33.5328 13.7485L35.2391 8.49706L30.772 5.25147H36.2937L38 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M53.2 0L54.9063 5.25147H60.428L55.9609 8.49706L57.6672 13.7485L53.2 10.5029L48.7328 13.7485L50.4391 8.49706L45.972 5.25147H51.4937L53.2 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M68.4 0L70.1063 5.25147H75.628L71.1609 8.49706L72.8672 13.7485L68.4 10.5029L63.9328 13.7485L65.6391 8.49706L61.172 5.25147H66.6937L68.4 0Z"
                                            fill="#FFA126" />
                                    </svg>

                                </div>
                                <div class="px-4 pt-4 text-666">
                                    とても良かったがエロが足りなかった。
                                </div>
                            </div>
                            <div class="mb-2 pt-2 px-2 pb-4 border-b border-ccc">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="/img/bg.svg" alt="" class="h-8 w-8 rounded-full">
                                        <div class="flex flex-col ml-2">
                                            <span>ミランダカー</span>
                                            <span class="text-xs text-666">2022/08/22</span>
                                        </div>
                                    </div>
                                    <svg width="76" height="16" viewBox="0 0 76 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.6 0L9.30631 5.25147H14.828L10.3609 8.49706L12.0672 13.7485L7.6 10.5029L3.13283 13.7485L4.83914 8.49706L0.371971 5.25147H5.89369L7.6 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M22.8 0L24.5063 5.25147H30.028L25.5609 8.49706L27.2672 13.7485L22.8 10.5029L18.3328 13.7485L20.0391 8.49706L15.572 5.25147H21.0937L22.8 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M38 0L39.7063 5.25147H45.228L40.7609 8.49706L42.4672 13.7485L38 10.5029L33.5328 13.7485L35.2391 8.49706L30.772 5.25147H36.2937L38 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M53.2 0L54.9063 5.25147H60.428L55.9609 8.49706L57.6672 13.7485L53.2 10.5029L48.7328 13.7485L50.4391 8.49706L45.972 5.25147H51.4937L53.2 0Z"
                                            fill="#FFA126" />
                                        <path
                                            d="M68.4 0L70.1063 5.25147H75.628L71.1609 8.49706L72.8672 13.7485L68.4 10.5029L63.9328 13.7485L65.6391 8.49706L61.172 5.25147H66.6937L68.4 0Z"
                                            fill="#FFA126" />
                                    </svg>

                                </div>
                                <div class="px-4 pt-4 text-666">
                                    とても良かったがエロが足りなかった。
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                {{-- 右サイドバー --}}
                <div class="pl-4 lg:w-1/3">
                    {{-- こんな作品はいかがですか？ --}}
                    {{-- <div class="flex flex-col mb-8 pb-8">
                        <h3 class="text-lg font-semibold">オススメの作品</h3>
                        <div class="p-8">
                            <div class="w-full flex flex-col">
                                @empty($book->thumbnail)
                                    <img src="/img/bg.svg" alt="thumbnail"
                                        class="block dark:hidden w-[200px] h-[200px] object-cover flex-shrink-0">
                                    <img src="/img/bg-dark.svg" alt="thumbnail"
                                        class="hidden dark:block w-[200px] h-[200px] object-cover flex-shrink-0">
                                @else
                                    <img src="/img/{{ $book->thumbnail }}" alt=""
                                        class="thumbnail">
                                @endempty
                                <h2 class="text-lg font-semibold my-2 px-2">{{ $book->title }}</h2>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="w-full mx-auto">
            <div class="book-show">
                <div class="book-show-contents">
                    {{-- サムネイル --}}
                    @empty($book->thumbnail)
                        <img src="/img/bg.svg" alt="thumbnail" class="w-[250px] h-[250px] object-cover flex-shrink-0">
                    @else
                        <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt=""
                            class="w-[250px] h-[250px] object-cover flex-shrink-0">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
