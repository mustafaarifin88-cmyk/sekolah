<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    .modern-card {
        background: #ffffff;
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.04);
        overflow: hidden;
    }
    .modern-input {
        border-radius: 12px;
        border: 1.5px solid #e2e8f0;
        padding: 14px 18px;
        background-color: #f8fafc;
        font-weight: 500;
        color: #334155;
        transition: all 0.3s ease;
    }
    .modern-input:focus {
        background-color: #ffffff;
        border-color: #4e54c8;
        box-shadow: 0 0 0 4px rgba(78, 84, 200, 0.1);
        outline: none;
    }
    .modern-label {
        font-weight: 700;
        color: #475569;
        margin-bottom: 8px;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
    }
    .upload-box {
        position: relative;
        border: 2px dashed #cbd5e1;
        border-radius: 16px;
        padding: 30px 20px;
        text-align: center;
        background: #f8fafc;
        cursor: pointer;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    .upload-box:hover {
        border-color: #4e54c8;
        background: #f1f5f9;
        transform: translateY(-2px);
    }
    .upload-input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
        z-index: 10;
    }
    .preview-img {
        max-height: 100px;
        max-width: 100%;
        border-radius: 8px;
        margin-top: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        display: none;
    }
    .existing-img {
        max-height: 100px;
        max-width: 100%;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        margin-bottom: 15px;
    }
    .section-title {
        position: relative;
        padding-bottom: 12px;
        margin-bottom: 25px;
        font-weight: 800;
        color: #1e293b;
        display: flex;
        align-items: center;
    }
    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 4px;
        background: linear-gradient(90deg, #4e54c8, #8f94fb);
        border-radius: 2px;
    }
    .icon-wrapper {
        width: 45px;
        height: 45px;
        background: rgba(78, 84, 200, 0.1);
        color: #4e54c8;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 1.2rem;
    }
</style>

