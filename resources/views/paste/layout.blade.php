<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pastebin</title>
    <link href="{{ asset('css/app.css')  }}" rel="stylesheet">
</head>
<body class="w-screen h-screen text-white bg-black relative">
    @yield('content')
    @can('admin')
        <div class="absolute top-0 right-0 pt-4 pr-8">
            <a href="{{ route('dashboard') }}"><x-heroicon-s-cog class="h-6 w-6 opacity-50 hover:opacity-100"/></a>
        </div>
    @endcan
</body>
</html>
