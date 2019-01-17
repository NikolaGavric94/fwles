<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Jobs\ProcessMessage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function send()
    {
        event(new MessageSent('This is a test message!'));

        return response()->json('Successfully sent! Check logs');
    }
}
