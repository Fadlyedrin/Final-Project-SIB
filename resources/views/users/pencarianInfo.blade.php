@extends('layout.master')
@section('title', 'Pencarian Info')

@section('content')

      <section id="hero" style="margin-top: 100px;">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
              <div class="search-form">
                <form role="search">
                  <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Cari Info ..."
                    aria-label="Search"
                  />
                  <button href="#"><i class="bi bi-search"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="sekolah">
        <div class="container">
          <div class="row mt-5">
            <div class="col-9 offset-1">
              <div class="col-8 offset-2 mt-4 w-100 d-flex p-2">
                <div>
                  <a href="{{ route('info') }}" class="my-3 fw-bold text-dark text-decoration-none">Judul Info</a>
                  <p>1 day ago</p>
                  <p class=" my-3" style="width: 80%;">
                    Deskripsi singkat. Lorem ipsum dolor sit amet consectetur.
                    Ac dignissim sed volutpat sed sit est. Eleifend nam sed
                    congue egestas morbi aliquam tristique. Nunc interdum sed
                    scelerisque aliquam
                  </p>
                </div>
                <div class="m-auto">
                  <a href="{{ route('info') }}"><img src="assets/gambar-info.png" width="150" alt="" /></a>
                </div>
              </div>
              <div class="col-8 offset-2 mt-4 w-100 d-flex p-2">
                <div>
                  <a href="{{ route('info') }}" class="my-3 fw-bold text-dark text-decoration-none">Judul Info</a>
                  <p>1 day ago</p>
                  <p class=" my-3" style="width: 80%;">
                    Deskripsi singkat. Lorem ipsum dolor sit amet consectetur.
                    Ac dignissim sed volutpat sed sit est. Eleifend nam sed
                    congue egestas morbi aliquam tristique. Nunc interdum sed
                    scelerisque aliquam
                  </p>
                </div>
                <div class="m-auto">
                  <a href="{{ route('info') }}"><img src="assets/gambar-info.png" width="150" alt="" /></a>
                </div>
              </div>
              <div class="col-8 offset-2 mt-4 w-100 d-flex p-2">
                <div>
                  <a href="{{ route('info') }}" class="my-3 fw-bold text-dark text-decoration-none">Judul Info</a>
                  <p>1 day ago</p>
                  <p class=" my-3" style="width: 80%;">
                    Deskripsi singkat. Lorem ipsum dolor sit amet consectetur.
                    Ac dignissim sed volutpat sed sit est. Eleifend nam sed
                    congue egestas morbi aliquam tristique. Nunc interdum sed
                    scelerisque aliquam
                  </p>
                </div>
                <div class="m-auto">
                  <a href="{{ route('info') }}"><img src="assets/gambar-info.png" width="150" alt="" /></a>
                </div>
              </div>
              <div class="col-8 offset-2 mt-4 w-100 d-flex p-2">
                <div>
                  <a href="{{ route('info') }}" class="my-3 fw-bold text-dark text-decoration-none">Judul Info</a>
                  <p>1 day ago</p>
                  <p class=" my-3" style="width: 80%;">
                    Deskripsi singkat. Lorem ipsum dolor sit amet consectetur.
                    Ac dignissim sed volutpat sed sit est. Eleifend nam sed
                    congue egestas morbi aliquam tristique. Nunc interdum sed
                    scelerisque aliquam
                  </p>
                </div>
                <div class="m-auto">
                  <a href="{{ route('info') }}"><img src="assets/gambar-info.png" width="150" alt="" /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    @endsection