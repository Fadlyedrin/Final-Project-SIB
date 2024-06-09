<nav class="navbar top-bar">
        <div class="container p-2">
          <p class="my-auto">emailsekolah@gmail.com</p>
          <p class="my-auto">0811-2222-3333</p>
        </div>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-light nav-school sticky-top">
        <div class="container">
          <a class="navbar-brand" href="{{ ('/') }}"
            ><img src="assets/logo2.png" alt=""
          /></a>
            <img class="navbar-brand" src="assets/Logo-sekolah.png" alt=""
          />
          <p class="navbar-brand fw-bold my-auto" >Nama Sekolah</p>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="{{ request()->is('dashboard') ? 'page' : false }}" href="{{ route('dashboardSekolah') }}">Tentang Sekolah</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('guru') ? 'active' : '' }}" aria-current="{{ request()->is('guru') ? 'page' : false }}" href="{{ route('guru') }}">Data Guru</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('prestasi','detailprestasi') ? 'active' : '' }}" aria-current="{{ request()->is('prestasi') ? 'page' : false }}" href="{{ route('prestasi') }}">Prestasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('info','detailinfo') ? 'active' : '' }}" aria-current="{{ request()->is('info') ? 'page' : false }}" href="{{ route('info') }}">Info Terkini</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>