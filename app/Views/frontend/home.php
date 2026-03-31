<?= $this->extend('layout/frontend/template') ?>

<?= $this->section('content') ?>
<?php helper('text'); ?>
<style>
    .hero-container {
        height: 100vh;
        width: 100%;
        position: relative;
        overflow: hidden;
        margin-top: -80px;
    }
    .carousel-item img {
        height: 100vh;
        object-fit: cover;
        filter: brightness(0.6);
        transform: scale(1.05);
        transition: transform 10s ease;
    }
    .carousel-item.active img {
        transform: scale(1);
    }
    .hero-glass-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 24px;
        padding: 40px;
        transform: translateY(50px);
        opacity: 0;
        animation: slideUpFade 1s cubic-bezier(0.16, 1, 0.3, 1) forwards 0.5s;
    }
    @keyframes slideUpFade {
        to { transform: translateY(0); opacity: 1; }
    }
    .section-profile {
        position: relative;
        z-index: 10;
        margin-top: -100px;
    }
    .profile-card {
        background: #ffffff;
        border-radius: 30px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border: none;
        overflow: hidden;
    }
    .profile-img-wrap {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    .profile-img-wrap::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; width: 100%; height: 50%;
        background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%);
    }
    .profile-img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .profile-img-wrap:hover .profile-img {
        transform: scale(1.05);
    }
    .profile-name-tag {
        position: absolute;
        bottom: 20px;
        left: 20px;
        z-index: 2;
    }
    .news-card {
        border: none;
        border-radius: 24px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        overflow: hidden;
    }
    .news-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .news-img-wrap {
        overflow: hidden;
        height: 240px;
        position: relative;
    }
    .news-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .news-card:hover .news-img {
        transform: scale(1.1);
    }
    .news-date-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(10px);
        padding: 8px 15px;
        border-radius: 12px;
        font-weight: 700;
        color: #4e54c8;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        z-index: 2;
    }
    .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .gradient-text {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>

<div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
        <div class="carousel-inner h-100">
            <?php if(isset($slider) && count($slider) > 0): ?>
                <?php foreach($slider as $key => $s): ?>
                <div class="carousel-item h-100 <?= $key == 0 ? 'active' : '' ?>">
                    <img src="<?= base_url('uploads/slider/' . $s['foto']) ?>" class="d-block w-100" alt="Slider">
                    <div class="carousel-caption d-flex align-items-center justify-content-start h-100 text-start" style="left: 8%; right: 8%;">
                        <div class="hero-glass-card col-lg-7 col-md-9">
                            <span class="badge bg-primary bg-opacity-25 text-white rounded-pill px-4 py-2 fs-6 mb-4 border border-white border-opacity-25">SELAMAT DATANG</span>
                            <h1 class="fw-bolder text-white display-4 mb-4" style="line-height: 1.2; text-shadow: 0 4px 10px rgba(0,0,0,0.3);"><?= $s['judul'] ?></h1>
                            <p class="text-white opacity-75 fs-5 mb-5 line-clamp-3"><?= $s['keterangan'] ?></p>
                            <a href="#profil-sekolah" class="btn btn-light rounded-pill px-5 py-3 fw-bold text-primary shadow-lg hover-scale">Jelajahi Sekarang <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="carousel-item h-100 active bg-gradient-animated">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
                        <div class="hero-glass-card text-center text-white p-5">
                            <h1 class="display-3 fw-bolder mb-3">Sistem Informasi Sekolah</h1>
                            <p class="fs-4 opacity-75 mb-0">Platform digital modern untuk layanan pendidikan terpadu.</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 bg-opacity-50" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-3 bg-opacity-50" aria-hidden="true"></span>
        </button>
    </div>
</div>

<div class="section-profile container" id="profil-sekolah">
    <div class="profile-card p-4 p-md-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="profile-img-wrap">
                    <?php $fotoKepsek = (isset($identitas['foto_kepsek']) && $identitas['foto_kepsek']) ? base_url('uploads/identitas/' . $identitas['foto_kepsek']) : base_url('assets/dist/img/avatar5.png'); ?>
                    <img src="<?= $fotoKepsek ?>" alt="Kepala Sekolah" class="profile-img">
                    <div class="profile-name-tag text-white">
                        <h4 class="fw-bold mb-1"><?= $identitas['nama_kepsek'] ?? 'Nama Kepala Sekolah' ?></h4>
                        <span class="badge bg-primary px-3 py-2 rounded-pill">Kepala Sekolah</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <h6 class="text-primary fw-bold tracking-wider text-uppercase mb-2">Prakata & Tujuan</h6>
                <h2 class="fw-bolder text-dark mb-4 display-6">Visi & Misi <span class="gradient-text">Sekolah</span></h2>
                <div class="text-secondary lh-lg fs-6">
                    <?php if(isset($identitas['visi_misi']) && !empty($identitas['visi_misi'])): ?>
                        <?= $identitas['visi_misi'] ?>
                    <?php else: ?>
                        <p>Visi dan misi sekolah belum diatur oleh administrator. Silakan perbarui melalui panel admin.</p>
                    <?php endif; ?>
                </div>
                <div class="mt-5 d-flex gap-3">
                    <div class="d-flex align-items-center bg-light rounded-pill px-4 py-3 border">
                        <i class="fas fa-graduation-cap fs-3 text-primary me-3"></i>
                        <div>
                            <h5 class="fw-bold m-0 text-dark">Pendidikan</h5>
                            <small class="text-muted">Berkualitas Tinggi</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center bg-light rounded-pill px-4 py-3 border">
                        <i class="fas fa-laptop-code fs-3 text-success me-3"></i>
                        <div>
                            <h5 class="fw-bold m-0 text-dark">Fasilitas</h5>
                            <small class="text-muted">Modern & Lengkap</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 mt-5">
    <div class="text-center mb-5">
        <h6 class="text-primary fw-bold tracking-wider text-uppercase mb-2">Informasi Publik</h6>
        <h2 class="fw-bolder text-dark display-6">Berita <span class="gradient-text">Terbaru</span></h2>
        <div class="mx-auto bg-primary rounded-pill mt-3" style="width: 60px; height: 5px;"></div>
    </div>

    <div class="row g-4">
        <?php if(isset($berita) && count($berita) > 0): ?>
            <?php foreach($berita as $b): ?>
            <div class="col-lg-4 col-md-6">
                <div class="news-card h-100 d-flex flex-column">
                    <div class="news-img-wrap">
                        <div class="news-date-badge">
                            <i class="far fa-calendar-alt me-1"></i> <?= date('d M Y', strtotime($b['tanggal_publish'])) ?>
                        </div>
                        <img src="<?= base_url('uploads/berita/' . $b['thumbnail']) ?>" class="news-img" alt="Thumbnail">
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <h4 class="fw-bold text-dark mb-3 line-clamp-2"><?= $b['judul_berita'] ?></h4>
                        <p class="text-secondary line-clamp-3 mb-4 flex-grow-1">
                            <?= strip_tags($b['isi_berita']) ?>
                        </p>
                        <a href="<?= base_url('berita/detail/' . $b['id_berita']) ?>" class="btn btn-light rounded-pill py-2 fw-bold text-primary border text-center hover-scale w-100">
                            Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <div class="bg-light rounded-4 p-5 d-inline-block text-muted">
                    <i class="fas fa-newspaper fs-1 mb-3 opacity-50 d-block"></i>
                    <h5 class="fw-bold m-0">Belum ada berita diterbitkan.</h5>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
    <?php if(isset($berita) && count($berita) > 0): ?>
    <div class="text-center mt-5">
        <a href="<?= base_url('berita') ?>" class="btn btn-glow rounded-pill px-5 py-3 fw-bold fs-6 shadow-lg">Lihat Semua Berita</a>
    </div>
    <?php endif; ?>
</div>

<?= $this->include('frontend/kelulusan_popup') ?>

<?= $this->endSection() ?>