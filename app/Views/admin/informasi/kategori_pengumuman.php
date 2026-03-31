<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    .modern-card { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: none; }
    .table-modern th { background: #f8fafc; color: #475569; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; }
    .table-modern td { vertical-align: middle; border-bottom: 1px solid #f1f5f9; color: #334155; }
    .modern-input { border-radius: 12px; border: 2px solid #e2e8f0; padding: 12px 18px; font-weight: 500; background: #f8fafc; }
    .modern-input:focus { border-color: #ff0844; background: #fff; box-shadow: 0 0 0 4px rgba(255, 8, 68, 0.2); outline: none; }
</style>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="modern-card bg-white p-4 h-100">
            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                <div class="bg-danger bg-opacity-10 text-danger rounded-3 p-3 me-3"><i class="fas fa-bookmark fs-4"></i></div>
                <h5 class="fw-bold m-0 text-dark">Kategori Pengumuman</h5>
            </div>
            <form action="<?= base_url('admin/informasi/simpan_kategori_pengumuman') ?>" method="post">
                <div class="mb-4">
                    <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase tracking-wider">Nama Kategori</label>
                    <input type="text" class="form-control modern-input" name="nama_kategori" placeholder="Contoh: Info Akademik" required>
                </div>
                <button type="submit" class="btn w-100 rounded-pill py-3 fw-bold shadow-sm border-0 hover-lift text-white" style="background: linear-gradient(45deg, #ff0844, #ffb199);">SIMPAN KATEGORI</button>
            </form>
        </div>
    </div>
    
    <div class="col-lg-8">
        <div class="modern-card bg-white p-4 h-100">
            <h5 class="fw-bold text-dark mb-4 pb-3 border-bottom">Daftar Kategori Pengumuman</h5>
            <div class="table-responsive">
                <table class="table table-hover table-modern datatable w-100">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center rounded-start">No</th>
                            <th>Nama Kategori</th>
                            <th width="20%" class="text-center rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($kategori) && count($kategori) > 0): foreach($kategori as $key => $row): ?>
                        <tr>
                            <td class="text-center"><?= $key + 1 ?></td>
                            <td class="fw-bold text-dark"><?= $row['nama_kategori'] ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-primary rounded-circle shadow-sm me-1" style="width:35px; height:35px;"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-light text-danger rounded-circle shadow-sm" style="width:35px; height:35px;"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="3" class="text-center py-4 text-muted">Belum ada data kategori.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>