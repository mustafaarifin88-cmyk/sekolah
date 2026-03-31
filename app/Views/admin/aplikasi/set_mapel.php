<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    .modern-card { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: none; }
    .table-modern th { background: #f8fafc; color: #475569; font-weight: 700; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; }
    .table-modern td { vertical-align: middle; border-bottom: 1px solid #f1f5f9; color: #334155; }
    .select2-container--bootstrap4 .select2-selection { border-radius: 12px; border: 2px solid #e2e8f0; padding: 6px 15px; height: auto; font-weight: 500; }
    .select2-container--bootstrap4.select2-container--focus .select2-selection { border-color: #4e54c8; box-shadow: 0 0 0 4px rgba(78, 84, 200, 0.1); }
</style>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="modern-card bg-white p-4 h-100">
            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3"><i class="fas fa-link fs-4"></i></div>
                <h5 class="fw-bold m-0 text-dark">Assign Mapel Guru</h5>
            </div>
            <form action="<?= base_url('admin/aplikasi/simpan_set_mapel') ?>" method="post">
                <div class="mb-4">
                    <label class="fw-bold text-secondary mb-2">Pilih Guru</label>
                    <select name="id_guru" class="form-control select2" required>
                        <option value="">-- Cari Guru --</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="fw-bold text-secondary mb-2">Pilih Mata Pelajaran (Bisa Multi)</label>
                    <select name="id_mapel[]" class="form-control select2" multiple required>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold shadow-sm bg-gradient-animated border-0 hover-lift">SIMPAN PENUGASAN</button>
            </form>
        </div>
    </div>
    
    <div class="col-lg-8">
        <div class="modern-card bg-white p-4 h-100">
            <h5 class="fw-bold text-dark mb-4 pb-3 border-bottom">Daftar Penugasan Mata Pelajaran</h5>
            <div class="table-responsive">
                <table class="table table-hover table-modern datatable w-100">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center rounded-start">No</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th width="15%" class="text-center rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($set_mapel) && count($set_mapel) > 0): foreach($set_mapel as $key => $row): ?>
                        <tr>
                            <td class="text-center"><?= $key + 1 ?></td>
                            <td class="fw-bold"><?= $row['nama_guru'] ?? 'Nama Guru' ?></td>
                            <td><span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill"><?= $row['nama_mapel'] ?? 'Mapel' ?></span></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-danger rounded-circle shadow-sm" style="width:35px; height:35px;"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data penugasan.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>