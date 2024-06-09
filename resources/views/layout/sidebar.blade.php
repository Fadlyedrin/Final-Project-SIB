
   <div class="container-fluid ">
    <div class="row">
        <nav class="navbar navbar-light p-4 z-2 top-bar sticky-top">
      <div
        class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-end"
      >
        <button
          class="navbar-toggler d-md-none collapsed mb-3"
          type="button"
          data-toggle="collapse"
          data-target="#sidebar"
          aria-controls="sidebar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="col-12 col-md-4 col-lg-2">
        <a href=""><i class="bi bi-bell text-light me-5" style="font-size: 25px"></i></a>
        <a href=""><button class="btn btn-primary " style="padding: 8px 18px">Keluar<i class="bi bi-box-arrow-right ms-2"></i></button></a>
      </div>
    </nav>
    </div>
   </div>
<div class="container-fluid">
    <div class="row">
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
      <a class="navbar-brand d-flex justify-content-center " href=""
        ><img src="assets/logo.png" class="img-fluid" alt="logo"
      /></a>
      <div class="position-sticky">
        <ul class="nav flex-column mt-5">
          <li class="nav-item mb-3">
            <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" aria-current="page" href="{{ route('index') }}">
              <i class="bi bi-house me-3 "></i>
              Utama
            </a>
          </li>

          {{-- superadmin --}}
          <li class="nav-item mb-3">
            <a class="nav-link {{ request()->is('datapengguna','tambahdatapengguna','editdatapengguna') ? 'active' : '' }}" aria-current="page" href="{{ route('dataPengguna') }}">
              <i class="bi bi-people-fill me-3 "></i>
              Data Pengguna
            </a>
          </li>
          {{-- superadmin --}}
          <li class="nav-item mb-3">
            <a class="nav-link {{ request()->is('datasekolah','tambahdatasekolah','editdatasekolah') ? 'active' : '' }}" href="{{ route('dataSekolah') }}">
              <i class="bi bi-bank me-3"></i>
              Data Sekolah
            </a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link {{ request()->is('dataguru','tambahdataguru','editdataguru') ? 'active' : '' }}" href="{{ route('dataGuru') }}">
                <i class="bi bi-pass me-3"></i>
              Data guru
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('datainfo','tambahdatainfo','editdatainfo') ? 'active' : '' }}" href="{{ route('dataInfo')}}">
              <i class="bi bi-clipboard-data me-3"></i></i>
              Info Terkini
            </a>
          </li>

        </ul>
      </div>
    </nav>
    </div>
</div>
