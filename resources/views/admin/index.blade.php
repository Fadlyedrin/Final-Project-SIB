@extends('layout.admin')
@section('title', 'Dashboard Admin')

@section('content')

    <div class="container-fluid z-0">
        <div class="row">
            @if (Auth::user()->hasRole('superadmin'))
                <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto col-lg-10 px-md-4 py-4">
                    <h2 class="fw-medium h2"><u>Selamat Datang Superadmin</u></h2>
                </div>
                <div class="col-lg-7 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
                    <div class="me-5">
                        <img src="assets/1.png" alt="">
                    </div>
                    <div>
                        <h4>Kelola Data Pengguna (Admin)</h4>
                        <p>Kelola data pengguna meliputi tambah, edit dan hapus</p>
                    </div>
                </div>
            @else
                <div class="col-lg-9 col-md-8 offset-lg-2 offset-md-3 ml-sm-auto col-lg-10 px-md-4 py-4">
                    <h2 class="fw-medium h2"><u>Selamat Datang Admin</u></h2>
                </div>
            @endif
            <div class="col-lg-7 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
                <div class="me-5">
                    <img src="assets/1.png" alt="">
                </div>
                <div>
                    <h4>Kelola Data Sekolah</h4>
                    <p>Kelola data sekolah meliputi tambah, edit dan hapus</p>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4 mb-2">
                <div class="me-5">
                    <img src="assets/2.png" alt="">
                </div>
                <div>
                    <h4>Kelola Data Guru</h4>
                    <p>Kelola data guru</p>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-3 col-md-8 offset-md-4 d-flex mt-4">
                <div class="me-5">
                    <img src="assets/3.png" alt="">
                </div>
                <div>
                    <h4>Kelola Info Sekolah</h4>
                    <p>Kelola data tentang info sekolah</p>
                </div>
            </div>
        </div>
    </div>


@endsection
