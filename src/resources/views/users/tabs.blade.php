<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
    <li class="mr-2 {{ $hasArticles ? 'active' : '' }}">
        <a href="{{ route('users.show', ['name' => $user->name]) }}"
            class="inline-block py-2 px-4 text-white bg-blue-600 rounded active" aria-current="page">記事</a>
    </li>
    <li class="mr-2 {{ $hasArticles ? 'active' : '' }}">
        <a href="{{ route('users.likes', ['name' => $user->name]) }}"
            class="inline-block py-2 px-4 rounded hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">いいね</a>
    </li>
    {{-- <li class="mr-2 {{ $hasArticles ? 'active' : '' }}">
        <a href="#"
            class="inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">Tab
            3</a>
    </li> --}}
</ul>
