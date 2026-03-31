<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    .modern-card {
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        border: none;
    }
    .table-modern th {
        background: #f8fafc;
        color: #475569;
        font-weight: 700;
        border-bottom: 2px solid #e2e8f0;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }
    .table-modern td {
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
    }
    .modern-input {
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        padding: 12px 18px;
        font-weight: 500;
        background: #f8fafc;
        transition: all 0.3s ease;
    }
    .modern-input:focus {
        border-color: #4e54c8;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(78, 84, 200, 0.1);
        outline: none;
    }
    .modal-content {
        border-radius: 24px;
        border: none;
        overflow: hidden;
    }
    .modal-header-custom {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
        padding: 24px;
        border-bottom: none;
    }
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="modern-card bg-white p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3">
                        <i class="fas fa-link fs-4"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold m-0 text-dark">Kelola Menu Eksternal</h5>
                        <p class="text-muted fs-7 mb-0">Atur tautan menu navigasi pada halaman utama website.</p>
                    </div>
                </div>
                <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm bg-gradient-animated border-0 hover-lift" data-toggle="modal" data-target="#modalTambah">
                    <i class="fas fa-plus me-2"></i> Tambah Menu
                </button>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-modern datatable w-100">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center rounded-start">No</th>
                            <th width="25%">Nama Menu</th>
                            <th width="40%">Link Eksternal</th>
                            <th width="15%" class="text-center">Urutan Tampil</th>
                            <th width="15%" class="text-center rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($menu) && count($menu) > 0): foreach($menu as $key => $m): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $key + 1 ?></td>
                            <td class="fw-bold text-dark fs-6"><?= $m['nama_menu'] ?></td>
                            <td>
                                <a href="<?= $m['link_eksternal'] ?>" target="_blank" class="text-primary text-decoration-none d-flex align-items-center">
                                    <i class="fas fa-external-link-alt me-2 fs-7"></i> <?= $m['link_eksternal'] ?>
                                </a>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fs-7 shadow-sm">
                                    Urutan ke-<?= $m['urutan'] ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-primary rounded-circle shadow-sm me-1 hover-lift" style="width: 38px; height: 38px;">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-light text-danger rounded-circle shadow-sm hover-lift" style="width: 38px; height: 38px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-folder-open fs-1 mb-3 opacity-50"></i>
                                    <h6 class="fw-bold">Belum Ada Menu</h6>
                                    <p class="mb-0 fs-7">Silakan klik tombol tambah menu untuk membuat tautan baru.</p>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="alert alert-info border-0 shadow-sm rounded-4 mt-4 d-flex align-items-center bg-primary bg-opacity-10">
                <i class="fas fa-info-circle fs-3 text-primary me-3"></i>
                <div class="text-dark">
                    <strong class="d-block mb-1">Informasi Publikasi</strong>
                    Menu yang Anda tambahkan di sini akan langsung muncul di bagian navigasi <i>(header)</i> pada halaman depan website pengunjung.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header-custom d-flex justify-content-between align-items-center">
                <h5 class="modal-title fw-bold text-white"><i class="fas fa-plus-circle me-2"></i> Tambah Menu Baru</h5>
                <button type="button" class="close text-white shadow-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/aplikasi/simpan_menu') ?>" method="post">
                <div class="modal-body p-4 bg-white">
                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Nama Menu Tampil</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 text-primary px-3 rounded-start-3"><i class="fas fa-font"></i></span>
                            <input type="text" class="form-control modern-input rounded-start-0" name="nama_menu" placeholder="Contoh: PPDB Online, E-Learning..." required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Tautan / Link URL</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 text-primary px-3 rounded-start-3"><i class="fas fa-globe"></i></span>
                            <input type="url" class="form-control modern-input rounded-start-0" name="link_eksternal" placeholder="Contoh: https://ppdb.sekolah.sch.id" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Urutan Posisi Menu</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 text-primary px-3 rounded-start-3"><i class="fas fa-sort-numeric-down"></i></span>
                            <input type="number" class="form-control modern-input rounded-start-0" name="urutan" placeholder="Contoh: 1, 2, 3..." value="0" required>
                        </div>
                        <small class="text-muted mt-2 d-block"><i class="fas fa-info-circle me-1"></i> Angka terkecil akan tampil paling kiri/atas.</small>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0 bg-white">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-secondary border shadow-sm hover-lift" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm bg-gradient-animated border-0 hover-lift">
                        <i class="fas fa-save me-2"></i> Simpan Menu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>