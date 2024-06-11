<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

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
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|not_in:0',
        ]);

        if ($validator->fails()) {
            return redirect()->route('registerAdmin')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $roleName = $request->role == 'superadmin' ? 'superadmin' : 'admin';
        $role = Role::where('name', $roleName)->first();

        if ($role) {
            $user->assignRole($role);
        }

        if ($user) {
            Auth::login($user);
            return redirect()->route('admin')
                ->with('success', 'Admin berhasil dibuat');
        } else {
            return redirect()->route('registerAdmin')
                ->with('error', 'Gagal membuat Admin');
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('loginAdmin')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('admin');
        } else {
            return redirect()->route('loginAdmin')
                ->with('error', 'Login gagal, email atau password salah!');
        }
    }
    
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}