<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <title>
    @yield('title')
  </title>
</head>

<body>
  <div id="app">
    @yield('content')
  </div>
  <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
  <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
