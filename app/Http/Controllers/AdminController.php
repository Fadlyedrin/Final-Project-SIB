<?php

namespace App\Http\Controllers;

use App\Http\Requests\SekolahCreateRequest;
use App\Http\Requests\UserCreateRequest;
use App\Models\GambarSekolah;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index() 
    {
        return view('admin.index');
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

    //Kelola data sekolah admin
    public function dataSekolah(Request $request, Sekolah $sekolah)
    {
        return view('admin.dataSekolah', compact('sekolah'));
    }
    
    public function tambahDataSekolah() 
    {
        return view('admin.tambahDataSekolah');
    }
    public function storeDataSekolah(SekolahCreateRequest $request) 
    {
        $file1 = $request->file('logo');
        $fileName = time() . '_' . $file1->getClientOriginalName();
        $file1->move('storage/logo_sekolah', $fileName);

        $sekolah = Sekolah::create([
            'id_user' => Auth::user()->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'deskripsi' => $request->deskripsi,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'logo' => '/storage/logo_sekolah/' . $fileName,
            'lokasi' => $request->lokasi,
        ]);

        if ($request->hasFile('gambar_sekolah')) {
            foreach ($request->file('gambar_sekolah') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move('storage/gambar_sekolah', $fileName);
    
                GambarSekolah::create([
                    'id_sekolah' => $sekolah->id,
                    'gambar' => '/storage/gambar_sekolah/' . $fileName,
                ]);
            }
        }

        return redirect()->route('dataSekolah')->with('success', 'Data Sekolah Berhasil dibuat.');
    }

    public function editDataSekolah(Sekolah $sekolah) 
    {
        return view('admin.editDataSekolah', compact('sekolah'));
    }
    
    public function updateDataSekolah(Request $request, Sekolah $sekolah)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'email' => $request->email != $sekolah->email ? 'required|email|unique:sekolah,email' : 'required|email',
            'deskripsi' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'lokasi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('editDataSekolah', ['sekolah' => $sekolah->id])
                ->withErrors($validator)
                ->withInput(); 
        }

        $sekolah->nama = $request->nama;
        $sekolah->alamat = $request->alamat;
        $sekolah->no_telepon = $request->no_telepon;
        $sekolah->email = $request->email;
        $sekolah->deskripsi = $request->deskripsi;
        $sekolah->visi = $request->visi;
        $sekolah->misi = $request->misi;
        $sekolah->lokasi = $request->lokasi;

        if ($request->hasFile('logo')) {
            $imagePath = public_path($sekolah->logo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('storage/logo_sekolah', $fileName);
            $sekolah->logo = '/storage/logo_sekolah/' . $fileName;
        }

        if ($request->hasFile('gambar_sekolah')) {
            foreach ($request->file('gambar_sekolah') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move('storage/gambar_sekolah', $fileName);

                foreach ($sekolah->gambarSekolah as $gambar) {
                    $oldImagePath = public_path($gambar->gambar);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $gambar->update(['gambar' => '/storage/gambar_sekolah/' . $fileName]);
                }
            }
        }

        $sekolah->save();
            
        return redirect()->route('dataSekolah')
            ->with('success', 'Data Sekolah Berhasil diubah.');
    }
    
    public function deleteDataSekolah(Request $request, Sekolah $sekolah)
    {
        $imagePath = public_path($sekolah->logo);
        if (file_exists($imagePath))
            unlink($imagePath);

        foreach ($sekolah->gambarSekolah as $gambar) {
            $imagePath = public_path($gambar->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $gambar->delete();
        }
        
        $sekolah->delete();
        return redirect()->route('dataSekolah')->with('success', 'Data Sekolah berhasil dihapus.');
    }
    
    
}