<div class="module">
    <div class="heading">Authenticate</div>
    <div class="body">
        <form action="{{ route('auth.create-account') }}" method="post">
            <div class="group">
                <label for="email_address">@lang("auth_create-account.get.emailaddress_label")</label>
                <input type="email" name="email_address" id="email_address" placeholder="@lang('auth_create-account.get.emailaddress_placeholder')" value="{{ old('email_address') }}" autofocus>
                @errors('email_address')
            </div>

            <div class="group">
                <label for="first_name">@lang("auth_create-account.get.firstname_label")</label>
                <input type="text" name="first_name" id="first_name" placeholder="@lang('auth_create-account.get.emailaddress_placeholder')" value="{{ old('first_name') }}">
                @errors('first_name')
            </div>

            <div class="group">
                <label for="last_name">@lang("auth_create-account.get.lastname_label")</label>
                <input type="text" name="last_name" id="last_name" placeholder="@lang("auth_create-account.get.lastname_placeholder")" value="{{ old('last_name') }}">
                @errors('last_name')
            </div>

            <div class="group">
                <label for="password">@lang("auth_create-account.get.password_label")</label>
                <input type="password" name="password" id="password" placeholder="@lang("auth_create-account.get.password_placeholder")">
                @errors('password')
            </div>

            <div class="group">
                <label for="confirm_password">@lang("auth_create-account.get.confirmpassword_label")</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="@lang("auth_create-account.get.confirmpassword_placeholder")">
                @errors('confirm_password')
            </div>

            <div class="button">
                <button type="submit">@lang("auth_create-account.get.createaccount_button")</button>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
</div>
