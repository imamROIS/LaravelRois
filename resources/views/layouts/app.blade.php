<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LP UMKM DKI Jakarta - {{ $title ?? 'Selamat Datang' }}</title>
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @include('layouts.header')

    <main class="main-content">
        @yield('content')
    </main>

    @include('layouts.footer')

    <script src="{{ asset('js/welcome.js') }}"></script>
    @stack('scripts')
</body>
</html>