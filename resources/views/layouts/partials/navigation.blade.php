<ul class="left">
    <li><a href="#">{{ config('app.name') }}</a></li>
    <li><a href="#">@lang("lang.navigation.home")</a></li>
</ul>

<ul class="right">
    <li><a href="{{ route('auth.create-account') }}">@lang("lang.navigation.createaccount")</a></li>
    <li><a href="{{ route('auth.login') }}">@lang("lang.navigation.signin")</a></li>
</ul>
