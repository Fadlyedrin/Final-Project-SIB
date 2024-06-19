@extends('layout.main')
@section('title', 'Dashboard Sekolah')

@section('content')
    <div class="container" style="margin-top: 80px; height: 100%">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset($sekolah->gambarSekolah->first()->gambar) }}" class="object-fit-cover" height="550" width="1287" alt="banner-sekolah"  />
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 150px">
                <h1>Tentang Sekolah</h1>
            </div>
            <div class="col-6 mt-5">
                <img src="{{ asset($sekolah->gambarSekolah->first()->gambar) }}" class="object-fit-cover" width="635" height="570" alt="gambar-sekolah" />
            </div>
            <div class="col-6 mt-5">
                <p>{!! nl2br(e($sekolah->deskripsi)) !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 180px">
                <h1>Visi & Misi</h1>
            </div>
            <div class="col-6 mt-5">
                <img src="{{ asset($sekolah->logo) }}" width="635" height="570" class="object-fit-cover" alt="gambar-sekolah" />
            </div>
            <div class="col-6 mt-5">
                <h2>Visi</h2>
                <p>{!! nl2br(e($sekolah->visi)) !!}</p>
                <h2>Misi</h2>
                <p>{!! nl2br(e($sekolah->misi)) !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 150px">
                <h2 class="mb-4">Lokasi</h2>
                {!! $sekolah->lokasi !!}
                </div>
            </div>
        </div>
    </div>
@endsection
