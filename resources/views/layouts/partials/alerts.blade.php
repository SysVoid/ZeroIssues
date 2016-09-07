@if (Session::has('error'))
    <div class="alert error">
        <p>{{ Session::get('error') }}</p>
    </div>
@endif

@if (Session::has('info'))
    <div class="alert info">
        <p>{{ Session::get('info') }}</p>
    </div>
@endif

@if (Session::has('success'))
    <div class="alert success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif
