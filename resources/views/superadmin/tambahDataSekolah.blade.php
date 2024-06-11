@extends('layout.admin')
@section('title', 'Tambah Data Sekolah')

@section('content')

    <div class="container-fluid z-0">
        <div class="row">
            <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto col-lg-10 px-md-4 py-4">
                <h2 class="fw-medium h2"><u>Tambah Data Sekolah</u></h2>
            </div>
            <div class="col-lg-9 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
                <form action="{{ route('storeDataSekolahSuperadmin') }}" id="sekolahForm" method="post" class="w-75" enctype="multipart/form-data">
                    @csrf
                    <div class="image-form d-flex gap-3">
                        <div>
                            <label for="" class="form-label">Logo</label>
                            <div class="mb-4 d-flex justify-content-center">
                                <img id="selectedImage" src="assets/inputfoto.png" alt="gambar sekolah" style="width: 300px" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                                    <input type="file" class="form-control d-none {{ $errors->has('logo') ? 'is-invalid' : '' }}" name="logo" id="customFile1"
                                        onchange="displaySelectedImage(event, 'selectedImage')" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="" class="form-label">Foto Sekolah</label>
                            <div class="mb-4 d-flex justify-content-center">
                                <img id="selectedImage2" src="assets/inputfoto.png" alt="gambar sekolah" style="width: 300px" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="customFile2">Choose file</label>
                                    <input type="file" class="form-control d-none" name="gambar_sekolah[]" id="customFile2" onchange="displaySelectedImage(event, 'selectedImage2')" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="nama" class="form-label">Nama Sekolah</label>
                        <input type="text" class="form-control border border-dark {{ $errors->has('nama') ? 'is-invalid' : '' }}" placeholder="Masukkan nama sekolah" name="nama" id="nama"
                            aria-describedby="emailHelp" value="{{ old('nama') }}" />
                        @if ($errors->has('nama'))
                            <div class="invalid-feedback">
                                <b>{{ $errors->first('nama') }}</b>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex gap-1 justify-content-between">
                        <div class="mb-3 col-5">
                            <label for="email" class="form-label">Email
                            </label>
                            <input type="email" class="form-control border border-dark {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Masukkan Email sekolah" name="email" id="email"
                                aria-describedby="emailHelp" value="{{ old('email') }}" />
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    <b>{{ $errors->first('email') }}</b>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3 col-5">
                            <label for="no_telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control border border-dark {{ $errors->has('no_telepon') ? 'is-invalid' : '' }}" placeholder="Masukkan Telepon sekolah" name="no_telepon"
                                id="no_telepon" value="{{ old('no_telepon') }}" />
                            @if ($errors->has('no_telepon'))
                                <div class="invalid-feedback">
                                    <b>{{ $errors->first('no_telepon') }}</b>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control border border-dark {{ $errors->has('alamat') ? 'is-invalid' : '' }}" placeholder="Masukkan Alamat sekolah" name="alamat" id="alamat"
                            value="{{ old('alamat') }}" />
                        @if ($errors->has('alamat'))
                            <div class="invalid-feedback">
                                <b>{{ $errors->first('alamat') }}</b>
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control border border-dark {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" placeholder="Masukkan Deskripsi sekolah" name="deskripsi" id="deskripsi" rows="5">{{ old('deskripsi') }}</textarea>
                        @if ($errors->has('deskripsi'))
                            <div class="invalid-feedback">
                                <b>{{ $errors->first('deskripsi') }}</b>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex gap-1 justify-content-between">
                        <div class="mb-3 col-5">
                            <label for="visi" class="form-label">Visi </label>
                            <textarea class="form-control border border-dark {{ $errors->has('visi') ? 'is-invalid' : '' }}" placeholder="Masukkan Visi sekolah" name="visi" id="visi" rows="5">{{ old('visi') }}</textarea>
                            @if ($errors->has('visi'))
                                <div class="invalid-feedback">
                                    <b>{{ $errors->first('visi') }}</b>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3 col-5">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea class="form-control border border-dark {{ $errors->has('misi') ? 'is-invalid' : '' }}" placeholder="Masukkan Misi sekolah" name="misi" id="misi" rows="5">{{ old('misi') }}</textarea>
                            @if ($errors->has('misi'))
                                <div class="invalid-feedback">
                                    <b>{{ $errors->first('misi') }}</b>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <textarea class="form-control border border-dark {{ $errors->has('lokasi') ? 'is-invalid' : '' }}" placeholder="Masukkan kode embed lokasi sekolah" name="lokasi" id="lokasi" rows="1">{{ old('lokasi') }}</textarea>
                        @if ($errors->has('lokasi'))
                            <div class="invalid-feedback">
                                <b>{{ $errors->first('lokasi') }}</b>
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="admin" class="form-label">Admin</label>
                        <select name="admin" class="form-select border border-dark" required>
                            <option value="0" {{ old('admin') == '0' ? 'selected' : '' }}>Pilih Admin</option>
                            @foreach ($admins as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                        @error('admin')
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
