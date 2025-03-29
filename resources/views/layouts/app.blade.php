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

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js?_v=20250311124509"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js?_v=20250311124509"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js?_v=20250311124509"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
