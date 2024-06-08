<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index() 
    {
        return view('admin.index');
    }
    public function dataSekolah() 
    {
        return view('admin.dataSekolah');
    }
    public function tambahDataSekolah() 
    {
        return view('admin.tambahDataSekolah');
    }
    public function editDataSekolah() 
    {
        return view('admin.editDataSekolah');
    }

    public function dataGuru() 
    {
        return view('admin.dataGuru');
    }
    public function tambahDataGuru() 
    {
        return view('admin.tambahDataGuru');
    }
    public function editDataGuru() 
    {
        return view('admin.editDataGuru');
    }
    public function dataInfo() 
    {
        return view('admin.dataInfo');
    }
    public function tambahDataInfo() 
    {
        return view('admin.tambahInfoTerkini');
    }
    public function editDataInfo() 
    {
        return view('admin.editInfoTerkini');
    }
}
