<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        return view('users.index');
    }

    public function pencarianSekolah() 
    {
        return view('users.pencarianSekolah');
    }
    public function pencarianInfo() 
    {
        return view('users.pencarianInfo');
    }

    public function dashboardSekolah() 
    {
        return view('users.dashboardSekolah');
    }
    public function dataGuru() 
    {
        return view('users.dataGuru');
    }
     public function prestasi() 
    {
        return view('users.prestasi');
    }
    public function detailPrestasi() 
    {
        return view('users.detailPrestasi');
    }
    public function info() 
    {
        return view('users.info');
    }
    public function detailInfo() 
    {
        return view('users.detailInfo');
    }
}
