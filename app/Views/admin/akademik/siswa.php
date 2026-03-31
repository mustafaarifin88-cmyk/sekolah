<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    .modern-card { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: none; background: #fff; }
    .table-modern th { background: #f8fafc; color: #475569; font-weight: 700; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; }
    .table-modern td { vertical-align: middle; border-bottom: 1px solid #f1f5f9; color: #334155; }
    .modern-input { border-radius: 12px; border: 2px solid #e2e8f0; padding: 12px 18px; font-weight: 500; background: #f8fafc; transition: all 0.3s ease; }
    .modern-input:focus { border-color: #4e54c8; background: #fff; box-shadow: 0 0 0 4px rgba(78, 84, 200, 0.15); outline: none; }
    .modal-content { border-radius: 24px; border: none; overflow: hidden; }
    .modal-header-custom { background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%); padding: 24px; border-bottom: none; }
    .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-lift:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
    .section-title { font-size: 0.85rem; font-weight: 800; color: #4e54c8; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; border-bottom: 2px dashed #e2e8f0; padding-bottom: 8px; }
</style>

<div class="row">
    <div class="col-12">
        <div class="modern-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3">
                        <i class="fas fa-user-graduate fs-4"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold m-0 text-dark">Data Induk Siswa</h5>
                        <p class="text-muted fs-7 mb-0">Kelola data profil, akademik, dan latar belakang siswa.</p>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-success rounded-pill px-4 py-2 fw-bold shadow-sm hover-lift border-2" data-toggle="modal" data-target="#modalImport">
                        <i class="fas fa-file-excel me-2"></i> Import
                    </button>
                    <button class="btn text-white rounded-pill px-4 py-2 fw-bold shadow-sm hover-lift border-0 bg-gradient-animated" data-toggle="modal" data-target="#modalTambah">
                        <i class="fas fa-plus me-2"></i> Tambah Siswa
                    </button>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-modern datatable w-100">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center rounded-start">No</th>
                            <th>NIS / NISN</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Status Pendaftaran</th>
                            <th width="10%" class="text-center rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($siswa) && count($siswa) > 0): foreach($siswa as $key => $row): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $key + 1 ?></td>
                            <td>
                                <span class="fw-bold text-dark d-block"><?= $row['nis'] ?></span>
                                <span class="text-muted fs-7"><?= $row['nisn'] ?></span>
                            </td>
                            <td class="fw-bold text-primary"><?= $row['nama_siswa'] ?></td>
                            <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill"><?= $row['id_kelas'] ?></span></td>
                            <td>
                                <?php if($row['jenis_pendaftaran'] == 'Siswa Baru'): ?>
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill">Siswa Baru</span>
                                <?php else: ?>
                                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-1 rounded-pill">Mutasi</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-light text-primary rounded-circle shadow-sm me-1 hover-lift" style="width: 35px; height: 35px;"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-light text-danger rounded-circle shadow-sm hover-lift" style="width: 35px; height: 35px;"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="6" class="text-center py-5 text-muted"><i class="fas fa-users fs-1 mb-3 opacity-50 d-block"></i>Belum ada data siswa.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content shadow-lg">
            <div class="modal-header-custom d-flex justify-content-between align-items-center">
                <h5 class="modal-title fw-bold text-white"><i class="fas fa-user-plus me-2"></i> Form Registrasi Siswa Baru</h5>
                <button type="button" class="close text-white shadow-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body p-4 bg-light">
                <form action="<?= base_url('admin/akademik/simpan_siswa') ?>" method="post">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                                <div class="section-title"><i class="fas fa-id-card me-2"></i>Identitas Pribadi</div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-secondary fs-7">Nama Lengkap</label>
                                    <input type="text" class="form-control modern-input" name="nama_siswa" required>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-6">
                                        <label class="form-label fw-bold text-secondary fs-7">NIS</label>
                                        <input type="text" class="form-control modern-input" name="nis" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label fw-bold text-secondary fs-7">NISN</label>
                                        <input type="text" class="form-control modern-input" name="nisn">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-6">
                                        <label class="form-label fw-bold text-secondary fs-7">Tempat Lahir</label>
                                        <input type="text" class="form-control modern-input" name="tempat_lahir">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label fw-bold text-secondary fs-7">Tanggal Lahir</label>
                                        <input type="date" class="form-control modern-input" name="tanggal_lahir">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-6">
                                        <label class="form-label fw-bold text-secondary fs-7">Jenis Pendaftaran</label>
                                        <select class="form-control modern-input" name="jenis_pendaftaran">
                                            <option value="Siswa Baru">Siswa Baru</option>
                                            <option value="Mutasi Masuk">Mutasi Masuk</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label fw-bold text-secondary fs-7">Pilih Kelas</label>
                                        <select class="form-control modern-input" name="id_kelas">
                                            <option value="">-- Tentukan Kelas --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
                                <div class="section-title"><i class="fas fa-school me-2"></i>Riwayat Sekolah Asal</div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-secondary fs-7">Asal Sekolah Sebelumnya</label>
                                    <input type="text" class="form-control modern-input" name="asal_sd">
                                </div>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label fw-bold text-secondary fs-7">No. Ijazah</label>
                                        <input type="text" class="form-control modern-input" name="no_ijazah_sd">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label fw-bold text-secondary fs-7">Tahun Lulus</label>
                                        <input type="text" class="form-control modern-input" name="tahun_ijazah_sd">
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-4 shadow-sm">
                                <div class="section-title"><i class="fas fa-users me-2"></i>Data Orang Tua / Wali</div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-secondary fs-7">Nama Orang Tua / Wali</label>
                                    <input type="text" class="form-control modern-input" name="nama_orang_tua">
                                </div>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label fw-bold text-secondary fs-7">Pekerjaan</label>
                                        <input type="text" class="form-control modern-input" name="pekerjaan_orang_tua">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label fw-bold text-secondary fs-7">Penghasilan / Bulan</label>
                                        <input type="text" class="form-control modern-input" name="penghasilan_orang_tua">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer border-0 p-4 bg-white d-flex justify-content-between">
                <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-secondary shadow-sm hover-lift" data-dismiss="modal">Batalkan</button>
                <button type="submit" class="btn text-white rounded-pill px-5 fw-bold shadow-lg hover-lift border-0 bg-gradient-animated"><i class="fas fa-save me-2"></i> Simpan Data Siswa</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalImport" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-success border-0 p-4">
                <h5 class="modal-title fw-bold text-white"><i class="fas fa-file-excel me-2"></i> Import Data Excel</h5>
                <button type="button" class="close text-white shadow-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= base_url('admin/akademik/import_siswa') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body p-4 bg-white text-center">
                    <i class="fas fa-cloud-upload-alt text-success" style="font-size: 4rem; margin-bottom: 15px;"></i>
                    <h6 class="fw-bold mb-3">Pilih File Excel (.xlsx)</h6>
                    <input type="file" class="form-control modern-input" name="file_excel" accept=".xlsx, .xls" required>
                    <a href="#" class="d-block mt-3 text-decoration-none fw-semibold"><i class="fas fa-download me-1"></i> Download Template Kosong</a>
                </div>
                <div class="modal-footer border-0 p-4 pt-0 bg-white">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-secondary shadow-sm hover-lift" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success rounded-pill px-5 fw-bold shadow-sm hover-lift border-0"><i class="fas fa-upload me-2"></i> Proses Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>