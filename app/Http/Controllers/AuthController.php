<?php

namespace ZeroIssues\Http\Controllers;

use Illuminate\Http\Request;
use ZeroIssues\Email;
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
        $user = User::login(
            $request->input('email_address'),
            $request->input('password'),
            $request->ip(),
            $request->header('User-Agent')
        );

        if ($user !== null)
        {
            return redirect()->intended('/')->with('info', 'Welcome back, ' . $user->first_name . '!');
        }

        return redirect()->route('auth.login')->with('error', 'Failed to authenticate.')->withInput();
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

    public function logout()
    {
        $response = User::logout();
        return redirect()->route('auth.login')->with($response['type'], $response['message']);
    }

    public function doVerifyEmail($userId, $email, $token)
    {
        $response = Email::verify($userId, $email, $token);
        return redirect()->route('index')->with($response['type'], $response['message']);
    }
}
