@extends('layout.master')
@section('title', 'Pencarian Sekolah')

@section('content')
    <section id="hero" style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <form action="{{ route('cariSekolah') }}" method="GET">
                        <div class="search-form">
                            <input class="form-control me-2" type="search" name="cari" placeholder="Cari Sekolah ..." aria-label="Search" />
                            <button href="#hero"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="sekolah vh-100">
        <div class="container">
            <div class="row mt-5">
                <div class="col-9 offset-1">
                    @foreach ($sekolahs as $sekolah)
                        <div class="col-8 offset-1 mt-4 w-100 d-flex p-2">
                            <div>
                                <a href="{{ route('dashboardSekolah', ['sekolah' => $sekolah->id]) }}" class="my-4 mb-5 fw-bold text-dark text-decoration-none">{{ $sekolah->nama }}</a>
                                <p>{{ $sekolah->created_at->diffForHumans() }}</p>
                                <p class="my-3" style="width: 80%; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                    {{ $sekolah->deskripsi }}</p>
                            </div>
                            <div class="m-auto">
                                <a href="{{ route('dashboardSekolah', ['sekolah' => $sekolah->id]) }}"><img src="{{ asset($sekolah->logo) }}" class="object-fit-cover rounded" width="150" height="150" alt="" /></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
