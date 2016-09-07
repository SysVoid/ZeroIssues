<?php

namespace ZeroIssues\Http\Controllers;

use Illuminate\Http\Request;
use ZeroIssues\Http\Requests;
use ZeroIssues\Http\Requests\CreateAccountRequest;
use ZeroIssues\Http\Requests\LoginRequest;
use ZeroIssues\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        return "passed";
    }

    public function createAccount()
    {
        return view('auth.create-account');
    }

    public function doCreateAccount(CreateAccountRequest $request)
    {
        $response = User::register(
            $request->input('first_name'),
            $request->input('last_name'),
            $request->input('password'),
            $request->input('email_address')
        );

        return redirect()->route('auth.create-account')->withInput()->with($response['type'], $response['message']);
    }
}
