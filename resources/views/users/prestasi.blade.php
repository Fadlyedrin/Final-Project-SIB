@extends('layout.master2')
@section('title', 'Prestasi Sekolah')

@section('content')

      <div class="container">
        <div class="row" style="margin-top: 50px">
          <div class="col-lg-5 col-md-5 mb-4 mb-lg-0">
            <a href="{{ route('detailPrestasi') }}">            
            <img
              src="assets/gambarinfo2.png"
              class="w-100 shadow-1-strong rounded mb-4 object-fit-cover"
              alt="Prestasi Sekolah"
              width="425"
              height="470"
            /></a>

            <a href="{{ route('detailPrestasi') }}">
            <img
              src="assets/gambarinfo2.png"
              class="w-100 shadow-1-strong rounded mb-4 object-fit-cover"
              alt="Prestasi Sekolah"
              width="425"
              height="470"
            /></a>
          </div>

          <div class="col-lg-4 mb-4 mb-lg-0">
            <a href="{{ route('detailPrestasi') }}">
            <img
              src="assets/gambarinfo2.png"
              class="w-100 shadow-1-strong rounded mb-4 object-fit-cover"
              alt="Prestasi Sekolah"
              width="425"
              height="380"
            />
            </a>

            <a href="{{ route('detailPrestasi') }}">
            <img
              src="assets/gambarinfo2.png"
              class="w-100 shadow-1-strong rounded mb-4 object-fit-cover"
              alt="Prestasi Sekolah"
              width="425"
              height="380"
            />
            </a>
          </div>

          <div class="col-lg-3 mb-4 mb-lg-0">
            <a href="{{ route('detailPrestasi') }}">
            <img
              src="assets/gambarinfo2.png"
              class="w-100 shadow-1-strong rounded mb-4 object-fit-cover"
              alt="Prestasi Sekolah"
              width="425"
              height="300"
            />
            </a>

            <a href="{{ route('detailPrestasi') }}">
            <img
              src="assets/gambarinfo2.png"
              class="w-100 shadow-1-strong rounded mb-4 object-fit-cover"
              alt="Prestasi Sekolah"
              width="425"
              height="300"
            />
            </a>
          </div>
        </div>
      </div>


@endsection