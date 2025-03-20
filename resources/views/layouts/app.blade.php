<!DOCTYPE html>
<html lang="uk">
<head>
    @include('layouts.meta') <!-- Метаданные -->
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <div class="wrapper">
        @include('layouts.header') 
        <main class="page">
            @yield('content') 
        </main>       
    </div>
    @include('layouts.footer')
</body>
</html>
