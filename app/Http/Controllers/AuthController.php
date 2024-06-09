<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginAdmin()
    {
        return view('auth.login');
    }
     public function registerAdmin()
    {
        return view('auth.register');
    }
}
