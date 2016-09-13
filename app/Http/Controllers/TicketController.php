<?php

namespace ZeroIssues\Http\Controllers;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listUserTickets()
    {
        return view('tickets.user.list');
    }
}
