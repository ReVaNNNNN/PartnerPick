<!doctype html>
<html lang="pl">
<head>
    @include('partials.head')
    <title>PartnerPick</title>
</head>
<body>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                @include('partials.header')

                @yield('content')

                @include('partials.footer')

                @include('partials.footer_scripts')
            </div>
        </div>
    </div>
</body>
</html>
