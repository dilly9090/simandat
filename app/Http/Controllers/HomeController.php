<?php

namespace App\Http\Controllers;

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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.index');
    }

    public function program_persebaran()
    {
        return view('pages.program.persebaran');
    }
    public function program_tabel()
    {
        return view('pages.program.tabel');
    }
    public function program_grafik()
    {
        return view('pages.program.grafik');
    }

    public function login(Request $request)
    {
        return redirect('home');
    }
}
