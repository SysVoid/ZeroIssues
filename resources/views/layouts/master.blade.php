<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>{{ (empty($title) ? "" : $title . " | ") . config('app.name') }}</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,600">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <nav>
            @include('layouts.partials.navigation')
        </nav>

        <div class="container">
            @if (!isset($disableSidebar) || !$disableSidebar)
                <div class="row">
                    <div class="col-xs-8">
                        @yield('content')
                    </div>

                    <div class="col-xs-4">
                        @include('layouts.partials.sidebar')
                    </div>
                </div>
            @else
                @yield('content')
            @endif
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
        @include('layouts.partials.pusher')
    </body>
</html>
