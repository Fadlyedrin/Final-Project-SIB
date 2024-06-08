@extends('layout.master2')
@section('title', 'Detail Prestasi')

@section('content')


    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
              <h1 class="mb-4">Detail Prestasi</h1>
            </div>
            <div class="col-6 mt-5 ">
              <img src="assets/banner2.png" width="635" height="570" alt="" />
            </div>
            <div class="col-6 mt-5">
                <h4 class="fw-bold">JUDUL PRESTASI YANG DIRAIH</h4>
                <P class="mb-5">Waktu Prestasi diraih</P>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. 
              </p>

            <a class="text-light text-decoration-none" href="{{ route('prestasi') }}">
                <button class="btn btn-dark fw-bold px-5">Prestasi Lainnya<i class="bi bi-arrow-right"></i
            ></button></a>
            </div>
          </div>
    </div>


@endsection