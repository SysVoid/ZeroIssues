<ul class="left">
    <li><a href="#">{{ config('app.name') }}</a></li>
    <li><a href="#">@lang("layouts/partials/navigation.home")</a></li>
</ul>

<ul class="right">
    @if (Auth::check())
        <li class="user"><a href="{{ route('tickets.list') }}">{{ Auth::user()->full_name }}</a></li>
        <li><a href="{{ route('auth.logout') }}">Log Out</a></li>
    @else
        <li><a href="{{ route('auth.create-account') }}">@lang("layouts/partials/navigation.createaccount")</a></li>
        <li><a href="{{ route('auth.login') }}">@lang("layouts/partials/navigation.login")</a></li>
    @endif
</ul>
