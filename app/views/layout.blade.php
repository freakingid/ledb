<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Entertainment Database</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" />
    <script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('js/moment-with-locales.js') }}"></script>
    <!-- does bootstrap.min have collapse and transitions included? needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function() { 
        if($('#startPicker').length) {          
            $('#startPicker').datetimepicker({
                format: 'YYYY-MM-DD hh:mm A',
                minDate: '1980-01-01',
                defaultDate: '2015-01-01'
            });
        }
        if($('#endPicker').length) {
            $('#endPicker').datetimepicker({
                format: 'YYYY-MM-DD hh:mm A',
                minDate: '1980-01-01',
                defaultDate: '2015-01-01'
            });
            // make start / end pickers work together to stay in bounds
            $('#startPicker').on('dp.change',function (e) {
                $('#endPicker').data("DateTimePicker").setMinDate(e.date);
            });
            $('#endPicker').on('dp.change',function (e) {
                $('#startPicker').data("DateTimePicker").setMaxDate(e.date);
            });
        }
    });
    </script>
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
