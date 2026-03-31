<?php
$identitasModel = new \App\Models\IdentitasSekolahModel();
$identitas = $identitasModel->first();
$logoFrontend = ($identitas && !empty($identitas['logo_sekolah'])) ? base_url('uploads/identitas/' . $identitas['logo_sekolah']) : base_url('assets/dist/img/AdminLTELogo.png');
$namaFrontend = ($identitas && !empty($identitas['nama_sekolah'])) ? $identitas['nama_sekolah'] : 'SIS Web';

$menuModel = new \App\Models\MenuEksternalModel();
$menuEksternal = $menuModel->orderBy('urutan', 'ASC')->findAll();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-animated fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/') ?>">
            <img src="<?= $logoFrontend ?>" alt="Logo Sekolah" class="rounded-circle bg-white p-1 me-2 shadow-sm" style="width:45px; height:45px; object-fit:contain;">
            <span class="fw-bold fs-5 text-truncate" style="max-width: 200px;" title="<?= $namaFrontend ?>"><?= strtoupper($namaFrontend) ?></span>
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-semibold align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('/') ?>">Beranda</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('berita') ?>">Pusat Informasi</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Akademik</a>
                    <ul class="dropdown-menu border-0 shadow-lg rounded-4 mt-2" aria-labelledby="akademikDropdown">
                        <li><a class="dropdown-item py-2" href="#">Kurikulum</a></li>
                        <li><a class="dropdown-item py-2" href="#">Direktori Guru</a></li>
                        <li><a class="dropdown-item py-2" href="#">Direktori Siswa</a></li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Kesiswaan</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Sarpras</a>
                </li>

                <?php if(isset($menuEksternal) && count($menuEksternal) > 0): ?>
                    <?php foreach($menuEksternal as $m): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= $m['link_eksternal'] ?>" target="_blank"><?= $m['nama_menu'] ?></a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>

                <li class="nav-item ms-lg-3 mt-3 mt-lg-0 mb-2 mb-lg-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold text-primary shadow-sm w-100" data-bs-toggle="modal" data-bs-target="#modalKelulusan">
                        <i class="fas fa-graduation-cap me-1"></i> Cek Kelulusan
                    </button>
                </li>
                
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-outline-light rounded-pill px-4 py-2 fw-bold shadow-sm w-100" href="<?= base_url('login') ?>">
                        <i class="fas fa-sign-in-alt me-1"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>