<!DOCTYPE html>
<html lang="uk">
<head>
    @include('layouts.meta') <!-- Метаданные -->
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css'])
 

   
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
