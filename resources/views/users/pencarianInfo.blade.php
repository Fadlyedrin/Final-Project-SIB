@extends('layout.master')
@section('title', 'Pencarian Info')

@section('content')
    <section id="hero" style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <form action="{{ route('cariInfo') }}" method="GET">
                        <div class="search-form">
                            <input class="form-control me-2" type="search" name="cari" placeholder="Cari Info ..." aria-label="Search" />
                            <button href="#hero"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="info vh-100">
        <div class="container">
            <div class="row mt-5">
                <div class="col-9 offset-1">
                    @foreach ($infos as $info)
                        <div class="col-8 offset-1 mt-4 w-100 d-flex p-2">
                            <div>
                                <a href="{{ route('detailInfo', ['info' => $info->id]) }}" class="my-4 mb-5 fw-bold text-dark text-decoration-none">{{ $info->judul }}</a>
                                <p>{{ $info->created_at->diffForHumans() }} | {{ $info->sekolah->nama }}</p>
                                <p class="my-3" style="width: 80%; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                    {{ $info->deskripsi }}</p>
                            </div>
                            <div class="m-auto">
                                <a href="{{ route('detailInfo', ['info' => $info->id]) }}"><img src="{{ $info->gambarInfo->first() ? asset($info->gambarInfo->first()->gambar) : asset('assets/gambar-info.png') }}" class="object-fit-cover rounded" width="150" height="150" alt="gambar info" /></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
