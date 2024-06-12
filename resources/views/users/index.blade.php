@extends('layout.master')
@section('title', 'Dashboard')

@section('content')

    <main>
        <section class="hero" id="hero">
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

                <div class="row" style="margin-top: 50px">
                    <div class="col-7 offset-1" style="margin-top: 80px">
                        <h1 class="my-3 fw-bold" style="font-size: 31px;">Temukan Informasi Terbaru SMA Pilihanmu</h1>
                        <p class=" my-3">
                            Tetap update dengan berita terbaru seputar pendidikan di Kota X,
                            mulai dari prestasi sekolah hingga acara penting. SchoolHub adalah sumber terpercaya untuk memilih SMA terbaik dan
                            mengikuti perkembangan pendidikan di Kota X.
                        </p>
                        <a class="text-light text-decoration-none" href="{{ route('sekolah') }}"><button class="btn btn-primary fw-bold px-5">Telusuri SMA</button></a>
                    </div>
                    <div class="col-4">
                        <img src="assets/hero-image.png" alt="" />
                    </div>
                </div>
            </div>
        </section>

        <section class="about d-flex align-items-center" id="about">
            <div class="container" style="margin-top: 50px; margin-bottom: 50px">
                <div class="row">
                    <div class="col-9 offset-1 text-light">
                        <h1 class="mb-4">Tentang Kami</h1>
                        <p>
                            Selamat datang di SchoolHub, portal informasi terlengkap untuk
                            para pelajar, orang tua, dan pendidik di Kota X! Kami
                            menyediakan kumpulan profil SMA dari seluruh Kota X, memberikan
                            gambaran menyeluruh mengenai setiap sekolah. Temukan sekolah
                            yang tepat dengan mudah melalui informasi detail mengenai
                            sekolah, prestasi, pengajar, dan lain sebagainya.
                        </p>
                        <p>
                            Selain itu, tetap terhubung dengan berita terbaru seputar dunia
                            pendidikan di Kota X. Dapatkan update mengenai prestasi sekolah,
                            kemenangan dalam lomba, acara penting, dan banyak lagi.
                            SchoolHub adalah sumber informasi terpercaya yang membantu Anda
                            menemukan dan memilih SMA terbaik serta mengikuti perkembangan
                            terkini di dunia pendidikan Kota X.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="info">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-9 offset-1">
                        <h1 class="fw-bold mb-5">Info Terkini</h1>
                        @foreach ($infos as $info)
                            <div class="col-8 offset-1 mt-4 w-100 d-flex">
                                <div>
                                    <a href="{{ route('detailInfo', ['info' => $info->id]) }}" class="my-4 mb-5 fw-bold text-dark text-decoration-none">{{ $info->judul }}</a>
                                    <p>{{ $info->created_at->diffForHumans() }}</p>
                                    <p class="my-3" style="width: 90%; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                        {{ $info->deskripsi }}</p>
                                </div>
                                <div class="m-auto">
                                    <a href="{{ route('detailInfo', ['info' => $info->id]) }}"><img src="{{ $info->gambarInfo->first() ? asset($info->gambarInfo->first()->gambar) : asset('assets/gambar-info.png') }}" width="150" alt="Gambar Info" /></a>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-center mt-4">
                            <a class="text-light text-decoration-none" href="{{ route('infoSekolah') }}"><button class="btn btn-primary fw-bold px-5">Info Lain</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sekolah">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-9 offset-1">
                        <h1 class="fw-bold mb-5">Pilih SMA</h1>
                        @foreach ($sekolahs as $sekolah)
                            <div class="col-8 offset-1 mt-4 w-100 d-flex">
                                <div>
                                    <a href="{{ route('dashboardSekolah', ['sekolah' => $sekolah->id]) }}" class="my-4 mb-5 fw-bold text-dark text-decoration-none">{{ $sekolah->nama }}</a>
                                    <p>{{ $sekolah->created_at->diffForHumans() }}</p>
                                    <p class="my-3" style="width: 90%; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                        {{ $sekolah->deskripsi }}</p>
                                </div>
                                <div class="m-auto">
                                    <a href="{{ route('dashboardSekolah', ['sekolah' => $sekolah->id]) }}"><img src="{{ $sekolah->logo ? asset($sekolah->logo) : asset('assets/inputfoto.png') }}" width="150" height="150" alt="Gambar Info" /></a>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-center mt-4">
                            <a class="text-light text-decoration-none" href="{{ route('sekolah') }}"><button class="btn btn-primary fw-bold px-5">SMA Lain</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
