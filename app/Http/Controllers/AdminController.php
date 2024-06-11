<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuruCreateRequest;
use App\Http\Requests\SekolahCreateRequest;
use App\Http\Requests\UserCreateRequest;
use App\Models\GambarSekolah;
use App\Models\Guru;
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
    
    //Kelola data guru admin
    public function dataGuru(Request $request, Guru $guru)
    {
        return view('admin.dataGuru', compact('guru'));
    }
    
    public function getDatatableGuru(Request $request)
    {
        $user = Auth::user();
    
        $sekolahId = $user->sekolah ? $user->sekolah->id : null;

        if (!$sekolahId) {
            return DataTables::of(collect())->make(true);
        }

        $guru = Guru::where('id_sekolah', $sekolahId)->with('sekolah')->get();
        
        return DataTables::of($guru)
            ->addIndexColumn()
            ->addColumn('nama_sekolah', function ($guru) {
                return $guru->sekolah ? $guru->sekolah->nama : '-';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function tambahDataGuru() 
    {
        return view('admin.tambahDataGuru');
    }
    
    public function storeDataGuru(GuruCreateRequest $request) 
    {
        $user = Auth::user();
        $sekolah = $user->sekolah;
    
        $file1 = $request->file('gambar');
        $fileName = time() . '_' . $file1->getClientOriginalName();
        $file1->move('storage/gambar_guru', $fileName);

        Guru::create([
            'id_sekolah' => $sekolah->id,
            'nama' => $request->nama,
            'pendidikan' => $request->pendidikan,
            'kategori_kepegawaian' => $request->kategori_kepegawaian,
            'status' => $request->status,
            'jabatan' => $request->jabatan,
            'gambar' => '/storage/gambar_guru/' . $fileName,
        ]);

        return redirect()->route('dataGuru')->with('success', 'Data Guru Berhasil dibuat.');
    }

    public function editDataGuru(Guru $guru) 
    {
        return view('admin.editDataGuru', compact('guru'));
    }
    
    public function updateDataGuru(Request $request, Guru $guru)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'pendidikan' => 'required',
            'kategori_kepegawaian' => 'required',
            'status' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('editDataGuru', ['guru' => $guru->id])
                ->withErrors($validator)
                ->withInput(); 
        }

        $guru->nama = $request->nama;
        $guru->pendidikan = $request->pendidikan;
        $guru->kategori_kepegawaian = $request->kategori_kepegawaian;
        $guru->status = $request->status;
        $guru->jabatan = $request->jabatan;

        if ($request->hasFile('gambar')) {
            $imagePath = public_path($guru->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('storage/gambar_guru', $fileName);
            $guru->gambar = '/storage/gambar_guru/' . $fileName;
        }

        $guru->save();
            
        return redirect()->route('dataGuru')
            ->with('success', 'Data Guru Berhasil diubah.');
    }
    
    public function deleteDataGuru(Request $request, Guru $guru)
    {
        $imagePath = public_path($guru->gambar);
        if (file_exists($imagePath))
            unlink($imagePath);
        
        $guru->delete();
        return redirect()->route('dataGuru')->with('success', 'Data Guru berhasil dihapus.');
    }
}