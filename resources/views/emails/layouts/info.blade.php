<body style="margin: 0;padding: 0;left: 0;top: 0;font-family: 'Source Sans Pro', sans-serif;background: #fff;">
    <div style="width: 100%;height: 150px;background: #fff;border-bottom: 1px solid #ededed;margin-bottom: 30px;border-top: 5px solid #2a74f5;">
        <h1 style="margin: 0;line-height: 150px;height: 150px;text-align: center;font-size: 20pt;color: #2c2c2c;">
            {{ config('app.name') }}
        </h1>
    </div>

    <div style="margin-right: 50px;margin-left: 50px;">
        @yield('content')
    </div>

    <div class="footer" style="margin-top: 30px;width: 100%;border-top: 1px solid #ededed;padding: 15px 0;text-align: center;">
        <p style="line-height: 2rem;margin: 0;">
            <a href="{{ route('auth.emails.preferences') }}" style="text-decoration: none;color: #0e95f9;">Email Preferences</a>
        </p>
    </div>
</body>