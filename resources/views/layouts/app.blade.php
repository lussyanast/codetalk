<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>

    <body>
        <header>
            @include('partials.nav')
        </header>

        <main>
            @include('partials.alert')
            @yield('body')
            @yield('before-script')
            @include('partials.script')
            @yield('after-script')
        </main>

        <footer>
            @include('partials.footer')
        </footer>
    </body>
</html