@extends('layout.admin')
@section('title', 'Edit Data Pengguna')

@section('content')

    <div class="container-fluid z-0">
        <div class="row">
            <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto col-lg-10 px-md-4 py-4">
                <h2 class="fw-medium h2"><u>Edit Data pengguna (Superadmin)</u></h2>
            </div>
            <div class="col-lg-9 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
                <form action="{{ route('updateDataPengguna', ['user' => $user->id]) }}" id="userForm" method="post" class="w-75">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 ">
                        <label for="name" class="form-label">Nama
                        </label>
                        <input type="text" class="form-control border border-dark {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="Masukkan nama admin"
                            value="{{ $user->name }}" />
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                <b>{{ $errors->first('name') }}</b>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex gap-1 justify-content-between mt-3">
                        <div class="mb-3 col-5 ">
                            <label for="email" class="form-label">Email
                            </label>
                            <input type="email" class="form-control border border-dark {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Masukkan email admin"
                                value="{{ $user->email }}" />
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    <b>{{ $errors->first('email') }}</b>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3 col-5 ">
                            <label for="no_telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control border border-dark {{ $errors->has('no_telepon') ? 'is-invalid' : '' }}" name="no_telepon" id="no_telepon"
                                placeholder="Masukkan nomor telepon pengguna" value="{{ $user->no_telepon }}" />
                            @if ($errors->has('no_telepon'))
                                <div class="invalid-feedback">
                                    <b>{{ $errors->first('no_telepon') }}</b>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-select border border-dark" required>
                            <option value="0">Pilih Role</option>
                            <option value="admin" @if ($user->hasRole('admin')) selected @endif>Admin Sekolah</option>
                            <option value="superadmin" @if ($user->hasRole('superadmin')) selected @endif>Super Admin</option>
                        </select>
                        @error('role')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-end my-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
