<?php

namespace ZeroIssues\Http\Controllers;

use Illuminate\Http\Request;
use ZeroIssues\Http\Requests;

class MiscController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
