<?= $this->extend('layout/frontend/template') ?>

<?= $this->section('content') ?>
<?php helper('text'); ?>
<style>
    body { background-color: #f8fafc; }
    .hero-carousel { border-radius: 20px; overflow: hidden; box-shadow: 0 15px 35px rgba(0,0,0,0.1); margin-bottom: 40px; margin-top: 20px;}
    .carousel-item img { height: 500px; object-fit: cover; filter: brightness(0.65); }
    .carousel-caption { bottom: 20%; left: 5%; right: 5%; text-align: left; }
    .hero-title { font-weight: 800; font-size: 2.5rem; text-shadow: 0 4px 10px rgba(0,0,0,0.5); margin-bottom: 15px; }
    .content-block { background: #fff; border-radius: 20px; padding: 35px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); margin-bottom: 40px; }
    .kepsek-img { width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 5px solid #f1f5f9; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
    .widget-box { background: #fff; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); padding: 25px; margin-bottom: 30px; position: sticky; top: 90px; }
    .widget-title { font-size: 1.1rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: #1e293b; border-bottom: 3px solid #2563eb; padding-bottom: 10px; margin-bottom: 20px; display: inline-block; }
    .widget-item { display: flex; gap: 15px; margin-bottom: 15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 15px; }
    .widget-item:last-child { margin-bottom: 0; border-bottom: none; padding-bottom: 0; }
    .widget-img { width: 70px; height: 70px; border-radius: 12px; object-fit: cover; }
    .widget-text h6 { font-size: 0.95rem; font-weight: 700; margin-bottom: 5px; line-height: 1.4; color: #334155; transition: color 0.3s; }
    .widget-text h6:hover { color: #2563eb; }
    .widget-date { font-size: 0.75rem; color: #94a3b8; }
    .archive-list { list-style: none; padding: 0; margin: 0; }
    .archive-list li { margin-bottom: 10px; }
    .archive-list a { display: flex; justify-content: space-between; color: #475569; text-decoration: none; font-weight: 600; padding: 10px 15px; border-radius: 10px; background: #f8fafc; transition: all 0.3s; }
    .archive-list a:hover { background: #2563eb; color: #fff; transform: translateX(5px); }
</style>

<div class="container pb-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div id="heroCarousel" class="carousel slide carousel-fade hero-carousel" data-bs-ride="carousel">
                <div class="carousel-inner h-100">
                    <?php if(isset($slider) && count($slider) > 0): ?>
                        <?php foreach($slider as $key => $s): ?>
                        <div class="carousel-item h-100 <?= $key == 0 ? 'active' : '' ?>">
                            <img src="<?= base_url('uploads/slider/' . $s['foto']) ?>" class="d-block w-100" alt="Slider">
                            <div class="carousel-caption">
                                <span class="badge bg-primary px-3 py-2 rounded-pill mb-3 fs-6">INFO SEKOLAH</span>
                                <h1 class="hero-title text-white"><?= $s['judul'] ?></h1>
                                <p class="text-white opacity-75 fs-5 mb-0 d-none d-md-block"><?= word_limiter($s['keterangan'], 20) ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="carousel-item h-100 active bg-dark">
                            <div class="carousel-caption text-center" style="bottom: 40%;">
                                <h1 class="hero-title text-white">Selamat Datang di Website Sekolah</h1>
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

            <div class="content-block">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-4 mb-md-0">
                        <?php $fotoKepsek = (isset($identitas['foto_kepsek']) && $identitas['foto_kepsek']) ? base_url('uploads/identitas/' . $identitas['foto_kepsek']) : base_url('assets/dist/img/avatar5.png'); ?>
                        <img src="<?= $fotoKepsek ?>" alt="Kepala Sekolah" class="kepsek-img mb-3">
                        <h6 class="fw-bold text-dark m-0"><?= $identitas['nama_kepsek'] ?? 'Nama Kepala Sekolah' ?></h6>
                        <span class="badge bg-secondary rounded-pill px-2 mt-1 fs-7">Kepala Sekolah</span>
                    </div>
                    <div class="col-md-9 border-start ps-md-4">
                        <h3 class="fw-bolder text-dark mb-3">Visi & Misi Sekolah</h3>
                        <div class="text-secondary lh-lg fs-6" style="max-height: 200px; overflow: hidden; position: relative;">
                            <?php if(isset($identitas['visi_misi']) && !empty($identitas['visi_misi'])): ?>
                                <?= $identitas['visi_misi'] ?>
                            <?php else: ?>
                                <p>Visi dan misi sekolah belum diatur oleh administrator.</p>
                            <?php endif; ?>
                            <div style="position: absolute; bottom: 0; width: 100%; height: 50px; background: linear-gradient(transparent, #fff);"></div>
                        </div>
                        <a href="<?= base_url('akademik/visimisi') ?>" class="btn btn-outline-primary btn-sm rounded-pill px-4 mt-3 fw-bold">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="content-block">
                <h4 class="fw-bolder text-dark mb-4 border-bottom pb-3"><i class="fas fa-newspaper text-primary me-2"></i> Cuplikan Berita</h4>
                <div class="row g-4">
                    <?php if(isset($berita_terbaru) && count($berita_terbaru) > 0): ?>
                        <?php foreach(array_slice($berita_terbaru, 0, 4) as $b): ?>
                        <div class="col-md-6">
                            <div class="d-flex flex-column h-100 border rounded-4 overflow-hidden shadow-sm" style="transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'" onclick="window.location.href='<?= base_url('berita/detail/' . $b['id_berita']) ?>'">
                                <img src="<?= base_url('uploads/berita/' . $b['thumbnail']) ?>" alt="News" style="height: 180px; object-fit: cover;">
                                <div class="p-3 bg-white flex-grow-1">
                                    <div class="text-muted fs-7 mb-2"><i class="far fa-calendar-alt me-1"></i> <?= date('d M Y', strtotime($b['tanggal_publish'])) ?></div>
                                    <h6 class="fw-bold text-dark mb-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?= $b['judul_berita'] ?></h6>
                                    <p class="text-secondary fs-7 mb-0" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?= strip_tags($b['isi_berita']) ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="text-center mt-4">
                    <a href="<?= base_url('berita') ?>" class="btn btn-light border rounded-pill px-4 fw-bold text-primary">Lihat Semua Berita <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="widget-box">
                <div class="widget-title">Berita Terbaru</div>
                <?php if(isset($berita_terbaru) && count($berita_terbaru) > 0): ?>
                    <?php foreach($berita_terbaru as $b): ?>
                    <div class="widget-item">
                        <img src="<?= base_url('uploads/berita/' . $b['thumbnail']) ?>" class="widget-img shadow-sm" alt="Thumb">
                        <div class="widget-text">
                            <a href="<?= base_url('berita/detail/' . $b['id_berita']) ?>" class="text-decoration-none">
                                <h6><?= word_limiter($b['judul_berita'], 6) ?></h6>
                            </a>
                            <div class="widget-date"><i class="far fa-calendar-alt me-1"></i> <?= date('d M Y', strtotime($b['tanggal_publish'])) ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted text-center fs-7">Belum ada berita.</p>
                <?php endif; ?>
            </div>

            <div class="widget-box">
                <div class="widget-title" style="border-color: #e74c3c;">Papan Pengumuman</div>
                <?php if(isset($pengumuman_terbaru) && count($pengumuman_terbaru) > 0): ?>
                    <?php foreach($pengumuman_terbaru as $p): ?>
                    <div class="widget-item align-items-center">
                        <div class="bg-danger bg-opacity-10 text-danger rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                            <i class="fas fa-bullhorn fs-4"></i>
                        </div>
                        <div class="widget-text w-100">
                            <a href="<?= base_url('pengumuman') ?>" class="text-decoration-none">
                                <h6><?= word_limiter($p['judul_pengumuman'], 8) ?></h6>
                            </a>
                            <div class="widget-date"><i class="far fa-clock me-1"></i> <?= date('d M Y', strtotime($p['created_at'])) ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted text-center fs-7">Belum ada pengumuman.</p>
                <?php endif; ?>
            </div>

            <div class="widget-box">
                <div class="widget-title" style="border-color: #10b981;">Arsip Dokumen</div>
                <?php if(isset($arsip_terbaru) && count($arsip_terbaru) > 0): ?>
                    <ul class="archive-list">
                        <?php foreach($arsip_terbaru as $arsip): ?>
                        <li>
                            <a href="#">
                                <span class="text-truncate me-2"><i class="fas fa-file-alt me-2 opacity-50"></i><?= $arsip['perihal'] ?></span>
                                <span class="badge bg-white text-dark border"><?= date('Y', strtotime($arsip['tanggal_surat'])) ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-muted text-center fs-7">Belum ada arsip tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->include('frontend/kelulusan_popup') ?>
<?= $this->endSection() ?>