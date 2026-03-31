<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    .modern-card { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: none; }
    .table-modern th { background: #f8fafc; color: #475569; font-weight: 700; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; }
    .table-modern td { vertical-align: middle; border-bottom: 1px solid #f1f5f9; color: #334155; }
    .select2-container--bootstrap4 .select2-selection { border-radius: 12px; border: 2px solid #e2e8f0; padding: 6px 15px; height: auto; font-weight: 500; }
    .select2-container--bootstrap4.select2-container--focus .select2-selection { border-color: #11998e; box-shadow: 0 0 0 4px rgba(17, 153, 142, 0.1); }
</style>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="modern-card bg-white p-4 h-100">
            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                <div class="bg-success bg-opacity-10 text-success rounded-3 p-3 me-3"><i class="fas fa-users-cog fs-4"></i></div>
                <h5 class="fw-bold m-0 text-dark">Assign Wali Kelas</h5>
            </div>
            <form action="<?= base_url('admin/aplikasi/simpan_set_kelas') ?>" method="post">
                <div class="mb-4">
                    <label class="fw-bold text-secondary mb-2">Pilih Guru</label>
                    <select name="id_guru" class="form-control select2" required>
                        <option value="">-- Cari Guru --</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="fw-bold text-secondary mb-2">Pilih Kelas</label>
                    <select name="id_kelas" class="form-control select2" required>
                        <option value="">-- Pilih Kelas --</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100 rounded-pill py-3 fw-bold shadow-sm border-0 hover-lift text-white" style="background: linear-gradient(45deg, #11998e, #38ef7d);">SIMPAN WALI KELAS</button>
            </form>
        </div>
    </div>
    
    <div class="col-lg-8">
        <div class="modern-card bg-white p-4 h-100">
            <h5 class="fw-bold text-dark mb-4 pb-3 border-bottom">Daftar Wali Kelas</h5>
            <div class="table-responsive">
                <table class="table table-hover table-modern datatable w-100">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center rounded-start">No</th>
                            <th>Nama Guru</th>
                            <th class="text-center">Kelas</th>
                            <th width="15%" class="text-center rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($set_kelas) && count($set_kelas) > 0): foreach($set_kelas as $key => $row): ?>
                        <tr>
                            <td class="text-center"><?= $key + 1 ?></td>
                            <td class="fw-bold"><?= $row['nama_guru'] ?? 'Nama Guru' ?></td>
                            <td class="text-center"><span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fs-6"><?= $row['nama_kelas'] ?? 'Kelas' ?></span></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-danger rounded-circle shadow-sm" style="width:35px; height:35px;"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data wali kelas.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>