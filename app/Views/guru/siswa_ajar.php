<?= $this->extend('layout/backend/template') ?>

<?= $this->section('content') ?>
<style>
    :root {
        --theme-gradient: linear-gradient(-45deg, #11998e, #38ef7d);
        --theme-shadow: rgba(17, 153, 142, 0.2);
    }
    .modern-card { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: none; background: #fff; }
    .table-modern th { background: #f8fafc; color: #475569; font-weight: 700; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; }
    .table-modern td { vertical-align: middle; border-bottom: 1px solid #f1f5f9; color: #334155; }
    .modern-input { border-radius: 20px; border: 2px solid #e2e8f0; padding: 12px 25px; font-weight: 500; background: #f8fafc; transition: all 0.3s ease; }
    .modern-input:focus { border-color: #11998e; background: #fff; box-shadow: 0 0 0 4px var(--theme-shadow); outline: none; }
</style>

<div class="row">
    <div class="col-12">
        <div class="modern-card p-4 mb-4" style="background: var(--theme-gradient);">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div class="text-white">
                    <h4 class="fw-bold mb-1"><i class="fas fa-users me-2"></i> Data Siswa Yang Diajar</h4>
                    <p class="mb-0 opacity-75 fs-7">Gunakan pencarian untuk memfilter data siswa per kelas dengan cepat.</p>
                </div>
            </div>
        </div>

        <div class="modern-card bg-white p-4">
            <div class="row mb-4 justify-content-end">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 rounded-start-pill text-muted ps-4"><i class="fas fa-search"></i></span>
                        <input type="text" id="filterSiswa" class="form-control border-start-0 rounded-end-pill modern-input" placeholder="Ketik nama atau ID kelas untuk mencari...">
                    </div>
                </div>
            </div>

            <div class="table-responsive rounded-4 border">
                <table class="table table-hover table-modern mb-0" id="tabelSiswa">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>Info Detail Siswa</th>
                            <th class="text-center">L/P</th>
                            <th class="text-center">Kelas</th>
                            <th>Tanggal Masuk / Pendaftaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($siswa) && count($siswa) > 0): foreach($siswa as $key => $row): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $key + 1 ?></td>
                            <td>
                                <div class="fw-bold text-dark fs-6"><?= $row['nama_siswa'] ?></div>
                                <span class="text-muted fs-7">NIS: <?= $row['nis'] ?> | NISN: <?= $row['nisn'] ?></span>
                            </td>
                            <td class="text-center">
                                <span class="badge <?= $row['jenis_kelamin'] == 'Laki-Laki' ? 'bg-primary text-primary' : 'bg-danger text-danger' ?> bg-opacity-10 px-2 py-1 rounded-pill"><?= $row['jenis_kelamin'] == 'Laki-Laki' ? 'L' : 'P' ?></span>
                            </td>
                            <td class="text-center"><span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill border border-success border-opacity-25 fs-6"><?= $row['nama_kelas'] ?? '-' ?></span></td>
                            <td class="text-secondary"><i class="far fa-id-badge text-success me-1"></i> <?= $row['jenis_pendaftaran'] ?></td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr id="emptyRow"><td colspan="5" class="text-center py-5 text-muted"><i class="fas fa-user-graduate fs-1 mb-3 opacity-50 d-block"></i>Belum ada data siswa terdaftar.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('filterSiswa').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#tabelSiswa tbody tr');
        let emptyRow = document.getElementById('emptyRow');
        
        rows.forEach(row => {
            if(row.id !== 'emptyRow') {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            }
        });
    });
</script>
<?= $this->endSection() ?>