@extends('app')

@section('title', $user->name . 'さんのプロフィール')

@section('content')
    @include('_patials._nav')
    @include('_patials._genre_nav')
    <div class="">
        @include('users._patials.user')
    </div>
    <div class="flex max-w-5xl w-full mx-auto px-8 md:px-0 justify-center">

        <div class="w-full md:w-1/5 mb-4">
        </div>
        <div class="w-full md:w-4/5 rounded-lg md:ml-8 flex flex-wrap justify-start">
            @if ($books->count())
                @foreach ($books as $book)
                    @include('books._patials.card')
                @endforeach
            @else
                <div>
                    <create-modal>
                        @include('_patials._error_card_list')
                        <form method="POST" action="{{ route('book.store') }}">
                            @include('books._patials.form')
                            <button type="submit" class="btn justify-end">投稿する</button>
                        </form>
                    </create-modal>
                </div>
            @endif

            {{-- ページネーション --}}
            {{ $books->links() }}
        </div>
    </div>
@endsection
