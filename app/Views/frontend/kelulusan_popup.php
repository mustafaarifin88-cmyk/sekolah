<div class="modal fade" id="modalKelulusan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(20px);">
            <div class="modal-header bg-gradient-animated border-0 p-4">
                <h5 class="modal-title fw-bold text-white"><i class="fas fa-graduation-cap me-2"></i> Cek Info Kelulusan</h5>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="text-center mb-4">
                    <p class="text-secondary fw-semibold">Silakan masukkan Nomor Ujian dan Tanggal Lahir Anda dengan benar.</p>
                </div>
                <form id="form-cek-kelulusan" action="<?= base_url('cek_kelulusan') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Nomor Ujian</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 text-primary"><i class="fas fa-id-card"></i></span>
                            <input type="text" class="form-control form-control-lg bg-light border-0 shadow-none" id="no_ujian" name="no_ujian" placeholder="Contoh: 01-001-001-8" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Tanggal Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 text-primary"><i class="fas fa-calendar-alt"></i></span>
                            <input type="date" class="form-control form-control-lg bg-light border-0 shadow-none" id="tgl_lahir" name="tgl_lahir" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold text-white py-3 shadow-sm bg-gradient-animated border-0 hover-lift">CEK KELULUSAN SEKARANG</button>
                </form>
                
                <div class="loader mt-4 text-center" style="display: none;">
                    <div class="spinner-grow text-primary" role="status"></div>
                    <div class="spinner-grow text-success" role="status"></div>
                    <div class="spinner-grow text-info" role="status"></div>
                    <p class="text-muted mt-2 fw-semibold">Memverifikasi data...</p>
                </div>

                <div class="result-container mt-4 p-4 rounded-4 border-0 shadow-sm bg-white" style="display: none;">
                    <table class="table table-borderless text-dark mb-0 fs-6">
                        <tr><td class="fw-bold text-muted w-25">Nama</td><td class="fw-bold" id="res_nama"></td></tr>
                        <tr><td class="fw-bold text-muted w-25">NISN</td><td class="fw-bold" id="res_nisn"></td></tr>
                        <tr><td class="fw-bold text-muted w-25">TTL</td><td class="fw-bold" id="res_ttl"></td></tr>
                        <tr><td colspan="2" class="text-center pt-4 border-top mt-3"><div id="res_status" class="display-6 fw-black text-uppercase tracking-wider"></div></td></tr>
                    </table>
                </div>
                
                <div id="error-message" class="alert alert-danger rounded-4 mt-4 border-0 shadow-sm d-flex align-items-center" style="display: none;">
                    <i class="fas fa-exclamation-triangle fs-4 me-3"></i>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>