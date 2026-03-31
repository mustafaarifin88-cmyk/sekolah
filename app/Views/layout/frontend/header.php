<?php
$identitasModel = new \App\Models\IdentitasSekolahModel();
$identitas = $identitasModel->first();
$logoFrontend = ($identitas && !empty($identitas['logo_sekolah'])) ? base_url('uploads/identitas/' . $identitas['logo_sekolah']) : base_url('assets/dist/img/AdminLTELogo.png');
$namaFrontend = ($identitas && !empty($identitas['nama_sekolah'])) ? $identitas['nama_sekolah'] : 'SIS Web';

$menuModel = new \App\Models\MenuEksternalModel();
$menuEksternal = $menuModel->orderBy('urutan', 'ASC')->findAll();

$settingKelulusan = new \App\Models\SetKelulusanModel();
$isKelulusanAktif = $settingKelulusan->where('status', 'Aktif')->first();

$tema = $identitas['tema_header'] ?? 'theme-blue';
$gradienClass = '';
if($tema == 'theme-blue') $gradienClass = 'bg-gradient-blue';
elseif($tema == 'theme-dark') $gradienClass = 'bg-gradient-dark';
else $gradienClass = 'bg-gradient-animated';
?>

<style>
    .glass-navbar {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.4s ease;
    }
    .glass-navbar.scrolled {
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    .nav-link-custom {
        position: relative;
        color: #fff !important;
        font-weight: 600;
        padding: 0.5rem 1rem;
        transition: color 0.3s ease;
    }
    .glass-navbar.scrolled .nav-link-custom {
        color: #1e293b !important;
    }
    .nav-link-custom::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        background-color: #fff;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }
    .glass-navbar.scrolled .nav-link-custom::after {
        background-color: #4facfe;
    }
    .nav-link-custom:hover::after {
        width: 80%;
    }
    .btn-glow {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white !important;
        border: none;
        position: relative;
        z-index: 1;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .btn-glow::before {
        content: '';
        position: absolute;
        top: 0; left: -100%; width: 100%; height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        transition: all 0.5s ease;
        z-index: -1;
    }
    .btn-glow:hover::before {
        left: 100%;
    }
    .btn-glow:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(79, 172, 254, 0.4);
    }
    .bg-gradient-animated {
        background: linear-gradient(-45deg, #4e54c8, #8f94fb, #11998e, #38ef7d);
        background-size: 400% 400%;
        animation: gradientMove 15s ease infinite;
    }
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<nav class="navbar navbar-expand-lg fixed-top glass-navbar py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/') ?>">
            <img src="<?= $logoFrontend ?>" alt="Logo" class="rounded-circle shadow-sm me-2" style="width:50px; height:50px; object-fit:cover; border: 2px solid #fff;">
            <span class="fw-bolder fs-4 text-truncate text-white brand-text" style="max-width: 250px; letter-spacing: 1px; text-shadow: 0 2px 4px rgba(0,0,0,0.2);"><?= strtoupper($namaFrontend) ?></span>
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fas fa-bars fs-3 text-white toggler-icon"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto align-items-center gap-2">
                <li class="nav-item"><a class="nav-link nav-link-custom" href="<?= base_url('/') ?>">Beranda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-custom dropdown-toggle" href="#" data-bs-toggle="dropdown">Pusat Informasi</a>
                    <ul class="dropdown-menu border-0 shadow-lg rounded-4 overflow-hidden fade-down">
                        <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('berita') ?>"><i class="fas fa-newspaper me-2 text-primary"></i> Berita & Artikel</a></li>
                        <li><a class="dropdown-item py-2 fw-semibold" href="<?= base_url('pengumuman') ?>"><i class="fas fa-bullhorn me-2 text-warning"></i> Pengumuman</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-custom dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil Sekolah</a>
                    <ul class="dropdown-menu border-0 shadow-lg rounded-4 overflow-hidden fade-down">
                        <li><a class="dropdown-item py-2 fw-semibold" href="#"><i class="fas fa-info-circle me-2 text-info"></i> Tentang Kami</a></li>
                        <li><a class="dropdown-item py-2 fw-semibold" href="#"><i class="fas fa-bullseye me-2 text-danger"></i> Visi Misi</a></li>
                        <li><a class="dropdown-item py-2 fw-semibold" href="#"><i class="fas fa-chalkboard-teacher me-2 text-success"></i> Guru & Tendik</a></li>
                    </ul>
                </li>

                <?php if(isset($menuEksternal) && count($menuEksternal) > 0): ?>
                    <?php foreach($menuEksternal as $m): ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="<?= $m['link_eksternal'] ?>" target="_blank"><?= $m['nama_menu'] ?></a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>

            <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
                <?php if($isKelulusanAktif): ?>
                <button type="button" class="btn btn-glow rounded-pill px-4 py-2 fw-bold" data-bs-toggle="modal" data-bs-target="#modalKelulusan">
                    <i class="fas fa-graduation-cap me-2"></i>Cek Kelulusan
                </button>
                <?php endif; ?>
                
                <a href="<?= base_url('login') ?>" class="btn btn-light rounded-pill px-4 py-2 fw-bold text-primary shadow-sm hover-scale">
                    <i class="fas fa-sign-in-alt me-2"></i>Masuk
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('mainNav');
        const brandText = document.querySelector('.brand-text');
        const toggler = document.querySelector('.toggler-icon');
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
            brandText.classList.remove('text-white');
            brandText.classList.add('text-dark');
            if(toggler) {
                toggler.classList.remove('text-white');
                toggler.classList.add('text-dark');
            }
        } else {
            nav.classList.remove('scrolled');
            brandText.classList.add('text-white');
            brandText.classList.remove('text-dark');
            if(toggler) {
                toggler.classList.add('text-white');
                toggler.classList.remove('text-dark');
            }
        }
    });
</script>