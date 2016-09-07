<!doctype html>
<html lang="en">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        <nav>
            @include('layouts.partials.navigation')
        </nav>

        <div class="container">
            @include('layouts.partials.alerts')
            @if (!isset($disableSearch) || !$disableSearch)
                <form action="" method="get">
                    <input type="text" name="q" placeholder="Search our knowledgebase..." autofocus>
                </form>
            @endif

            @if (!isset($disableSidebar) || !$disableSidebar)
                <div class="row">
                    <div class="col-xs-8">
                        @yield('content')
                    </div>

                    <div class="col-xs-4">
                        <div class="sidebar">
                            @include('layouts.partials.sidebar')
                        </div>
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
