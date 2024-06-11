@extends('layout.admin')
@section('title', 'Tambah Data Guru')

@section('content')

    <div class="container-fluid z-0">
        <div class="row">
            <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto col-lg-10 px-md-4 py-4">
                <h2 class="fw-medium h2"><u>Tambah Data Guru</u></h2>
            </div>
            <div class="col-lg-9 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
                <form action="{{ route('storeDataGuru') }}" id="guruForm" method="post" class="w-75" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="selectedImage3" class="form-label">Foto</label>
                        <div class="mb-4 d-flex">
                            <img id="selectedImage3" src="assets/inputfoto.png" alt="gambar guru" style="width: 300px" />
                        </div>
                        <div class="d-flex">
                            <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                <label class="form-label text-white m-1" for="customFile3">Choose file</label>
                                <input type="file" class="form-control d-none {{ $errors->has('logo') ? 'is-invalid' : '' }}" name="gambar" id="customFile3"
                                    onchange="displaySelectedImage(event, 'selectedImage3')" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-1 justify-content-between mt-3">
                        <div class="mb-3 col-5 ">
                            <label for="nama" class="form-label">Nama Guru
                            </label>
                            <input type="text" class="form-control border border-dark {{ $errors->has('nama') ? 'is-invalid' : '' }}" placeholder="Masukkan nama guru" name="nama" id="nama"
                                value="{{ old('nama') }}" />
                            @if ($errors->has('nama'))
                                <div class="invalid-feedback">
                                    <b>{{ $errors->first('nama') }}</b>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3 col-5 ">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <input type="text" class="form-control border border-dark {{ $errors->has('pendidikan') ? 'is-invalid' : '' }}" placeholder="Masukkan pendidikan guru" name="pendidikan"
                                id="pendidikan" value="{{ old('pendidikan') }}" />
                            @if ($errors->has('pendidikan'))
                                <div class="invalid-feedback">
                                    <b>{{ $errors->first('pendidikan') }}</b>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex gap-1 justify-content-between mt-3">
                        <div class="mb-3 col-5 ">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select border border-dark" required>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Pilih Status</option>
                                <option value="PNS" {{ old('status') == 'PNS' ? 'selected' : '' }}>PNS</option>
                                <option value="honorer" {{ old('status') == 'honorer' ? 'selected' : '' }}>Honorer</option>
                                <option value="kontrak" {{ old('status') == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                            </select>
                            @error('status')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-5 ">
                            <label for="kategori_kepegawaian" class="form-label">Kategori Kepegawaian</label>
                            <select name="kategori_kepegawaian" class="form-select border border-dark" required>
                                <option value="0" {{ old('kategori_kepegawaian') == '0' ? 'selected' : '' }}>Pilih Kepegawaian</option>
                                <option value="Tenaga Pendidik" {{ old('kategori_kepegawaian') == 'Tenaga Pendidik' ? 'selected' : '' }}>Tenaga Pendidik</option>
                                <option value="Tenaga Teknis" {{ old('kategori_kepegawaian') == 'Tenaga Teknis' ? 'selected' : '' }}>Tenaga Teknis</option>
                            </select>
                            @error('kategori_kepegawaian')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control border border-dark {{ $errors->has('jabatan') ? 'is-invalid' : '' }}" placeholder="Masukkan jabatan guru" name="jabatan" id="jabatan"
                            value="{{ old('jabatan') }}" />
                        @if ($errors->has('jabatan'))
                            <div class="invalid-feedback">
                                <b>{{ $errors->first('jabatan') }}</b>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-end my-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
