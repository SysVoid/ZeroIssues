<div class="module">
    <div class="heading">@lang("layouts/partials/sidebar.youraccount")</div>

    <div class="body">
        <p>@lang("layouts/partials/sidebar.notloggedin")</p><br>
        <p><a href="{{ route('auth.login') }}">@lang("layouts/partials/sidebar.signin")</a></p>
        <p><a href="{{ route('auth.create-account') }}">@lang("layouts/partials/sidebar.createanaccount")</a></p>
    </div>
</div>
