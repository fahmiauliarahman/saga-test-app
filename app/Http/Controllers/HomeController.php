<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $judul = 'Dashboard';
        return view('dashboard', compact('judul'));
    }
}
