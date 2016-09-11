<div class="module">
    <div class="heading">Authenticate</div>
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
                <button type="submit">@lang("layouts/modules/forms/auth/login.get.signin_button")</button>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
</div>
