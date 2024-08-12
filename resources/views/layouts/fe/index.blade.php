<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.fe.head')

</head>
<body>

    <div class="overlay" data-overlay></div>

    <!-- Start HEADER -->
    @include('layouts.fe.header')
    <!-- End HEADER -->

    <!-- Start MAIN -->
    <main class="mt-5 mb-5">
        @yield('content')
    </main>
    <!-- End MAIN -->

    <!-- Start FOOTER -->
    @include('layouts.fe.footer')
    <!-- End FOOTER -->

    @include('layouts.fe.js')

</body>

</html>
