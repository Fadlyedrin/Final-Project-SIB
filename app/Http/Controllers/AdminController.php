<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
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
    public function dataSekolah() 
    {
        return view('admin.dataSekolah');
    }
    public function dataSekolahSuperadmin() 
    {
        return view('superadmin.dataSekolah');
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

    //Kelola data pengguna
    public function dataPengguna(Request $request, User $user)
    {
        return view('superadmin.dataPengguna', compact('user'));
    }

    public function getDatatable(Request $request)
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
        ->addColumn('action', function ($user) {
            return '<a href="'.route('editDataPengguna', ['user' => $user->id]) .'" class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-sm btn-danger delete-btn" data-user-id="'.$user->id.'" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash-fill"></i></button>';
        })
        ->rawColumns(['action'])
        ->make(true);
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
            'password' => $request->filled('password') ? 'required|min:8|confirmed' : '',
            'role' => 'required|not_in:0',
        ]);

        if ($validator->fails()) {
            return redirect()->route('editDataPengguna', ['user' => $user->id])
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
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
        // $user = User::find($user->id);

        if (Auth::id() == $user->id) {
            return redirect()->back()->with('delete_error', 'You cannot delete yourself');
        }

        $user->delete();
        return redirect()->route('dataPengguna')->with('success', 'Data Admin berhasil dihapus.');
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
}