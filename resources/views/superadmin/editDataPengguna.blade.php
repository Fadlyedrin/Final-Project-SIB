@extends('layout.admin')
@section('title', 'Edit Data Guru')

@section('content')

<div class="container-fluid z-0">
    <div class="row">
        <div
            class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto col-lg-10 px-md-4 py-4"
        >
            <h2 class="fw-medium h2"><u>Edit Data pengguna</u></h2>
        </div>
        <div class="col-lg-9 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
            <form method="" class="w-75">
                    <div class="mb-3 ">
                        <label for="namapengguna" class="form-label"
                            >Nama
                        </label>
                        <input
                            type="text"
                            class="form-control border border-dark"
                            id="namapengguna"
                        />
                    </div>
                <div class="d-flex gap-1 justify-content-between mt-3">
                    <div class="mb-3 col-5 ">
                        <label for="email" class="form-label"
                            >Email
                        </label>
                        <input
                            type="email"
                            class="form-control border border-dark"
                            id="email"
                        />
                    </div>

                    <div class="mb-3 col-5 ">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input
                            type="number"
                            class="form-control border border-dark"
                            id="telepon"
                        />
                    </div>
                </div>
                    <div class="mb-3 ">
                        <label for="password" class="form-label"
                            >Password
                        </label>
                        <input
                            type="password"
                            class="form-control border border-dark"
                            id="password"
                        />
                    </div>
                    <div class="mb-3 ">
                        <label for="password_confirmation" class="form-label"
                            >Konfirmasi Password
                        </label>
                        <input
                            type="password"
                            class="form-control border border-dark"
                            id="password_confirmation"
                        />
                    </div>
                    <div class="mb-3">
                         <label for="role" class="form-label"
                            >Role
                        </label>
                    <div class="dropdown">                       
                        <a class="btn btn-transparent border border-3 px-5 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pilih Role
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Admin</a></li>
                            <li><a class="dropdown-item" href="#">SuperAdmin</a></li>
                        </ul>
                    </div>    
                    </div>           
                <div class="d-flex justify-content-end my-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection