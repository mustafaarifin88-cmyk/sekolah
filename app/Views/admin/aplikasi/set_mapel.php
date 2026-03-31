<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    .modern-card { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: none; }
    .table-modern th { background: #f8fafc; color: #475569; font-weight: 700; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; }
    .table-modern td { vertical-align: middle; border-bottom: 1px solid #f1f5f9; color: #334155; }
    .modern-input { border-radius: 12px; border: 2px solid #e2e8f0; padding: 12px 18px; font-weight: 500; background: #f8fafc; transition: all 0.3s ease; }
    .modern-input:focus { border-color: #4e54c8; background: #fff; box-shadow: 0 0 0 4px rgba(78, 84, 200, 0.15); outline: none; }
</style>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="modern-card bg-white p-4 h-100">
            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 45px; height: 45px;">
                    <i class="fas fa-link fs-5"></i>
                </div>
                <h5 class="fw-bold m-0 text-dark">Tugas Mapel</h5>
            </div>
            <form action="<?= base_url('admin/aplikasi/simpan_set_mapel') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Nama Guru</label>
                    <select name="id_guru" class="form-control modern-input" required>
                        <option value="">-- Pilih Guru --</option>
                        <?php if(isset($guru)): foreach($guru as $g): ?>
                            <option value="<?= $g['id_guru'] ?>"><?= $g['nama_lengkap'] ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Mata Pelajaran</label>
                    <select name="id_mapel" class="form-control modern-input" required>
                        <option value="">-- Pilih Mapel --</option>
                        <?php if(isset($mapel)): foreach($mapel as $m): ?>
                            <option value="<?= $m['id_mapel'] ?>"><?= $m['nama_mapel'] ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <button type="submit" class="btn text-white w-100 rounded-pill py-2 fw-bold shadow-sm hover-lift border-0" style="background: linear-gradient(-45deg, #4e54c8, #8f94fb);">
                    <i class="fas fa-save me-2"></i> Tugaskan Mapel
                </button>
            </form>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="modern-card bg-white p-0 h-100 overflow-hidden">
            <div class="p-4 border-bottom border-light d-flex justify-content-between align-items-center bg-light">
                <h5 class="fw-bold m-0 text-dark"><i class="fas fa-list me-2 text-primary"></i> Daftar Penugasan Mapel</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-modern mb-0">
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
                            <td class="text-center fw-bold text-muted"><?= $key + 1 ?></td>
                            <td class="fw-bold text-dark"><?= $row['nama_guru'] ?></td>
                            <td><span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill"><?= $row['nama_mapel'] ?></span></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-primary rounded-circle shadow-sm me-1 hover-lift" data-toggle="modal" data-target="#modalEdit<?= $row['id_set_mapel'] ?>" style="width:35px; height:35px;"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('admin/aplikasi/hapus_set_mapel/' . $row['id_set_mapel']) ?>" onclick="return confirm('Hapus penugasan ini?')" class="btn btn-sm btn-light text-danger rounded-circle shadow-sm d-inline-flex align-items-center justify-content-center hover-lift" style="width:35px; height:35px;"><i class="fas fa-trash"></i></a>
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

<?php if(isset($set_mapel) && count($set_mapel) > 0): foreach($set_mapel as $row): ?>
<div class="modal fade" id="modalEdit<?= $row['id_set_mapel'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 24px; border: none; overflow: hidden;">
            <div class="modal-header p-4" style="background: linear-gradient(-45deg, #4e54c8, #8f94fb);">
                <h5 class="modal-title fw-bold text-white"><i class="fas fa-edit me-2"></i> Edit Penugasan Mapel</h5>
                <button type="button" class="close text-white shadow-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= base_url('admin/aplikasi/update_set_mapel/' . $row['id_set_mapel']) ?>" method="post">
                <div class="modal-body p-4 bg-white">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Nama Guru</label>
                        <select name="id_guru" class="form-control modern-input" required>
                            <option value="">-- Pilih Guru --</option>
                            <?php if(isset($guru)): foreach($guru as $g): ?>
                                <option value="<?= $g['id_guru'] ?>" <?= $g['id_guru'] == $row['id_guru'] ? 'selected' : '' ?>><?= $g['nama_lengkap'] ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Mata Pelajaran</label>
                        <select name="id_mapel" class="form-control modern-input" required>
                            <option value="">-- Pilih Mapel --</option>
                            <?php if(isset($mapel)): foreach($mapel as $m): ?>
                                <option value="<?= $m['id_mapel'] ?>" <?= $m['id_mapel'] == $row['id_mapel'] ? 'selected' : '' ?>><?= $m['nama_mapel'] ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0 bg-white">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-secondary border shadow-sm hover-lift" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm bg-gradient-animated border-0 hover-lift"><i class="fas fa-save me-2"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; endif; ?>

<?= $this->endSection() ?>