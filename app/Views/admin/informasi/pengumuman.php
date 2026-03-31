<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    .modern-card { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.04); border: none; }
    .table-modern th { background: #f8fafc; color: #475569; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; }
    .table-modern td { vertical-align: middle; border-bottom: 1px solid #f1f5f9; color: #334155; }
    .modern-input { border-radius: 12px; border: 2px solid #e2e8f0; padding: 12px 18px; font-weight: 500; background: #f8fafc; }
    .modern-input:focus { border-color: #ff9a44; background: #fff; box-shadow: 0 0 0 4px rgba(255, 154, 68, 0.2); outline: none; }
    .modal-content { border-radius: 24px; border: none; overflow: hidden; }
    .modal-header { background: linear-gradient(135deg, #fc6076 0%, #ff9a44 100%); padding: 20px 24px; border-bottom: none; color: white; }
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
</style>

<div class="row">
    <div class="col-12">
        <div class="modern-card bg-white p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center">
                    <div class="bg-danger bg-opacity-10 text-danger rounded-3 p-3 me-3"><i class="fas fa-bullhorn fs-4"></i></div>
                    <div>
                        <h5 class="fw-bold m-0 text-dark">Data Pengumuman</h5>
                        <p class="text-muted fs-7 mb-0">Informasi dan pengumuman penting untuk warga sekolah.</p>
                    </div>
                </div>
                <button class="btn text-white rounded-pill px-4 py-2 fw-bold shadow-sm hover-lift" style="background: linear-gradient(135deg, #fc6076 0%, #ff9a44 100%); border: none;" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus me-2"></i> Buat Pengumuman</button>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-modern datatable w-100">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center rounded-start">No</th>
                            <th width="40%">Judul Pengumuman</th>
                            <th width="15%">Tanggal Terbit</th>
                            <th width="10%" class="text-center rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($pengumuman) && count($pengumuman) > 0): foreach($pengumuman as $key => $row): ?>
                        <tr>
                            <td class="text-center"><?= $key + 1 ?></td>
                            <td><span class="fw-bold text-dark d-block mb-1"><?= $row['judul_pengumuman'] ?></span></td>
                            <td class="text-muted fw-semibold fs-7"><i class="far fa-calendar-alt me-1"></i> <?= date('d M Y', strtotime($row['created_at'])) ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-primary rounded-circle shadow-sm me-1 hover-lift" style="width:35px; height:35px;"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-light text-danger rounded-circle shadow-sm hover-lift" style="width:35px; height:35px;"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada pengumuman.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-white"><i class="fas fa-edit me-2"></i> Tulis Pengumuman Baru</h5>
                <button type="button" class="close text-white shadow-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/informasi/simpan_pengumuman') ?>" method="post">
                <div class="modal-body p-4 bg-light">
                    <div class="row g-4">
                        <div class="col-lg-9">
                            <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                                <div class="mb-4">
                                    <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Judul Pengumuman</label>
                                    <input type="text" class="form-control modern-input" name="judul_pengumuman" placeholder="Contoh: Jadwal Ujian Semester Genap" required>
                                </div>
                                <div>
                                    <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Isi Pengumuman</label>
                                    <textarea name="isi_pengumuman" class="summernote" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                                <div class="mb-4">
                                    <label class="fw-bold text-secondary mb-2 fs-7 text-uppercase">Kategori</label>
                                    <select name="id_kategori_p" class="form-control select2" required>
                                        <option value="">-- Pilih --</option>
                                        <?php if(isset($kategori_list)): foreach($kategori_list as $kat): ?>
                                            <option value="<?= $kat['id_kategori_p'] ?>"><?= $kat['nama_kategori'] ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <div class="alert alert-warning border-0 shadow-sm rounded-4 mt-4 bg-warning bg-opacity-10 text-dark">
                                    <i class="fas fa-info-circle mb-2 fs-4 text-warning"></i><br>
                                    <small class="fw-semibold">Pengumuman akan langsung terlihat di halaman depan website pengunjung.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 bg-white d-flex justify-content-between">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-secondary border shadow-sm hover-lift" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn text-white rounded-pill px-5 fw-bold shadow-lg hover-lift border-0" style="background: linear-gradient(135deg, #fc6076 0%, #ff9a44 100%);"><i class="fas fa-paper-plane me-2"></i> Publikasikan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>