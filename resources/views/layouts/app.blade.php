<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test App</title>
    @yield('meta')

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'build') }}" rel="stylesheet">
</head>
<body id="app">

<main class="app-content py-3">
    <div class="container">
        @yield('content')
    </div>
</main>

    <footer>
        <div class="container">
            <div class="border-top pt-3">
                <p>&copy; {{ date('Y') }} - Test App</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js', 'build') }}"></script>
    @yield('scripts')
</body>
</html>
