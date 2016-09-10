<div class="module">
    <div class="heading">Authenticate</div>
    <div class="body">
        <form action="{{ route('auth.login') }}" method="post">
            <div class="group">
                <label for="email_address">@lang("auth_login.get.emailaddress_label")</label>
                <input type="email" name="email_address" id="email_address" placeholder="@lang('auth_login.get.emailaddress_placeholder')" autofocus>
                @errors('email_address')
            </div>

            <div class="group">
                <label for="password">@lang("auth_login.get.password_label")</label>
                <input type="password" name="password" id="password" placeholder="@lang('auth_login.get.password_label')">
                @errors('password')
            </div>

            <div class="button">
                <button type="submit">Sign in</button>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
</div>
