<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    .modern-card {
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        border: none;
    }
    .slider-img {
        border-radius: 12px;
        object-fit: cover;
        width: 160px;
        height: 90px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .slider-img:hover {
        transform: scale(1.05);
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
        border-color: #f6d365;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(246, 211, 101, 0.2);
        outline: none;
    }
    .modal-content {
        border-radius: 24px;
        border: none;
        overflow: hidden;
    }
    .modal-header-custom {
        background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
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
    .upload-box {
        position: relative;
        border: 2px dashed #cbd5e1;
        border-radius: 16px;
        padding: 25px 20px;
        text-align: center;
        background: #f8fafc;
        cursor: pointer;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    .upload-box:hover {
        border-color: #f6d365;
        background: #fff;
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
        max-height: 160px;
        width: 100%;
        object-fit: cover;
        border-radius: 12px;
        margin-top: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        display: none;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="modern-card bg-white p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3 me-3">
                        <i class="fas fa-images fs-4"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold m-0 text-dark">Manajemen Slider Beranda</h5>
                        <p class="text-muted fs-7 mb-0">Atur gambar slideshow pada halaman utama website pengunjung.</p>
                    </div>
                </div>
                <!-- PERBAIKAN: Menggunakan data-toggle dan data-target (Bootstrap 4 style) -->
                <button class="btn btn-warning text-dark rounded-pill px-4 py-2 fw-bold shadow-sm hover-lift" data-toggle="modal" data-target="#modalTambah">
                    <i class="fas fa-plus me-2"></i> Tambah Slider
                </button>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-modern datatable w-100">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center rounded-start">No</th>
                            <th width="20%" class="text-center">Gambar Slider</th>
                            <th width="30%">Judul</th>
                            <th width="35%">Keterangan</th>
                            <th width="10%" class="text-center rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($slider) && count($slider) > 0): foreach($slider as $key => $row): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $key + 1 ?></td>
                            <td class="text-center">
                                <img src="<?= base_url('uploads/slider/'.$row['foto']) ?>" class="slider-img" alt="Slider Image">
                            </td>
                            <td>
                                <span class="fw-bold text-dark fs-6 d-block mb-1"><?= $row['judul'] ?></span>
                            </td>
                            <td class="text-muted fs-7">
                                <?= word_limiter($row['keterangan'], 15) ?>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-danger rounded-circle shadow-sm hover-lift" style="width: 38px; height: 38px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-image fs-1 mb-3 opacity-50"></i>
                                    <h6 class="fw-bold">Belum Ada Slider</h6>
                                    <p class="mb-0 fs-7">Silakan klik tombol tambah slider untuk membuat slideshow baru.</p>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Slider -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header-custom d-flex justify-content-between align-items-center">
                <h5 class="modal-title fw-bold text-dark"><i class="fas fa-plus-circle me-2"></i> Tambah Slider Baru</h5>
                <!-- PERBAIKAN: Menggunakan data-dismiss (Bootstrap 4 style) -->
                <button type="button" class="close text-dark shadow-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/aplikasi/simpan_slider') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body p-4 bg-white">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Judul Teks Slider</label>
                                <input type="text" class="form-control modern-input" name="judul" placeholder="Contoh: PPDB Telah Dibuka" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Keterangan / Deskripsi Singkat</label>
                                <textarea class="form-control modern-input" name="keterangan" rows="5" placeholder="Tuliskan keterangan singkat yang menarik di sini..." required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-secondary text-uppercase fs-7 tracking-wider">Unggah Foto (Resolusi 16:9)</label>
                            <div class="upload-box">
                                <input type="file" class="upload-input" name="foto" accept="image/*" onchange="previewFile(this, 'preview-slider')" required>
                                <div id="icon-slider">
                                    <i class="fas fa-cloud-upload-alt fs-1 text-warning mb-3 d-block"></i>
                                    <h6 class="fw-bold text-dark mb-1">Pilih / Tarik File Gambar</h6>
                                    <span class="text-muted fs-7">Format: JPG, PNG, WEBP</span>
                                </div>
                                <img id="preview-slider" class="preview-img mx-auto" alt="Preview">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0 bg-white d-flex justify-content-between">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-secondary border shadow-sm hover-lift" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-warning rounded-pill px-5 fw-bold text-dark shadow-sm bg-gradient-animated border-0 hover-lift">
                        <i class="fas fa-save me-2"></i> Simpan Slider
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewFile(input, previewId) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
                document.getElementById(previewId).style.display = 'block';
                document.getElementById('icon-slider').style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    }
</script>

<?= $this->endSection() ?>