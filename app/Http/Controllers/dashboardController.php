<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        // dd(session()->all());
        return view('dashboard');
    }
}
