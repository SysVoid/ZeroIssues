<ul class="left">
    <li><a href="#">{{ config('app.name') }}</a></li>
    <li><a href="#">Home</a></li>
</ul>

<ul class="right">
    <li><a href="{{ route('auth.create-account') }}">Create Account</a></li>
    <li><a href="{{ route('auth.login') }}">Sign in</a></li>
</ul>
