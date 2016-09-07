<!doctype html>
<html lang="en">
    <head>
        @include('layouts.partials.head')
    </head>
    <body class="auth">
        <h1>{{ config('app.name') }}</h1>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    @include('layouts.partials.alerts')
                </div>
            </div>

            @yield('content')
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
        @include('layouts.partials.pusher')
    </body>
</html>
