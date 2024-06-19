<nav class="navbar top-bar">
    <div class="container p-2">
        <p class="my-auto">{{ $sekolah->email }}</p>
        <p class="my-auto">
            {{ preg_replace('/(\d{4})(\d{4})(\d{4})/', '$1-$2-$3', $sekolah->no_telepon) }}
        </p>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light nav-school sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('assets/logo2.png') }}" alt="" /></a>
        <img class="navbar-brand object-fit-contain" src="{{ asset($sekolah->logo) }}" width="80px" height="80px" alt="Logo sekolah" />
        <p class="navbar-brand fw-bold my-auto">{{ $sekolah->nama }}</p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/*') ? 'active' : '' }}" aria-current="{{ request()->is('dashboard') ? 'page' : false }}"
                        href="{{ route('dashboardSekolah', ['sekolah' => $sekolah->id]) }}">Tentang
                        Sekolah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('guru/*') ? 'active' : '' }}" aria-current="{{ request()->is('guru') ? 'page' : false }}"
                        href="{{ route('guru', ['sekolah' => $sekolah->id]) }}">Data Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('prestasi/*', 'detailprestasi/*') ? 'active' : '' }}" aria-current="{{ request()->is('prestasi') ? 'page' : false }}"
                        href="{{ route('prestasi', ['sekolah' => $sekolah->id]) }}">Prestasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('info/*', 'detailinfo/*') ? 'active' : '' }}" aria-current="{{ request()->is('info') ? 'page' : false }}"
                        href="{{ route('info', ['sekolah' => $sekolah->id]) }}">Info
                        Terkini</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
