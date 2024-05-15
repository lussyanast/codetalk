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
            @yield('body')
            @yield('before-script')
            @include('partials.script')
            @yield('after-script')
        </main>
        
    </body>
</html