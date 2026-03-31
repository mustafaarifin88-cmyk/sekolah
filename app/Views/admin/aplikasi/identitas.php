<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-gradient-animated text-white border-0 p-4">
                <h5 class="m-0 fw-bold"><i class="fas fa-school me-2"></i> Edit Identitas & Kepala Sekolah</h5>
            </div>
            <div class="card-body p-5">
                <form action="<?= base_url('admin/aplikasi/update_identitas') ?>" method="post" enctype="multipart/form-data">
                    <h6 class="text-uppercase text-muted fw-bold mb-4 text-xs tracking-wider">A. Profil Sekolah (Kop Surat)</h6>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Nama Sekolah</label>
                        <input type="text" class="form-control form-control-lg bg-light border-0 shadow-none" name="nama_sekolah" value="<?= $identitas['nama_sekolah'] ?? '' ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Alamat Sekolah</label>
                        <textarea class="form-control bg-light border-0 shadow-none" name="alamat_sekolah" rows="3" required><?= $identitas['alamat_sekolah'] ?? '' ?></textarea>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label fw-bold text-dark">Logo Sekolah (PNG Transparan)</label>
                            <input type="file" class="form-control bg-light border-0 shadow-none" name="logo_sekolah" accept="image/png">
                            <?php if(isset($identitas['logo_sekolah'])): ?>
                                <img src="<?= base_url('uploads/identitas/'.$identitas['logo_sekolah']) ?>" class="mt-2 rounded" width="80">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Logo Pemda (PNG Transparan)</label>
                            <input type="file" class="form-control bg-light border-0 shadow-none" name="logo_pemda" accept="image/png">
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="form-label fw-bold text-dark">Nama Dinas</label>
                        <input type="text" class="form-control form-control-lg bg-light border-0 shadow-none" name="nama_dinas" value="<?= $identitas['nama_dinas'] ?? '' ?>" required>
                    </div>

                    <hr class="border-light opacity-50 mb-5">
                    <h6 class="text-uppercase text-muted fw-bold mb-4 text-xs tracking-wider">B. Data Kepala Sekolah</h6>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label fw-bold text-dark">Nama Kepala Sekolah</label>
                            <input type="text" class="form-control bg-light border-0 shadow-none" name="nama_kepsek" value="<?= $identitas['nama_kepsek'] ?? '' ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">NIP Kepala Sekolah</label>
                            <input type="text" class="form-control bg-light border-0 shadow-none" name="nip_kepsek" value="<?= $identitas['nip_kepsek'] ?? '' ?>" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">SK Kepala Sekolah</label>
                        <input type="text" class="form-control bg-light border-0 shadow-none" name="sk_kepsek" value="<?= $identitas['sk_kepsek'] ?? '' ?>">
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label fw-bold text-dark">Foto Kepala Sekolah</label>
                            <input type="file" class="form-control bg-light border-0 shadow-none" name="foto_kepsek" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Tanda Tangan (PNG Transparan)</label>
                            <input type="file" class="form-control bg-light border-0 shadow-none" name="ttd_kepsek" accept="image/png">
                        </div>
                    </div>

                    <div class="text-end mt-5">
                        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow-sm bg-gradient-animated border-0 hover-lift"><i class="fas fa-save me-2"></i> SIMPAN PERUBAHAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>