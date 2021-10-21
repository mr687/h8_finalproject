<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'No Title') | {{ config('app.name', 'Laravel') }}</title>
  
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link rel="icon" href="data:;base64,iVBORw0KGgo=">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  @stack('styles')

</head>
<body class="@yield('body-class', '')">
  
  @yield('content')

  <script src="{{ mix('js/app.js') }}"></script>
  @stack('scripts')
</body>
</html>