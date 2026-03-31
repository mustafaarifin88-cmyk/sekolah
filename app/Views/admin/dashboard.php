<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    /* Custom Dashboard Styles */
    .dashboard-banner {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    .dashboard-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        z-index: -1;
        filter: blur(20px);
    }
    .dashboard-banner::after {
        content: '';
        position: absolute;
        bottom: -50%;
        left: 5%;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        z-index: -1;
        filter: blur(30px);
    }
    .stat-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(0,0,0,0.02);
    }
    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important;
    }
    .icon-box {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        font-size: 28px;
        transition: 0.3s;
    }
    .stat-card:hover .icon-box {
        transform: scale(1.1) rotate(5deg);
    }
    .quick-btn {
        transition: 0.3s;
        border-radius: 12px;
    }
    .quick-btn:hover {
        background: rgba(0, 123, 255, 0.05);
        transform: translateY(-3px);
    }
    .timeline-modern {
        position: relative;
        padding-left: 30px;
    }
    .timeline-modern::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 2px;
        background: #e9ecef;
    }
    .timeline-item {
        position: relative;
        margin-bottom: 25px;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -34px;
        top: 5px;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #007bff;
        border: 2px solid #fff;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.2);
    }
    .timeline-item:nth-child(2)::before { background: #28a745; box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.2); }
    .timeline-item:nth-child(3)::before { background: #ffc107; box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.2); }
    .timeline-item:nth-child(4)::before { background: #dc3545; box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.2); }
</style>

<!-- Welcome Banner -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card dashboard-banner border-0 shadow-sm rounded-4">
            <div class="card-body p-5 d-flex align-items-center justify-content-between">
                <div class="text-white">
                    <span class="badge bg-white text-primary rounded-pill px-3 py-2 fw-bold mb-3 shadow-sm" style="font-size: 0.8rem;">
                        <i class="fas fa-calendar-alt me-1"></i> <?= date('d F Y') ?>
                    </span>
                    <h2 class="fw-bold display-5 mb-2">Halo, <?= session()->get('username') ?>! 👋</h2>
                    <p class="fs-5 opacity-75 mb-0 fw-light">Selamat datang kembali di Pusat Kendali Sistem Informasi Sekolah.</p>
                </div>
                <div class="d-none d-lg-block">
                    <img src="https://cdn-icons-png.flaticon.com/512/3081/3081648.png" alt="Dashboard Illustration" style="width: 180px; opacity: 0.9; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.2)); transform: rotate(-5deg);">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Key Metrics / Stat Cards -->
<div class="row g-4 mb-4">
    <!-- Siswa -->
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card h-100 rounded-4 bg-white">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-box bg-primary bg-opacity-10 text-primary shadow-sm">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1 border border-success border-opacity-25">
                        <i class="fas fa-arrow-up fs-xs"></i> 5.2%
                    </span>
                </div>
                <h3 class="fw-bold text-dark mb-1 fs-2">1,245</h3>
                <p class="text-muted fw-semibold mb-0 fs-6">Total Siswa Aktif</p>
            </div>
        </div>
    </div>
    
    <!-- Guru -->
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card h-100 rounded-4 bg-white">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-box bg-info bg-opacity-10 text-info shadow-sm">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-2 py-1 border border-secondary border-opacity-25">
                        <i class="fas fa-minus fs-xs"></i> Tetap
                    </span>
                </div>
                <h3 class="fw-bold text-dark mb-1 fs-2">84</h3>
                <p class="text-muted fw-semibold mb-0 fs-6">Guru & Tendik</p>
            </div>
        </div>
    </div>

    <!-- Kelas & Mapel -->
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card h-100 rounded-4 bg-white">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-box bg-warning bg-opacity-10 text-warning shadow-sm">
                        <i class="fas fa-layer-group"></i>
                    </div>
                </div>
                <h3 class="fw-bold text-dark mb-1 fs-2">36 <span class="fs-5 text-muted fw-normal">Kelas</span></h3>
                <p class="text-muted fw-semibold mb-0 fs-6">24 Mata Pelajaran</p>
            </div>
        </div>
    </div>

    <!-- Surat Masuk -->
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card h-100 rounded-4 bg-white">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-box bg-danger bg-opacity-10 text-danger shadow-sm">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <span class="badge bg-danger rounded-pill px-2 py-1 shadow-sm">
                        <i class="fas fa-circle me-1" style="font-size: 8px;"></i> Baru
                    </span>
                </div>
                <h3 class="fw-bold text-dark mb-1 fs-2">12</h3>
                <p class="text-muted fw-semibold mb-0 fs-6">Surat Masuk Hari Ini</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Split -->
<div class="row g-4">
    <!-- Left Column: Chart & Quick Actions -->
    <div class="col-lg-8">
        
        <!-- Quick Actions -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white border-0 pt-4 pb-2 px-4">
                <h5 class="fw-bold text-dark m-0"><i class="fas fa-bolt text-warning me-2"></i> Akses Cepat</h5>
            </div>
            <div class="card-body p-4 pt-2">
                <div class="row text-center g-3">
                    <div class="col-md-3 col-6">
                        <a href="<?= base_url('admin/informasi/berita') ?>" class="text-decoration-none d-block p-3 quick-btn border bg-light">
                            <i class="fas fa-newspaper fs-3 text-primary mb-2 d-block"></i>
                            <span class="text-dark fw-semibold fs-7">Tulis Berita</span>
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="<?= base_url('admin/akademik/siswa') ?>" class="text-decoration-none d-block p-3 quick-btn border bg-light">
                            <i class="fas fa-user-plus fs-3 text-success mb-2 d-block"></i>
                            <span class="text-dark fw-semibold fs-7">Tambah Siswa</span>
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="<?= base_url('admin/administrasi/surat_masuk') ?>" class="text-decoration-none d-block p-3 quick-btn border bg-light">
                            <i class="fas fa-inbox fs-3 text-danger mb-2 d-block"></i>
                            <span class="text-dark fw-semibold fs-7">Arsip Surat</span>
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="<?= base_url('admin/kelulusan/setting') ?>" class="text-decoration-none d-block p-3 quick-btn border bg-light">
                            <i class="fas fa-award fs-3 text-warning mb-2 d-block"></i>
                            <span class="text-dark fw-semibold fs-7">Info Kelulusan</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Placeholder -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="fw-bold text-dark m-0">Statistik Kehadiran & Aktivitas</h5>
                    <p class="text-muted fs-7 mb-0 mt-1">Data interaksi user 7 hari terakhir</p>
                </div>
                <button class="btn btn-sm btn-light rounded-pill px-3 fw-semibold text-primary shadow-none"><i class="fas fa-download me-1"></i> Laporan</button>
            </div>
            <div class="card-body p-4 d-flex align-items-center justify-content-center" style="min-height: 250px; background: repeating-linear-gradient(45deg, rgba(0,0,0,0.01), rgba(0,0,0,0.01) 10px, transparent 10px, transparent 20px);">
                <div class="text-center opacity-50">
                    <i class="fas fa-chart-area fs-1 text-primary mb-3"></i>
                    <p class="fw-semibold text-muted">Integrasi Chart.js / ApexCharts akan tampil di sini</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Right Column: Activities -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-dark m-0"><i class="fas fa-history text-info me-2"></i> Log Aktivitas</h5>
                <a href="#" class="text-primary text-sm fw-semibold text-decoration-none">Lihat Semua</a>
            </div>
            <div class="card-body px-4 pb-4 pt-0">
                <div class="timeline-modern mt-2">
                    <!-- Item 1 -->
                    <div class="timeline-item">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h6 class="fw-bold text-dark m-0 fs-6">Berita Baru Diterbitkan</h6>
                            <small class="text-primary fw-bold text-xs">10 Menit lalu</small>
                        </div>
                        <p class="text-muted fs-7 mb-0">"Penerimaan Siswa Baru Gelombang 1 Dibuka" telah dipublish oleh Admin.</p>
                    </div>
                    <!-- Item 2 -->
                    <div class="timeline-item">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h6 class="fw-bold text-dark m-0 fs-6">Siswa Mutasi Masuk</h6>
                            <small class="text-muted fw-semibold text-xs">1 Jam lalu</small>
                        </div>
                        <p class="text-muted fs-7 mb-0">Budi Santoso telah ditambahkan ke Kelas XI IPA 2.</p>
                    </div>
                    <!-- Item 3 -->
                    <div class="timeline-item">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h6 class="fw-bold text-dark m-0 fs-6">Surat Keluar Dibuat</h6>
                            <small class="text-muted fw-semibold text-xs">3 Jam lalu</small>
                        </div>
                        <p class="text-muted fs-7 mb-0">Surat Undangan Rapat Komite Sekolah (No: 004/SMP/2026).</p>
                    </div>
                    <!-- Item 4 -->
                    <div class="timeline-item">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h6 class="fw-bold text-dark m-0 fs-6">Dana BOS Diperbarui</h6>
                            <small class="text-muted fw-semibold text-xs">Kemarin</small>
                        </div>
                        <p class="text-muted fs-7 mb-0">Laporan pemasukan dana BOS bulan ini berhasil disimpan.</p>
                    </div>
                </div>
                
                <div class="mt-4 pt-3 border-top text-center">
                    <button class="btn btn-light rounded-pill w-100 fw-semibold text-primary">Load More Activities <i class="fas fa-chevron-down ms-1"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>