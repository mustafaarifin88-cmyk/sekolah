<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-animated fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/') ?>">
            <img src="<?= base_url('uploads/identitas/logo.png') ?>" alt="Logo" class="rounded-circle bg-white p-1 me-2" style="width:40px; height:40px; object-fit:cover;">
            <span class="fw-bold fs-5">SIS Web</span>
        </a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-semibold">
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/') ?>">Beranda</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('berita') ?>">Pusat Informasi</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown">Akademik</a>
                    <ul class="dropdown-menu border-0 shadow-lg rounded-4">
                        <li><a class="dropdown-item" href="#">Kurikulum</a></li>
                        <li><a class="dropdown-item" href="#">Direktori Guru</a></li>
                        <li><a class="dropdown-item" href="#">Direktori Siswa</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Kesiswaan</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Sarpras</a></li>
                <li class="nav-item ms-lg-3">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-primary shadow-sm" id="btn-cek-kelulusan" data-bs-toggle="modal" data-bs-target="#modalKelulusan">
                        Cek Kelulusan
                    </button>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-outline-light rounded-pill px-4 fw-bold shadow-sm" href="<?= base_url('login') ?>">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>