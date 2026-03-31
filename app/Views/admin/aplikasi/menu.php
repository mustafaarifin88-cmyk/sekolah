<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-0 pt-4 pb-0 px-4 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark m-0"><i class="fas fa-link text-primary me-2"></i> Kelola Menu Eksternal</h5>
                <button class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm bg-gradient-animated border-0" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus me-2"></i> Tambah Menu</button>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover border-bottom datatable align-middle">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th class="border-0 rounded-start-pill text-center" width="5%">No</th>
                                <th class="border-0">Nama Menu</th>
                                <th class="border-0">Link Eksternal</th>
                                <th class="border-0 text-center">Urutan</th>
                                <th class="border-0 rounded-end-pill text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($menu) && count($menu) > 0): ?>
                                <?php foreach($menu as $key => $m): ?>
                                <tr>
                                    <td class="text-center text-muted"><?= $key + 1 ?></td>
                                    <td class="fw-bold text-dark"><?= $m['nama_menu'] ?></td>
                                    <td><a href="<?= $m['link_eksternal'] ?>" target="_blank" class="text-primary text-decoration-none"><i class="fas fa-external-link-alt me-1"></i> <?= $m['link_eksternal'] ?></a></td>
                                    <td class="text-center"><span class="badge bg-secondary rounded-pill px-3"><?= $m['urutan'] ?></span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-light text-primary rounded-circle shadow-sm me-1" style="width: 35px; height: 35px;"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-light text-danger rounded-circle shadow-sm" style="width: 35px; height: 35px;"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="text-center py-4 text-muted">Belum ada data menu eksternal.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="alert alert-info border-0 shadow-sm rounded-4 mt-4 d-flex align-items-center">
                    <i class="fas fa-info-circle fs-3 me-3"></i>
                    <div>
                        <strong class="d-block mb-1">Informasi</strong>
                        Menu yang ditambahkan di sini akan muncul di bagian navigasi (header) pada halaman depan website pengunjung.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Menu -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-gradient-animated text-white border-0 p-4">
                <h5 class="modal-title fw-bold"><i class="fas fa-plus-circle me-2"></i> Tambah Menu Baru</h5>
                <button type="button" class="close text-white shadow-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/aplikasi/simpan_menu') ?>" method="post">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Nama Menu</label>
                        <input type="text" class="form-control form-control-lg bg-light border-0 shadow-none rounded-3" name="nama_menu" placeholder="Contoh: PPDB Online" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Link / Tautan</label>
                        <input type="url" class="form-control form-control-lg bg-light border-0 shadow-none rounded-3" name="link_eksternal" placeholder="Contoh: https://ppdb.sekolah.sch.id" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Urutan Tampil</label>
                        <input type="number" class="form-control form-control-lg bg-light border-0 shadow-none rounded-3" name="urutan" placeholder="Contoh: 1" value="0" required>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm bg-gradient-animated border-0 hover-lift">Simpan Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>