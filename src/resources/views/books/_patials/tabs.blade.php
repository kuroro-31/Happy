<div class="w-full flex flex-col items-start justify-center bg-white dark:bg-dark-1 rounded p-2 mb-4">
  <a href="/"
    class="w-full h-full flex items-center p-2 hover:bg-white-1 dark:hover:bg-dark-2 rounded {{ $books ? 'font-semibold bg-white-2 dark:bg-dark-2' : '' }}"
    aria-current="page">
    <div class="flex p-2 rounded bg-5856d6 bg-opacity-30 text-5856d6 mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="flex flex-shrink-0 h-5 w-5 text-bold" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
      </svg>
    </div>
    <div class="">ランキング</div>
  </a>
  <a href="/" class="w-full h-full flex items-center p-2 hover:bg-white-1 dark:hover:bg-dark-2 rounded"
    aria-current="page">
    <div class="flex p-2 rounded bg-007aff bg-opacity-30 text-007aff mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="flex flex-shrink-0 h-5 w-5 text-bold" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
      </svg>
    </div>
    <div class="">今日の新作</div>
  </a>
  <a href="/" class="w-full h-full flex items-center p-2 hover:bg-white-1 dark:hover:bg-dark-2 rounded"
    aria-current="page">
    <div class="flex p-2 rounded bg-60C9F7 bg-opacity-30 text-60C9F7 mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="flex flex-shrink-0 h-5 w-5 text-bold" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
    </div>
    <div class="">検索</div>
  </a>
</div>

@if (Auth::user())
  <div class="w-full flex flex-col items-start justify-center bg-white dark:bg-dark-1 rounded p-2">
    <a href="{{ route('users.show', ['username' => Auth::user()->username]) }}"
      class="w-full h-full flex items-center p-2 hover:bg-white-1 dark:hover:bg-dark-2 rounded" aria-current="page">
      <div class="flex p-2 rounded bg-4cd964 bg-opacity-30 text-4cd964 mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="flex flex-shrink-0 h-5 w-5 text-bold" fill="none"
          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
      </div>
      <div class="">マイページ</div>
    </a>
    <a href="{{ route('users.likes', ['username' => Auth::user()->username]) }}"
      class="w-full h-full flex items-center p-2 hover:bg-white-1 dark:hover:bg-dark-2 rounded" aria-current="page">
      <div class="flex p-2 rounded bg-ff2d55 bg-opacity-30 text-ff2d55 mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="flex flex-shrink-0 h-5 w-5 text-bold" fill="none"
          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
      </div>
      <div class="">お気に入り</div>
    </a>
    <a href="/" class="w-full h-full flex items-center p-2 hover:bg-white-1 dark:hover:bg-dark-2 rounded"
      aria-current="page">
      <div class="flex p-2 rounded bg-8e8e93 bg-opacity-30 text-8e8e93 mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="flex flex-shrink-0 h-5 w-5 text-bold" fill="none"
          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
      </div>
      <div class="">各種設定</div>
    </a>
  </div>
@endif
