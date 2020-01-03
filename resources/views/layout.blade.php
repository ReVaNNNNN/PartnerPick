<!doctype html>
<html lang="pl">
<head>
    @include('partials.head')
    <title>PartnerPick</title>
</head>
<body>
    <div class="container">
        <header class="row">
            @include('partials.header')
        </header>

        <div id="main" class="row">
            @yield('content')
        </div>

        <footer class="row">
            @include('partials.footer')
        </footer>
    </div>
</body>
</html>