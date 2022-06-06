<ul class="mb-4 flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
  <li class="mr-2">
    <a href="{{ route('users.show', ['name' => $user->name]) }}"
      class="{{ $hasArticles ? 'btn-primary' : 'hover:bg-slate-200 dark:hover:bg-dark-2 py-2 px-4 rounded-xl' }} inline-block"
      aria-current="page">my happy</a>
  </li>
  <li class="mr-2">
    <a href="{{ route('users.likes', ['name' => $user->name]) }}"
      class="{{ $hasLikes ? 'btn-primary' : 'hover:bg-slate-200 dark:hover:bg-dark-2 py-2 px-4 rounded-xl' }} inline-block">liked</a>
  </li>
  {{-- <li class="mr-2 {{ $hasArticles ? 'active' : '' }}">
    <a href="#"
      class="inline-block py-3 px-4 rounded-lg-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">Tab
      3</a>
  </li> --}}
</ul>
