<?= $this->extend('layout/frontend/template') ?>

<?= $this->section('content') ?>
<div class="hero-section position-relative">
    <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
        <div class="carousel-inner h-100">
            <?php if(isset($slider) && count($slider) > 0): ?>
                <?php foreach($slider as $key => $s): ?>
                <div class="carousel-item h-100 <?= $key == 0 ? 'active' : '' ?>">
                    <img src="<?= base_url('uploads/slider/' . $s['foto']) ?>" class="d-block w-100 h-100 object-fit-cover" alt="Slider">
                    <div class="carousel-caption d-none d-md-block glass-card-dark rounded-4 p-4 text-start" style="bottom: 20%; left: 10%; max-width: 600px;">
                        <h2 class="fw-bold text-white mb-3"><?= $s['judul'] ?></h2>
                        <p class="text-light opacity-75 fs-5"><?= $s['keterangan'] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="carousel-item h-100 active bg-gradient-animated">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="text-center text-white glass-card-dark p-5 rounded-4 shadow-lg">
                            <h1 class="fw-bold display-4">Selamat Datang di <?= $identitas['nama_sekolah'] ?? 'Sekolah Kami' ?></h1>
                            <p class="fs-5 opacity-75">Membangun Generasi Cerdas dan Berkarakter</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
        </button>
    </div>
</div>

<div class="container my-5 py-4">
    <div class="row g-5 align-items-center">
        <div class="col-lg-4 text-center">
            <div class="position-relative d-inline-block">
                <div class="bg-gradient-animated position-absolute w-100 h-100 rounded-circle" style="top: 10px; left: 10px; z-index: -1; filter: blur(15px); opacity: 0.7;"></div>
                <img src="<?= base_url('uploads/identitas/' . ($identitas['foto_kepsek'] ?? 'default.png')) ?>" alt="Kepala Sekolah" class="img-fluid rounded-circle border border-5 border-white shadow-lg" style="width: 280px; height: 280px; object-fit: cover;">
            </div>
            <h4 class="fw-bold mt-4 text-dark"><?= $identitas['nama_kepsek'] ?? 'Nama Kepala Sekolah' ?></h4>
            <p class="text-primary fw-semibold">Kepala Sekolah</p>
        </div>
        <div class="col-lg-8">
            <div class="bg-white p-5 rounded-4 shadow-sm border-0 position-relative overflow-hidden">
                <div class="position-absolute top-0 start-0 w-100 h-2 bg-gradient-animated" style="height: 5px;"></div>
                <h2 class="fw-bold text-dark mb-4 border-bottom pb-2">Visi & Misi</h2>
                <div class="fs-6 text-secondary lh-lg text-justify">
                    <?= $identitas['visi_misi'] ?? '<p>Visi dan Misi sekolah belum diatur.</p>' ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-light py-5">
    <div class="container my-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark text-uppercase letter-spacing-1">Kabar Terbaru</h2>
            <div class="mx-auto bg-gradient-animated rounded-pill mt-2" style="width: 60px; height: 4px;"></div>
        </div>
        <div class="row g-4">
            <?php if(isset($berita) && count($berita) > 0): ?>
                <?php foreach($berita as $b): ?>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden news-card hover-lift">
                        <div class="position-relative">
                            <img src="<?= base_url('uploads/berita/' . $b['thumbnail']) ?>" class="card-img-top news-img object-fit-cover" alt="Berita" style="height: 220px;">
                            <div class="position-absolute bottom-0 start-0 bg-primary text-white px-3 py-1 rounded-tr-3 fw-semibold text-sm">
                                <?= date('d M Y', strtotime($b['tanggal_publish'])) ?>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold text-dark mb-3 line-clamp-2"><?= $b['judul_berita'] ?></h5>
                            <p class="card-text text-secondary mb-4 line-clamp-3">
                                <?= strip_tags(word_limiter($b['isi_berita'], 20)) ?>
                            </p>
                            <a href="<?= base_url('berita/detail/' . $b['id_berita']) ?>" class="btn btn-outline-primary rounded-pill px-4 fw-semibold w-100">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted">Belum ada berita yang diterbitkan.</div>
            <?php endif; ?>
        </div>
        <div class="text-center mt-5">
            <a href="<?= base_url('berita') ?>" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow-sm bg-gradient-animated border-0">Lihat Semua Berita</a>
        </div>
    </div>
</div>
<style>
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    .rounded-tr-3 { border-top-right-radius: 1rem; }
</style>
<?= $this->endSection() ?>