<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  @include('partials.header')

  <div class="content">
    @yield('content')
  </div>

  @include('partials.footer')
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
