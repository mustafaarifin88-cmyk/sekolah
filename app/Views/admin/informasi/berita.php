<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    .modern-card { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.04); border: none; }
    .table-modern th { background: #f8fafc; color: #475569; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; }
    .table-modern td { vertical-align: middle; border-bottom: 1px solid #f1f5f9; color: #334155; }
    .modern-input { border-radius: 12px; border: 2px solid #e2e8f0; padding: 12px 18px; font-weight: 500; background: #f8fafc; }
    .modern-input:focus { border-color: #4e54c8; background: #fff; box-shadow: 0 0 0 4px rgba(78, 84, 200, 0.15); outline: none; }
    .modal-content { border-radius: 24px; border: none; overflow: hidden; }
    .modal-header { background: linear-gradient(-45deg, #4e54c8, #8f94fb); padding: 20px 24px; border-bottom: none; color: white; }
    .thumb-preview { width: 80px; height: 60px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
</style>

<div class="row">
    <div class="col-12">
        <div class="modern-card bg-white p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3"><i class="fas fa-newspaper fs-4"></i></div>
                    <div>
                        <h5 class="fw-bold m-0 text-dark">Manajemen Publikasi Berita</h5>
                        <p class="text-muted fs-7 mb-0">Kelola artikel, berita kegiatan, dan liputan sekolah.</p>
                    </div>
                </div>
                <button class="btn text-white rounded-pill px-4 py-2 fw-bold shadow-sm hover-lift bg-gradient-animated" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus me-2"></i> Tulis Berita</button>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-modern datatable w-100">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center rounded-start">No</th>
                            <th width="10%">Thumbnail</th>
                            <th width="35%">Judul Berita</th>
                            <th>Status</th>
                            <th>Tanggal Terbit</th>
                            <th width="10%" class="text-center rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($berita) && count($berita) > 0): foreach($berita as $key => $row): ?>
                        <tr>
                            <td class="text-center"><?= $key + 1 ?></td>
                            <td><img src="<?= base_url('uploads/berita/'.$row['thumbnail']) ?>" class="thumb-preview"></td>
                            <td>
                                <span class="fw-bold text-dark d-block mb-1"><?= $row['judul_berita'] ?></span>
                            </td>
                            <td>
                                <?php if($row['status_publish'] == 'publish'): ?>
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill"><i class="fas fa-globe me-1"></i> Published</span>
                                <?php else: ?>
                                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-1 rounded-pill"><i class="fas fa-clock me-1"></i> Scheduled</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-muted fw-semibold fs-7"><?= date('d M Y, H:i', strtotime($row['tanggal_publish'])) ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-primary rounded-circle shadow-sm me-1" style="width:35px; height:35px;"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-light text-danger rounded-circle shadow-sm" style="width:35px; height:35px;"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada publikasi berita.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Berita -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header">
                <h5 class="modal-title fw-bold"><i class="fas fa-pen-nib me-2"></i> Tulis Berita Baru</h5>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admin/informasi/simpan_berita') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body p-4 bg-light">
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                                <div class="mb-4">
                                    <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Judul Berita</label>
                                    <input type="text" class="form-control modern-input" name="judul_berita" placeholder="Masukkan judul berita yang menarik..." required>
                                </div>
                                <div>
                                    <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Isi Konten Berita</label>
                                    <textarea name="isi_berita" class="summernote" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
                                <div class="mb-4">
                                    <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Kategori</label>
                                    <select name="id_kategori_b" class="form-control select2" required>
                                        <option value="">-- Pilih Kategori --</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Thumbnail Gambar</label>
                                    <input type="file" class="form-control modern-input" name="thumbnail" accept="image/*" required>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-4 shadow-sm">
                                <div class="mb-4">
                                    <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Status Publikasi</label>
                                    <select name="status_publish" id="status_publish" class="form-control modern-input" required>
                                        <option value="publish">Publish Langsung</option>
                                        <option value="schedule">Jadwalkan (Schedule)</option>
                                    </select>
                                </div>
                                <div class="mb-2" id="box_tanggal" style="display: none;">
                                    <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Pilih Tanggal & Waktu</label>
                                    <input type="datetime-local" class="form-control modern-input" name="tanggal_publish">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 bg-white d-flex justify-content-between">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-secondary border shadow-sm" data-bs-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold text-white shadow-lg hover-lift bg-gradient-animated border-0"><i class="fas fa-paper-plane me-2"></i> Terbitkan Berita</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('status_publish').addEventListener('change', function() {
            var box = document.getElementById('box_tanggal');
            if(this.value === 'schedule') {
                box.style.display = 'block';
            } else {
                box.style.display = 'none';
            }
        });
    });
</script>
<?= $this->endSection() ?>