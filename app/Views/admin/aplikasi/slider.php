<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    .modern-card { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: none; }
    .slider-img { border-radius: 12px; object-fit: cover; width: 120px; height: 70px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    .table-modern th { background: #f8fafc; color: #475569; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; }
    .table-modern td { vertical-align: middle; border-bottom: 1px solid #f1f5f9; color: #334155; }
    .modern-input { border-radius: 12px; border: 2px solid #e2e8f0; padding: 12px 18px; font-weight: 500; background: #f8fafc; }
    .modern-input:focus { border-color: #f6d365; background: #fff; box-shadow: 0 0 0 4px rgba(246, 211, 101, 0.2); outline: none; }
    .modal-content { border-radius: 24px; border: none; overflow: hidden; }
    .modal-header { background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); padding: 20px 24px; border-bottom: none; }
</style>

<div class="row">
    <div class="col-12">
        <div class="modern-card bg-white p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3 me-3"><i class="fas fa-images fs-4"></i></div>
                    <div>
                        <h5 class="fw-bold m-0 text-dark">Manajemen Slider Beranda</h5>
                        <p class="text-muted fs-7 mb-0">Atur gambar slideshow pada halaman utama website.</p>
                    </div>
                </div>
                <button class="btn btn-warning text-dark rounded-pill px-4 py-2 fw-bold shadow-sm hover-lift" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus me-2"></i> Tambah Slider</button>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-modern datatable w-100">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center rounded-start">No</th>
                            <th width="15%">Gambar</th>
                            <th width="25%">Judul</th>
                            <th>Keterangan</th>
                            <th width="10%" class="text-center rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($slider) && count($slider) > 0): foreach($slider as $key => $row): ?>
                        <tr>
                            <td class="text-center"><?= $key + 1 ?></td>
                            <td><img src="<?= base_url('uploads/slider/'.$row['foto']) ?>" class="slider-img"></td>
                            <td class="fw-bold"><?= $row['judul'] ?></td>
                            <td class="text-muted fs-7"><?= word_limiter($row['keterangan'], 10) ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-danger rounded-circle shadow-sm" style="width:35px; height:35px;"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="5" class="text-center py-5 text-muted">Belum ada data slider.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-dark"><i class="fas fa-plus-circle me-2"></i> Tambah Slider Baru</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/aplikasi/simpan_slider') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Judul Slider</label>
                        <input type="text" class="form-control modern-input" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Keterangan Singkat</label>
                        <textarea class="form-control modern-input" name="keterangan" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Foto / Gambar (Rasio 16:9)</label>
                        <input type="file" class="form-control modern-input" name="foto" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning rounded-pill px-5 fw-bold text-dark shadow-sm hover-lift">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>