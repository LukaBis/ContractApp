<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Contract App</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    </head>
    <body>
        @include('partials._navigation')

        @yield('content')
        @yield('javascript-section')

        @if (Route::currentRouteName() == 'contract-chart')
            @include('partials.scripts._showChart')
        @endif

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </body>
</html>