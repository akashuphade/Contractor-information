<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contractor Repository</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>

    <div id="app">

        <div class="container">
            @include('inc.navbar')
        </div>

        <main class="py-5 container-wrap">
            <div class="container">
                @include('inc.flash-message')
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