<div class="row mb-4">
    <div class="col-12">
        <div class="card dashboard-banner border-0 shadow-sm rounded-4">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-4 shadow-sm" style="width: 70px; height: 70px;">
                    <i class="fas fa-school text-white fs-1"></i>
                </div>
                <div class="text-white">
                    <h2 class="fw-bold mb-1">Pengaturan Identitas Sekolah</h2>
                    <p class="mb-0 opacity-75 fw-light fs-6">Sesuaikan informasi profil utama, logo, dan data kepala sekolah.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="<?= base_url('admin/aplikasi/update_identitas') ?>" method="post" enctype="multipart/form-data">
    <div class="row g-4">
        
        <div class="col-xl-7">
            <div class="modern-card p-5 h-100">
                <div class="section-title text-uppercase tracking-wider">
                    <div class="icon-wrapper"><i class="fas fa-building"></i></div>
                    A. Profil Utama Sekolah
                </div>
                
                <div class="mb-4">
                    <label class="modern-label">Nama Sekolah Resmi</label>
                    <input type="text" class="form-control modern-input w-100" name="nama_sekolah" value="<?= $identitas['nama_sekolah'] ?? '' ?>" placeholder="Contoh: SMA Negeri 1 Jakarta" required>
                </div>
                
                <div class="mb-4">
                    <label class="modern-label">Nama Dinas Pendidikan</label>
                    <input type="text" class="form-control modern-input w-100" name="nama_dinas" value="<?= $identitas['nama_dinas'] ?? '' ?>" placeholder="Contoh: Dinas Pendidikan Provinsi DKI Jakarta" required>
                </div>
                
                <div class="mb-4">
                    <label class="modern-label">Alamat Lengkap Sekolah</label>
                    <textarea class="form-control modern-input w-100" name="alamat_sekolah" rows="4" placeholder="Masukkan alamat lengkap beserta kode pos..." required><?= $identitas['alamat_sekolah'] ?? '' ?></textarea>
                </div>

                <div class="row g-4 mt-1">
                    <div class="col-md-6">
                        <label class="modern-label">Logo Sekolah (PNG)</label>
                        <div class="upload-box">
                            <input type="file" class="upload-input" name="logo_sekolah" accept="image/png" onchange="previewFile(this, 'preview-logo')">
                            <?php if(!empty($identitas['logo_sekolah'])): ?>
                                <img src="<?= base_url('uploads/identitas/'.$identitas['logo_sekolah']) ?>" class="existing-img" id="existing-logo">
                            <?php else: ?>
                                <i class="fas fa-cloud-upload-alt fs-1 text-primary mb-3 d-block" id="icon-logo"></i>
                            <?php endif; ?>
                            <img id="preview-logo" class="preview-img mx-auto">
                            <h6 class="fw-bold text-dark mt-2 mb-1">Pilih / Tarik File</h6>
                            <span class="text-muted fs-7">Format PNG Transparan</span>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="modern-label">Logo Pemda (PNG)</label>
                        <div class="upload-box">
                            <input type="file" class="upload-input" name="logo_pemda" accept="image/png" onchange="previewFile(this, 'preview-pemda')">
                            <?php if(!empty($identitas['logo_pemda'])): ?>
                                <img src="<?= base_url('uploads/identitas/'.$identitas['logo_pemda']) ?>" class="existing-img" id="existing-pemda">
                            <?php else: ?>
                                <i class="fas fa-cloud-upload-alt fs-1 text-success mb-3 d-block" id="icon-pemda"></i>
                            <?php endif; ?>
                            <img id="preview-pemda" class="preview-img mx-auto">
                            <h6 class="fw-bold text-dark mt-2 mb-1">Pilih / Tarik File</h6>
                            <span class="text-muted fs-7">Format PNG Transparan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-5">
            <div class="modern-card p-5 h-100">
                <div class="section-title text-uppercase tracking-wider">
                    <div class="icon-wrapper bg-warning bg-opacity-10 text-warning"><i class="fas fa-user-tie"></i></div>
                    B. Data Kepala Sekolah
                </div>

                <div class="mb-4">
                    <label class="modern-label">Nama Lengkap Kepala Sekolah</label>
                    <input type="text" class="form-control modern-input w-100" name="nama_kepsek" value="<?= $identitas['nama_kepsek'] ?? '' ?>" placeholder="Contoh: Dr. H. Budi Santoso, M.Pd." required>
                </div>
                
                <div class="mb-4">
                    <label class="modern-label">NIP Kepala Sekolah</label>
                    <input type="text" class="form-control modern-input w-100" name="nip_kepsek" value="<?= $identitas['nip_kepsek'] ?? '' ?>" placeholder="Masukkan 18 digit NIP..." required>
                </div>

                <div class="mb-4">
                    <label class="modern-label">Nomor SK Pengangkatan</label>
                    <input type="text" class="form-control modern-input w-100" name="sk_kepsek" value="<?= $identitas['sk_kepsek'] ?? '' ?>" placeholder="Contoh: 821.2/045/SK/2023">
                </div>

                <div class="mb-4">
                    <label class="modern-label">Foto Kepala Sekolah</label>
                    <div class="upload-box py-3">
                        <input type="file" class="upload-input" name="foto_kepsek" accept="image/*" onchange="previewFile(this, 'preview-foto')">
                        <div class="d-flex align-items-center justify-content-center">
                            <?php if(!empty($identitas['foto_kepsek'])): ?>
                                <img src="<?= base_url('uploads/identitas/'.$identitas['foto_kepsek']) ?>" class="existing-img mb-0 me-3" id="existing-foto" style="height: 60px; width: 60px; object-fit: cover; border-radius: 50%;">
                            <?php else: ?>
                                <i class="fas fa-camera fs-2 text-info me-3" id="icon-foto"></i>
                            <?php endif; ?>
                            <img id="preview-foto" class="preview-img mt-0 me-3 mb-0" style="height: 60px; width: 60px; object-fit: cover; border-radius: 50%;">
                            <div class="text-start">
                                <h6 class="fw-bold text-dark mb-0">Pilih Pas Foto</h6>
                                <span class="text-muted fs-7">Rasio 3x4 / 4x6 disarankan</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="modern-label">Tanda Tangan (PNG Transparan)</label>
                    <div class="upload-box py-3">
                        <input type="file" class="upload-input" name="ttd_kepsek" accept="image/png" onchange="previewFile(this, 'preview-ttd')">
                        <div class="d-flex align-items-center justify-content-center">
                            <?php if(!empty($identitas['ttd_kepsek'])): ?>
                                <img src="<?= base_url('uploads/identitas/'.$identitas['ttd_kepsek']) ?>" class="existing-img mb-0 me-3" id="existing-ttd" style="height: 50px;">
                            <?php else: ?>
                                <i class="fas fa-signature fs-2 text-danger me-3" id="icon-ttd"></i>
                            <?php endif; ?>
                            <img id="preview-ttd" class="preview-img mt-0 me-3 mb-0" style="height: 50px;">
                            <div class="text-start">
                                <h6 class="fw-bold text-dark mb-0">Upload TTD</h6>
                                <span class="text-muted fs-7">Digunakan untuk e-Rapor & Cetak</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="modern-card p-4 d-flex justify-content-between align-items-center bg-white shadow-sm">
                <p class="mb-0 text-muted fw-semibold"><i class="fas fa-info-circle text-primary me-2"></i> Pastikan semua data yang dimasukkan sudah benar sebelum menyimpan.</p>
                <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 fw-bold shadow-lg bg-gradient-animated border-0 hover-lift fs-6 text-uppercase tracking-wider">
                    <i class="fas fa-save me-2"></i> Simpan Konfigurasi
                </button>
            </div>
        </div>

    </div>
</form>

<script>
    function previewFile(input, previewId) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var previewElement = document.getElementById(previewId);
                previewElement.src = e.target.result;
                previewElement.style.display = 'block';
                
                var existingId = previewId.replace('preview', 'existing');
                var iconId = previewId.replace('preview', 'icon');
                
                if(document.getElementById(existingId)) {
                    document.getElementById(existingId).style.display = 'none';
                }
                if(document.getElementById(iconId)) {
                    document.getElementById(iconId).style.display = 'none';
                }
            }
            reader.readAsDataURL(file);
        }
    }
</script>

<?= $this->endSection() ?>