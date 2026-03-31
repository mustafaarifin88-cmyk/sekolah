<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-gradient-animated border-0 shadow-lg rounded-4 overflow-hidden position-relative">
            <div class="position-absolute" style="top: -20px; right: -20px; opacity: 0.1; transform: scale(2);">
                <i class="fas fa-school fa-10x text-white"></i>
            </div>
            <div class="card-body p-5 text-white position-relative z-1">
                <h2 class="fw-bold mb-3 display-5">Selamat Datang, <?= session()->get('username') ?>!</h2>
                <p class="fs-5 opacity-75 mb-0">Anda login sebagai Administrator. Pantau dan kelola seluruh aktivitas sistem informasi sekolah dengan mudah melalui panel ini.</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-3 col-6">
        <div class="card border-0 shadow-sm rounded-4 text-center p-4 hover-lift h-100">
            <div class="bg-primary bg-opacity-10 text-primary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                <i class="fas fa-user-graduate fs-2"></i>
            </div>
            <h3 class="fw-bold text-dark mb-1">1,250</h3>
            <span class="text-muted fw-semibold">Total Siswa</span>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="card border-0 shadow-sm rounded-4 text-center p-4 hover-lift h-100">
            <div class="bg-success bg-opacity-10 text-success rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                <i class="fas fa-chalkboard-teacher fs-2"></i>
            </div>
            <h3 class="fw-bold text-dark mb-1">85</h3>
            <span class="text-muted fw-semibold">Total Guru</span>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="card border-0 shadow-sm rounded-4 text-center p-4 hover-lift h-100">
            <div class="bg-warning bg-opacity-10 text-warning rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                <i class="fas fa-book fs-2"></i>
            </div>
            <h3 class="fw-bold text-dark mb-1">24</h3>
            <span class="text-muted fw-semibold">Mata Pelajaran</span>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="card border-0 shadow-sm rounded-4 text-center p-4 hover-lift h-100">
            <div class="bg-info bg-opacity-10 text-info rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                <i class="fas fa-newspaper fs-2"></i>
            </div>
            <h3 class="fw-bold text-dark mb-1">42</h3>
            <span class="text-muted fw-semibold">Berita Terbit</span>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white border-0 pt-4 pb-0 px-4 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark m-0"><i class="fas fa-chart-line text-primary me-2"></i> Statistik Kunjungan</h5>
                <button class="btn btn-sm btn-light rounded-pill px-3 shadow-none text-muted"><i class="fas fa-ellipsis-h"></i></button>
            </div>
            <div class="card-body px-4 py-3 text-center d-flex align-items-center justify-content-center">
                <p class="text-muted mb-0"><i class="fas fa-chart-bar fs-1 text-light mb-3 d-block"></i> Grafik akan tampil di sini</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
                <h5 class="fw-bold text-dark m-0"><i class="fas fa-bell text-warning me-2"></i> Aktivitas Terbaru</h5>
            </div>
            <div class="card-body p-4">
                <div class="d-flex align-items-start mb-3 pb-3 border-bottom">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3"><i class="fas fa-plus fs-6"></i></div>
                    <div>
                        <p class="mb-0 fw-semibold text-dark text-sm">Berita baru ditambahkan</p>
                        <small class="text-muted">Oleh Admin - 2 jam yang lalu</small>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-3 pb-3 border-bottom">
                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-2 me-3"><i class="fas fa-user-check fs-6"></i></div>
                    <div>
                        <p class="mb-0 fw-semibold text-dark text-sm">Siswa baru terdaftar</p>
                        <small class="text-muted">Oleh Admin - 5 jam yang lalu</small>
                    </div>
                </div>
                <div class="d-flex align-items-start">
                    <div class="bg-info bg-opacity-10 text-info rounded-circle p-2 me-3"><i class="fas fa-bullhorn fs-6"></i></div>
                    <div>
                        <p class="mb-0 fw-semibold text-dark text-sm">Pengumuman diterbitkan</p>
                        <small class="text-muted">Oleh Admin - 1 hari yang lalu</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
    .bg-opacity-10 { background-color: rgba(var(--bs-primary-rgb), 0.1) !important; }
</style>
<?= $this->endSection() ?>