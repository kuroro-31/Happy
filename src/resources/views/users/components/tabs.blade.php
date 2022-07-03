<div class="flex flex-col items-start justify-center bg-white rounded-lg shadow p-4">
  <a href="{{ route('users.show', ['username' => $user->username]) }}"
    class="w-full h-full px-2 py-1 hover:bg-white-2 mb-2 rounded hover:text-primary {{ $hasBooks ? 'bg-white-2 font-semibold text-primary' : '' }}"
    aria-current="page">
    漫画
  </a>
  <a href="{{ route('users.likes', ['username' => $user->username]) }}"
    class="w-full h-full px-2 py-1 hover:bg-white-2 mb-2 rounded hover:text-primary {{ $hasLikes ? 'bg-white-2 font-semibold text-primary' : '' }}">
    本棚
  </a>
  <a href="{{ route('users.about', ['username' => $user->username]) }}"
    class="w-full h-full px-2 py-1 hover:bg-white-2 rounded hover:text-primary {{ $about ? 'bg-white-2 font-semibold text-primary' : '' }}">
    About
  </a>
</div>
