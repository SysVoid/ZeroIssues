<ul class="left">
    <li><a href="#">{{ config('app.name') }}</a></li>
    <li><a href="#">@lang("layouts/partials/navigation.home")</a></li>
</ul>

<ul class="right">
    <li><a href="{{ route('auth.create-account') }}">@lang("layouts/partials/navigation.createaccount")</a></li>
    <li><a href="{{ route('auth.login') }}">@lang("layouts/partials/navigation.signin")</a></li>
</ul>
