<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ (empty($title) ? "" : $title . " | ") . config('app.name') }}</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <nav>
            @include('layouts.partials.navigation')
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div>

                <div class="col-md-4">
                    @include('layouts.partials.sidebar')
                </div>
            </div>
        </div>
    </body>
</html>
