<?php

namespace ZeroIssues\Http\Controllers;

use Illuminate\Http\Request;
use ZeroIssues\Http\Requests;
use ZeroIssues\Http\Requests\LoginRequest;

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
}
