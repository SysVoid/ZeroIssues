<div class="module">
    <div class="heading">Authenticate</div>
    <div class="body">
        <form action="{{ route('auth.login') }}" method="post">
            <div class="group">
                <label for="email_address">Email Address</label>
                <input type="email" name="email_address" id="email_address" placeholder="Email Address" autofocus>
                @errors('email_address')
            </div>

            <div class="group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" placeholder="First Name" autofocus>
                @errors('first_name')
            </div>

            <div class="group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" placeholder="Last Name" autofocus>
                @errors('last_name')
            </div>

            <div class="group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
                @errors('password')
            </div>

            <div class="group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                @errors('confirm_password')
            </div>

            <div class="button">
                <button type="submit">Register</button>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
</div>