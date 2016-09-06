<div class="module">
    <div class="heading">Authenticate</div>
    <div class="body">
        <form action="{{ route('auth.login') }}" method="post">
            <div class="group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" autofocus>
                @errors('username')
            </div>

            <div class="group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
                @errors('password')
            </div>

            <div class="button">
                <button type="submit">Sign in</button>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
</div>
