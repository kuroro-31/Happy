<ul class="mb-4 flex flex-wrap text-xs text-center">

  <li class="mr-2 {{ $hasArticles ? 'border-b-2 border-primary' : '' }}">
    <a href="{{ route('users.show', ['name' => $user->name]) }}"
      class="flex items-center py-2 px-4 {{ $hasArticles ? 'text-primary font-semibold' : 'hover:text-primary' }}"
      aria-current="page">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
        stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
      </svg>
      <span class="ml-2">投稿</span>
    </a>
  </li>

  <li class="mr-2 {{ $hasLikes ? 'border-b-2 border-primary' : '' }}">
    <a href="{{ route('users.likes', ['name' => $user->name]) }}"
      class="flex items-center p-2 {{ $hasLikes ? 'text-primary font-semibold' : 'hover:text-primary' }}">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
        stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
      </svg>
      <span class="ml-2">liked</span>
    </a>
  </li>

  <li class="mr-2 {{ $about ? 'border-b-2 border-primary' : '' }}">
    <a href="{{ route('users.about', ['name' => $user->name]) }}"
      class="flex items-center p-2 {{ $about ? 'text-primary font-semibold' : 'hover:text-primary' }}">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
        stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
      </svg>
      <span class="ml-2">About</span>
    </a>
  </li>

</ul>
