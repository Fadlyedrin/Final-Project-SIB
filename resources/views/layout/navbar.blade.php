<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ ('/') }}"
          ><img src="{{asset('assets/logo.png')}}" alt=""
        /></a>
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
              <a
                class="nav-link fw-bold text-light"
                href="{{ ('/') }}"
                >Beranda</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-light" href="#about"
                >Tentang Kami</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-light" href="#footer">Kontak</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>