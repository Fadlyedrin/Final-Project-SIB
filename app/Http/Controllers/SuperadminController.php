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

class SuperadminController extends Controller
{
    //Kelola data pengguna
    public function dataPengguna(Request $request, User $user)
    {
        return view('superadmin.dataPengguna', compact('user'));
    }

    public function getDatatablePengguna(Request $request)
    {
        $users = User::with(['sekolah', 'roles'])->get();
        
        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('nama_sekolah', function ($user) {
                return $user->sekolah ? $user->sekolah->nama : '-';
            })
            ->addColumn('role', function ($user) {
                return $user->roles->first() ? $user->roles->first()->name : '-';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
    public function tambahDataPengguna() 
    {
        return view('superadmin.tambahDataPengguna');
    }
    public function storeDataPengguna(UserCreateRequest $request) 
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telepon' => $request->no_telepon, 
        ]);

        $roleName = $request->role == 'superadmin' ? 'superadmin' : 'admin';
        $role = Role::where('name', $roleName)->first();

        if ($role) {
            $user->assignRole($role);
        }

        return redirect()->route('dataPengguna')->with('success', 'Data Admin Berhasil dibuat.');
    }

    public function editDataPengguna(User $user) 
    {
        return view('superadmin.editDataPengguna', compact('user'));
    }
    
    public function updateDataPengguna(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => $request->email != $user->email ? 'required|email|unique:user,email' : 'required|email',
            'role' => 'required|not_in:0',
        ]);

        if ($validator->fails()) {
            return redirect()->route('editDataPengguna', ['user' => $user->id])
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_telepon = $request->no_telepon;
        
        $roleName = $request->role == 'superadmin' ? 'superadmin' : 'admin';
        $role = Role::where('name', $roleName)->first();

        if ($role) {
            $user->assignRole($role);
        }
        
        $user->save();
            
        return redirect()->route('dataPengguna')
        ->with('success', 'Data Admin Berhasil diubah.');
    }

    public function deleteDataPengguna(Request $request, User $user)
    {
        if (Auth::id() == $user->id) {
            return redirect()->back()->with('delete_error', 'You cannot delete yourself');
        }

        $user->delete();
        return redirect()->route('dataPengguna')->with('success', 'Data Admin berhasil dihapus.');
    }
    
    //Kelola data sekolah superadmin
    public function dataSekolahSuperadmin(Request $request, Sekolah $sekolah)
    {
        return view('superadmin.dataSekolah', compact('sekolah'));
    }
    
    public function getDatatableSekolah(Request $request)
    {
        $sekolah = Sekolah::with(['user'])->get();
        
        return DataTables::of($sekolah)
            ->addIndexColumn()
            ->addColumn('nama_user', function ($sekolah) {
                return $sekolah->user ? $sekolah->user->name : '-';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function tambahDataSekolahSuperadmin() 
    {
        $adminRole = Role::where('name', 'admin')->first();
        $admins = $adminRole->users()->whereDoesntHave('sekolah')->get();

        return view('superadmin.tambahDataSekolah', compact('admins'));
    }
    
    public function storeDataSekolahSuperadmin(SekolahCreateRequest $request) 
    {
        $file1 = $request->file('logo');
        $fileName = time() . '_' . $file1->getClientOriginalName();
        $file1->move('storage/logo_sekolah', $fileName);

        $sekolah = Sekolah::create([
            'id_user' => $request->admin,
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

        return redirect()->route('dataSekolahSuperadmin')->with('success', 'Data Sekolah Berhasil dibuat.');
    }

    public function editDataSekolahSuperadmin(Sekolah $sekolah) 
    {
        return view('superadmin.editDataSekolah', compact('sekolah'));
    }
    
    public function updateDataSekolahSuperadmin(Request $request, Sekolah $sekolah)
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
            
        return redirect()->route('dataSekolahSuperadmin')
            ->with('success', 'Data Sekolah Berhasil diubah.');
    }
    
    public function deleteDataSekolahSuperadmin(Request $request, Sekolah $sekolah)
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
        return redirect()->route('dataSekolahSuperadmin')->with('success', 'Data Sekolah berhasil dihapus.');
    }
}