<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="data:;base64,iVBORw0KGgo=">
  <title>@yield('title', 'No Title') - {{ config('app.name', 'Laravel') }}</title>

  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body @yield('bodyAttrs', '')>
  <div id="app">
    @include('admin.layout.sidebar')
    @include('admin.layout.topbar')
    <main class="content container-fluid">
      @yield('content')
    </main>
    @include('admin.layout.footer')
  </div>
</body>
</html>