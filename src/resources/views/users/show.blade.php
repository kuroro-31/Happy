@extends('app')

@section('title', $user->name . 'さんのプロフィール')

@section('content')
    @include('_patials._nav')
    <div class="bg-white dark:bg-dark">
        @include('users._patials.user')
    </div>
    <div class="flex max-w-6xl w-full mx-auto mt-4 px-12 md:px-0 justify-center">
        <div class="w-full mx-12">
            <div class="w-full flex flex-wrap justify-start">
                @if (Auth::id() === $user->id)
                    <div class="mr-auto">
                        <create-modal>
                            @include('_patials._error_card_list')
                            <form method="POST" action="{{ route('book.store') }}">
                                @include('books._patials.form')
                                <button type="submit" class="btn justify-end">投稿する</button>
                            </form>
                        </create-modal>
                    </div>
                @endif

                @if ($books->count())
                    @foreach ($books as $book)
                        @include('users._patials.card')
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
