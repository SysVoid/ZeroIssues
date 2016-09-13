<div class="module">
    <div class="heading">@lang('layouts/modules/forms/auth/login.get.heading')</div>
    <div class="body">
        <form action="{{ route('auth.login') }}" method="post">
            <div class="group">
                <label for="email_address">@lang("layouts/modules/forms/auth/login.get.emailaddress_label")</label>
                <input type="email" name="email_address" id="email_address" placeholder="@lang('layouts/modules/forms/auth/login.get.emailaddress_placeholder')" autofocus>
                @errors('email_address')
            </div>

            <div class="group">
                <label for="password">@lang("layouts/modules/forms/auth/login.get.password_label")</label>
                <input type="password" name="password" id="password" placeholder="@lang('layouts/modules/forms/auth/login.get.password_label')">
                @errors('password')
            </div>

            <div class="button">
                <a href="{{ route('auth.create-account') }}" class="button">Create Account</a>
                <button type="submit">@lang("layouts/modules/forms/auth/login.get.signin_button")</button>
            </div>

            <input type="hidden" name="previous" value="{{ URL::previous() }}">
            {!! csrf_field() !!}
        </form>
    </div>
</div>
