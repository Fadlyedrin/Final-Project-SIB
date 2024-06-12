@extends('layout.admin')
@section('title', 'Edit Info Terkini')

@section('content')

    <div class="container-fluid z-0">
        <div class="row">
            <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto col-lg-10 px-md-4 py-4">
                <h2 class="fw-medium h2"><u>Edit Info Terkini (Superadmin)</u></h2>
            </div>
            <div class="col-lg-9 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
                <form action="{{ route('updateDataInfoSuperadmin', ['info' => $info->id]) }}" id="infoForm" method="post" class="w-75" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div>
                        <label for="selectedImage3" class="form-label">Image</label>
                        <div class="mb-4 d-flex">
                            <img id="selectedImage3" src="{{ $info->gambarInfo->first() ? asset($info->gambarInfo->first()->gambar) : asset('assets/inputfoto.png') }}" alt="info terkini" style="width: 300px" />
                        </div>
                        <div class="d-flex">
                            <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                <label class="form-label text-white m-1" for="customFile3">Choose file</label>
                                <input type="file" class="form-control d-none" name="gambar_info[]" id="customFile3" onchange="displaySelectedImage(event, 'selectedImage3')" />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="sekolah" class="form-label">Sekolah</label>
                        <select name="sekolah" class="form-select border border-dark" required>
                            <option value="0" {{ old('sekolah') == '0' ? 'selected' : '' }}>Pilih SMA</option>
                            @foreach ($sekolahs as $sekolah)
                                <option value="{{ $sekolah->id }}" {{ old('sekolah', $info->id_sekolah) == $sekolah->id ? 'selected' : '' }}>{{ $sekolah->nama }}</option>
                            @endforeach
                        </select>
                        @error('sekolah')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" class="form-select border border-dark" required>
                            <option value="0">Pilih Status</option>
                            <option value="event" @if ($info->kategori == 'event') selected @endif>Event</option>
                            <option value="ppdb" @if ($info->kategori == 'ppdb') selected @endif>PPDB</option>
                            <option value="prestasi" @if ($info->kategori == 'prestasi') selected @endif>Prestasi</option>
                            <option value="lainnya" @if ($info->kategori == 'lainnya') selected @endif>Lainnya</option>
                        </select>
                        @error('kategori')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control border border-dark {{ $errors->has('judul') ? 'is-invalid' : '' }}" placeholder="Masukkan judul info" name="judul" id="judul"
                            value="{{ $info->judul }}" />
                        @if ($errors->has('judul'))
                            <div class="invalid-feedback">
                                <b>{{ $errors->first('judul') }}</b>
                            </div>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control border border-dark {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" placeholder="Masukkan deskripsi" name="deskripsi" id="deskripsi" rows="5">{{ $info->deskripsi }}</textarea>
                        @if ($errors->has('deskripsi'))
                            <div class="invalid-feedback">
                                <b>{{ $errors->first('deskripsi') }}</b>
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
