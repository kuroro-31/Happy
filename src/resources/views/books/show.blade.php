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
                <h2 class="text-2xl font-semibold my-2">{{ $book->title }}</h2>
                <div class="flex items-center mb-6">
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
                <div class="w-full flex flex-col">
                    <button class="btn-border py-3 mb-2">本棚に追加する</button>
                    <button class="btn-primary py-3">全話をまとめて購入</button>
                </div>
            </div>

            {{-- メインコンテンツ --}}
            <div class="p-4 w-full">
                @if (!empty($chapters))
                    <div class="w-full mx-auto flex flex-col items-center">
                        @if (Auth::id() === $book->user_id)
                            <chapter-list :book='@json($book)'></chapter-list>
                        @endif
                        <div class="w-full max-h-[400px] overflow-y-auto">
                            @foreach ($chapters as $chapter)
                                <div
                                    class="hover:bg-f5 mb-2 pb-2 border-b border-ddd flex items-center justify-between w-full overflow-hidden rounded-[3px]">
                                    <a href="{{ route('book.chapter.show', ['book' => $book->code, 'chapter' => $chapter->code]) }}"
                                        class="flex items-center w-full cursor-pointer">
                                        {{-- @empty($book->thumbnail) --}}
                                        <img src="/img/bg.svg" alt="thumbnail"
                                            class="w-[160px] h-[80px] object-cover flex-shrink-0">
                                        {{-- @else
                                            <img src="/img/{{ $book->thumbnail }}" alt=""
                                                class="rounded-full h-10 w-10 object-cover mr-3 -lg border border-emerald-50">
                                        @endempty --}}
                                        <div class="">
                                            <div class="flex items-center px-4">
                                                <span class="">{{ $counts-- }}</span>
                                                <span>話</span>
                                            </div>
                                        </div>

                                        {{-- エピソードタイトル --}}
                                        <div class="w-full truncate">{{ $chapter->name }}</div>
                                    </a>
                                    <div class="flex items-center pr-2">
                                        @if (Auth::id() === $book->user_id)
                                            <div class="flex items-center">
                                                <a href="{{ route('book.chapter.edit', ['book' => $book->code, 'chapter' => $chapter->code]) }}"
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
                                                        action="{{ route('book.chapter.destroy', ['book' => $book->code, 'chapter' => $chapter->code]) }}"
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
                    </div>
                @endif
            </div>

            {{-- 右サイドバー --}}
            <div class="p-4 lg:max-w-[282px] lg:min-w-[282px]">
                <div class="flex flex-col mb-4">
                    <h3 class="text-lg font-semibold mb-2">あらすじ</h3>
                    <span>{!! $book->body !!}</span>
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

                        {{-- @if (!empty($chapters))
                        <div class="mt-8 mb-4 flex">
                            <a href="/books/{{ $book->code }}/chapters/1"
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
