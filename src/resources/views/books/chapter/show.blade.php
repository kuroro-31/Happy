@extends('app')

@section('title', $chapter->name)

@section('content')
  @include('_patials._nav')

  <div class="my-8 flex flex-col mx-auto max-w-lg">
    <a href="/books/{{ $book->id }}" class="inline-block text-xs cursor-pointer hover:text-primary mb-8">
      本のトップへ
    </a>
    <div class="mb-4 text-3xl font-semibold">{{ $chapter->name }}</div>
    <div class="p-8 bg-white dark:bg-dark-1 rounded-lg whitespace-pre-line text-lg">
      {!! nl2br(e($chapter->body)) !!}
    </div>
  </div>
  <div class="max-w-lg mx-auto flex items-center justify-between mb-8">
    <a href="/books/{{ $book->id }}/chapters/{{ $chapter->id - 1 }}"
      class=" text-xs cursor-pointer rounded bg-white dark:bg-dark-1 border border-white dark:border-dark-2 hover:border-primary hover:text-primary p-4 flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
          clip-rule="evenodd" />
      </svg>
      <span class="pl-8">前の話へ</span>
    </a>
    <a href="/books/{{ $book->id }}/chapters/{{ $chapter->id + 1 }}"
      class=" text-xs cursor-pointer rounded bg-white dark:bg-dark-1 border border-white dark:border-dark-2 hover:border-primary hover:text-primary p-4 flex items-center">
      <span class="pr-8">次の話へ</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
          clip-rule="evenodd" />
      </svg>
    </a>
  </div>
@endsection
