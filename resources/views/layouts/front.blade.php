<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OrnaSol</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="bg-white min-h-screen font-base">
<div id="app">

    <div class="flex flex-col md:flex-row">

        <div class="w-full md:flex-1">
            <base-nav></base-nav>
            <main>
                <!-- Replace with your content -->
                <div class=" py-6">
                    @yield('content')
                </div>
                <!-- /End replace -->
            </main>
            <base-footer></base-footer>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>



</div>
</body>
</html>
