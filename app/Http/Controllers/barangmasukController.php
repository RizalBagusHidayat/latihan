<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class barangmasukController extends Controller
{
    public static function index() {
        return view('barangmasuk');
    }
}
