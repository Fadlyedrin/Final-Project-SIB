@extends('layout.master')
@section('title', 'Dashboard')

@section('content')

<main>
      <section class="hero" id="hero">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
              <div class="search-form">
                <form role="search">
                  <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Cari Sekolah ..."
                    aria-label="Search"
                  />
                  <button><i class="bi bi-search"></i></button>
                </form>
              </div>
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
              <h1 class="fw-bold">Info Terkini</h1>
              <div class="col-8 offset-2 mt-4 w-100 d-flex">
                <div>
                  <h2 class="my-3 fw-bold">Judul info</h2>
                  <p>1 day ago</p>
                  <p class=" my-3" style="width: 80%;">
                    Deskripsi singkat. Lorem ipsum dolor sit amet consectetur.
                    Ac dignissim sed volutpat sed sit est. Eleifend nam sed
                    congue egestas morbi aliquam tristique. Nunc interdum sed
                    scelerisque aliquam
                  </p>
                </div>
                <div class="m-auto">
                  <img src="assets/gambar-info.png" width="150" alt="" />
                </div>
              </div>
              <div class="col-8 offset-2 mt-4 w-100 d-flex">
                <div>
                  <h2 class="my-3 fw-bold">Judul info</h2>
                  <p>1 day ago</p>
                  <p class=" my-3" style="width: 80%;">
                    Deskripsi singkat. Lorem ipsum dolor sit amet consectetur.
                    Ac dignissim sed volutpat sed sit est. Eleifend nam sed
                    congue egestas morbi aliquam tristique. Nunc interdum sed
                    scelerisque aliquam
                  </p>
                </div>
                <div class="m-auto">
                  <img src="assets/gambar-info.png" width="150" alt="" />
                </div>
              </div>
              <div class="d-flex justify-content-center mt-4">
                <a class="text-light text-decoration-none" href="{{ route('infosekolah') }}"><button class="btn btn-primary fw-bold px-5">Info Lain</button></a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="sekolah">
        <div class="container">
          <div class="row mt-5">
            <div class="col-9 offset-1">
              <h1 class="fw-bold">Pilih SMA</h1>
              <div class="col-8 offset-2 mt-4 w-100 d-flex">
                <div>
                  <h2 class="my-3 fw-bold">SMA 1</h2>
                  <p>1 day ago</p>
                  <p class="my-3" style="width: 80%;">
                    Deskripsi singkat. Lorem ipsum dolor sit amet consectetur.
                    Ac dignissim sed volutpat sed sit est. Eleifend nam sed
                    congue egestas morbi aliquam tristique. Nunc interdum sed
                    scelerisque aliquam
                  </p>
                </div>
                <div class="m-auto">
                  <img src="assets/gambar-info.png" width="150" alt="" />
                </div>
              </div>
              <div class="col-8 offset-2 mt-4 w-100 d-flex">
                <div>
                  <h2 class="my-3 fw-bold">SMA 1</h2>
                  <p>1 day ago</p>
                  <p class=" my-3" style="width: 80%;">
                    Deskripsi singkat. Lorem ipsum dolor sit amet consectetur.
                    Ac dignissim sed volutpat sed sit est. Eleifend nam sed
                    congue egestas morbi aliquam tristique. Nunc interdum sed
                    scelerisque aliquam
                  </p>
                </div>
                <div class="m-auto">
                  <img src="assets/gambar-info.png" width="150" alt="" />
                </div>
              </div>
              <div class="d-flex justify-content-center mt-4">
                <a class="text-light text-decoration-none" href="{{ route('sekolah') }}"><button class="btn btn-primary fw-bold px-5">SMA Lain</button></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

@endsection