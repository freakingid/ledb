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
                <a href="{{ action('ArtworkController@index') }}" class="navbar-brand">Artwork</a>
                <a href="{{ action('EventOccurrenceController@index') }}" class="navbar-brand">Events</a>
                <a href="{{ action('LocationController@index') }}" class="navbar-brand">Locations</a>
                <a href="{{ action('PerformanceController@index') }}" class="navbar-brand">Performances</a>
                <a href="{{ action('PersonController@index') }}" class="navbar-brand">People</a>
                <a href="{{ action('TourController@index') }}" class="navbar-brand">Tours</a>
            </div>
        </nav>
        @yield('content')
    </div>
</body>
</html>
