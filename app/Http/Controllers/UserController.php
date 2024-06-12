<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        $infos = Info::latest()->take(2)->get();
        $sekolahs = Sekolah::latest()->take(2)->get();
        
        return view('users.index', compact('infos', 'sekolahs'));
    }

    public function pencarianSekolah() 
    {
        $sekolahs = Sekolah::orderBy('created_at', 'desc')->get();
        return view('users.pencarianSekolah', compact('sekolahs'));
    }
    
    public function cariSekolah(Request $request)
    {
        $cari = $request->input('cari');
        $sekolahs = Sekolah::where('nama', 'like', '%'.$cari.'%')->get();
        return view('users.pencarianSekolah', compact('sekolahs'));
    }

    public function pencarianInfo() 
    {
        $infos = Info::orderBy('created_at', 'desc')->get();
        return view('users.pencarianInfo', compact('infos'));
    }

    public function cariInfo(Request $request)
    {
        $cari = $request->input('cari');
        $infos = Info::where('judul', 'like', '%'.$cari.'%')->get();
        return view('users.pencarianInfo', compact('infos'));
    }

    public function dashboardSekolah(Sekolah $sekolah) 
    {
        return view('users.dashboardSekolah', compact('sekolah'));
    }
    public function guru(Sekolah $sekolah) 
    {
        $gurus = $sekolah->guru;
        return view('users.dataGuru', compact('sekolah', 'gurus'));
    }
    public function prestasi(Sekolah $sekolah) 
    {
        $infos = $sekolah->info()->where('kategori', 'prestasi')->get();
        return view('users.prestasi', compact('sekolah', 'infos'));
    }
    public function detailPrestasi(Info $info) 
    {
        $sekolah = $info->sekolah;
        return view('users.detailPrestasi', compact('info', 'sekolah'));
    }
    public function info(Sekolah $sekolah) 
    {
        $infos = $sekolah->info()->latest()->get();
        return view('users.info', compact('sekolah', 'infos'));
    }
    public function detailInfo(Info $info) 
    {
        $sekolah = $info->sekolah;
        return view('users.detailInfo', compact('info', 'sekolah'));
    }
}