<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        @include('partials.nav')
    </header>
    <main class="flex-grow-1">
        @include('partials.alert')
        @yield('body')
        @yield('before-script')
        @include('partials.script')
        @include('partials.livechat')
        @yield('after-script')
    </main>
    <footer>
        @include('partials.footer')
    </footer>
</body>
</html>
