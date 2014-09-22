<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Entertainment Database</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a href="{{ action('PerformanceController@index') }}" class="navbar-brand">Live Performances</a>
            </div>
        </nav>
        @yield('content')
    </div>
</body>
</html>
