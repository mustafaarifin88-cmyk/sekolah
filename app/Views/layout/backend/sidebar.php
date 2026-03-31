<?php 
$request = \Config\Services::request();
$uri = $request->getUri();
$seg1 = $uri->getTotalSegments() >= 1 ? $uri->getSegment(1) : '';
$seg2 = $uri->getTotalSegments() >= 2 ? $uri->getSegment(2) : '';
$seg3 = $uri->getTotalSegments() >= 3 ? $uri->getSegment(3) : '';
$role = session()->get('role');

$identitasModel = new \App\Models\IdentitasSekolahModel();
$identitas = $identitasModel->first();
$logoSidebar = ($identitas && !empty($identitas['logo_sekolah'])) ? base_url('uploads/identitas/' . $identitas['logo_sekolah']) : base_url('assets/dist/img/AdminLTELogo.png');
$namaSidebar = ($identitas && !empty($identitas['nama_sekolah'])) ? $identitas['nama_sekolah'] : 'SIS PANEL';
?>

<style>
    .sidebar-modern {
        background: linear-gradient(180deg, #161625 0%, #202035 100%) !important;
        border-right: 1px solid rgba(255,255,255,0.05) !important;
        box-shadow: 4px 0 20px rgba(0,0,0,0.3) !important;
    }
    .brand-link {
        border-bottom: 1px solid rgba(255,255,255,0.05) !important;
        background: rgba(0,0,0,0.2) !important;
        backdrop-filter: blur(10px);
        display: flex !important;
        align-items: center;
        justify-content: flex-start;
        padding: 0.8125rem 1rem !important;
    }
    .brand-link .brand-image {
        width: 35px;
        height: 35px;
        object-fit: contain;
        margin-left: 0;
        margin-right: 10px;
    }
    .brand-text {
        font-size: 0.95rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 170px;
    }
    .sidebar::-webkit-scrollbar {
        width: 6px;
    }
    .sidebar::-webkit-scrollbar-track {
        background: transparent;
    }
    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(255,255,255,0.1);
        border-radius: 10px;
    }
    .sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(255,255,255,0.3);
    }
    .nav-modern {
        border-radius: 12px;
        margin: 4px 12px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        color: rgba(255,255,255,0.7) !important;
        position: relative;
        overflow: hidden;
    }
    .nav-modern:hover {
        background: rgba(255,255,255,0.05) !important;
        color: #ffffff !important;
        transform: translateX(6px);
    }
    .nav-modern:hover .nav-icon {
        transform: scale(1.1) rotate(5deg);
        color: #38ef7d;
    }
    .nav-pills .nav-link.active, .nav-modern.active {
        background: linear-gradient(90deg, rgba(78,84,200,0.3) 0%, transparent 100%) !important;
        color: #ffffff !important;
        border-left: 4px solid #38ef7d;
        box-shadow: inset 5px 0 15px rgba(56, 239, 125, 0.1);
        font-weight: 600;
        transform: translateX(4px);
    }
    .nav-pills .nav-link.active .nav-icon {
        color: #38ef7d !important;
        text-shadow: 0 0 10px rgba(56, 239, 125, 0.5);
    }
    .nav-header {
        letter-spacing: 1.5px;
        font-size: 0.65rem !important;
        color: rgba(255,255,255,0.4) !important;
        padding-top: 1.5rem !important;
        padding-bottom: 0.5rem !important;
    }
    .nav-treeview {
        position: relative;
    }
    .nav-treeview::before {
        content: '';
        position: absolute;
        left: 28px;
        top: 0;
        bottom: 0;
        width: 1px;
        background: rgba(255,255,255,0.1);
    }
    .nav-treeview .nav-link {
        padding-left: 3.5rem !important;
    }
    .nav-treeview .nav-link::before {
        content: '';
        position: absolute;
        left: 28px;
        top: 50%;
        width: 10px;
        height: 1px;
        background: rgba(255,255,255,0.1);
    }
    .nav-treeview .nav-link.active {
        background: transparent !important;
        border-left: none;
        color: #38ef7d !important;
        transform: translateX(0);
        box-shadow: none;
    }
    .nav-treeview .nav-link.active i {
        color: #38ef7d !important;
    }
</style>

<aside class="main-sidebar sidebar-modern shadow-lg elevation-4">
    <a href="<?= base_url('/') ?>" class="brand-link" target="_blank">
        <img src="<?= $logoSidebar ?>" alt="Logo" class="brand-image img-circle shadow-lg bg-white p-1">
        <span class="brand-text font-weight-bold text-white tracking-wide"><?= strtoupper($namaSidebar) ?></span>
    </a>

    <div class="sidebar pb-4">
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="<?= base_url($role . '/dashboard') ?>" class="nav-link nav-modern <?= ($seg2 == 'dashboard' || $seg2 == '') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-laptop-house transition-all"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <?php if($role === 'admin'): ?>
                
                <li class="nav-header text-uppercase">PENGATURAN & INFO</li>
                
                <li class="nav-item <?= ($seg2 == 'aplikasi') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'aplikasi') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cogs transition-all"></i>
                        <p>Aplikasi <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/aplikasi/identitas') ?>" class="nav-link nav-modern <?= ($seg3 == 'identitas') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Identitas & Kepsek</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/aplikasi/menu') ?>" class="nav-link nav-modern <?= ($seg3 == 'menu') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Menu Frontend</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/aplikasi/slider') ?>" class="nav-link nav-modern <?= ($seg3 == 'slider') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Slider Beranda</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/aplikasi/tema') ?>" class="nav-link nav-modern <?= ($seg3 == 'tema') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Tema Header</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/aplikasi/visimisi') ?>" class="nav-link nav-modern <?= ($seg3 == 'visimisi') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Visi & Misi</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/aplikasi/set_mapel') ?>" class="nav-link nav-modern <?= ($seg3 == 'set_mapel') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Set Mapel Guru</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/aplikasi/set_kelas') ?>" class="nav-link nav-modern <?= ($seg3 == 'set_kelas') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Set Wali Kelas</p></a></li>
                    </ul>
                </li>

                <li class="nav-item <?= ($seg2 == 'informasi') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'informasi') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-bullhorn transition-all"></i>
                        <p>Pusat Informasi <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/informasi/kategori_berita') ?>" class="nav-link nav-modern <?= ($seg3 == 'kategori_berita') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Kategori Berita</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/informasi/berita') ?>" class="nav-link nav-modern <?= ($seg3 == 'berita') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Data Berita</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/informasi/kategori_pengumuman') ?>" class="nav-link nav-modern <?= ($seg3 == 'kategori_pengumuman') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Kat. Pengumuman</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/informasi/pengumuman') ?>" class="nav-link nav-modern <?= ($seg3 == 'pengumuman') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Data Pengumuman</p></a></li>
                    </ul>
                </li>
                
                <li class="nav-header text-uppercase">SISTEM MANAJEMEN</li>
                
                <li class="nav-item <?= ($seg2 == 'akademik') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'akademik') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-graduation-cap transition-all"></i>
                        <p>Akademik <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/kurikulum') ?>" class="nav-link nav-modern <?= ($seg3 == 'kurikulum') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Kurikulum</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/kelas') ?>" class="nav-link nav-modern <?= ($seg3 == 'kelas') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Data Kelas</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/siswa') ?>" class="nav-link nav-modern <?= ($seg3 == 'siswa') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Data Siswa</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/guru') ?>" class="nav-link nav-modern <?= ($seg3 == 'guru') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Data Guru</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/mapel') ?>" class="nav-link nav-modern <?= ($seg3 == 'mapel') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Mata Pelajaran</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/jadwal') ?>" class="nav-link nav-modern <?= ($seg3 == 'jadwal') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Jadwal Pelajaran</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/pantau_rapor') ?>" class="nav-link nav-modern <?= ($seg3 == 'pantau_rapor') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Pantau Input Rapor</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/cetak_rapor') ?>" class="nav-link nav-modern <?= ($seg3 == 'cetak_rapor') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Cetak Rapor</p></a></li>
                    </ul>
                </li>

                <li class="nav-item <?= ($seg2 == 'kesiswaan') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'kesiswaan') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users transition-all"></i>
                        <p>Kesiswaan <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/kesiswaan/eskul') ?>" class="nav-link nav-modern <?= ($seg3 == 'eskul') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Ekstrakurikuler</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/kesiswaan/prestasi') ?>" class="nav-link nav-modern <?= ($seg3 == 'prestasi') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Prestasi Siswa</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/kesiswaan/disiplin') ?>" class="nav-link nav-modern <?= ($seg3 == 'disiplin') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Kedisiplinan</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/kesiswaan/organisasi') ?>" class="nav-link nav-modern <?= ($seg3 == 'organisasi') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Organisasi</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/kesiswaan/bk') ?>" class="nav-link nav-modern <?= ($seg3 == 'bk') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Bimbingan Konseling</p></a></li>
                    </ul>
                </li>

                <li class="nav-item <?= ($seg2 == 'kepegawaian') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'kepegawaian') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-id-badge transition-all"></i>
                        <p>Kepegawaian <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/kepegawaian/riwayat_pendidikan') ?>" class="nav-link nav-modern <?= ($seg3 == 'riwayat_pendidikan') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Riwayat Pendidikan</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/kepegawaian/riwayat_pangkat') ?>" class="nav-link nav-modern <?= ($seg3 == 'riwayat_pangkat') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Riwayat Pangkat</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/kepegawaian/sertifikasi') ?>" class="nav-link nav-modern <?= ($seg3 == 'sertifikasi') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Sertifikasi</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/kepegawaian/beban_kerja') ?>" class="nav-link nav-modern <?= ($seg3 == 'beban_kerja') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Beban Kerja</p></a></li>
                    </ul>
                </li>

                <li class="nav-header text-uppercase">OPERASIONAL</li>

                <li class="nav-item <?= ($seg2 == 'keuangan') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'keuangan') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-wallet transition-all"></i>
                        <p>Keuangan <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/keuangan/bos') ?>" class="nav-link nav-modern <?= ($seg3 == 'bos') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Dana BOS</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/keuangan/pengeluaran') ?>" class="nav-link nav-modern <?= ($seg3 == 'pengeluaran') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Pengeluaran</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/keuangan/laporan') ?>" class="nav-link nav-modern <?= ($seg3 == 'laporan') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Laporan Keuangan</p></a></li>
                    </ul>
                </li>

                <li class="nav-item <?= ($seg2 == 'sarpras') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'sarpras') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-boxes transition-all"></i>
                        <p>Sarana & Prasarana <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/sarpras/ruang') ?>" class="nav-link nav-modern <?= ($seg3 == 'ruang') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Data Ruang</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/sarpras/kondisi') ?>" class="nav-link nav-modern <?= ($seg3 == 'kondisi') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Data Kondisi</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/sarpras/barang') ?>" class="nav-link nav-modern <?= ($seg3 == 'barang') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Inventaris Barang</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/sarpras/kerusakan') ?>" class="nav-link nav-modern <?= ($seg3 == 'kerusakan') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Lapor Kerusakan</p></a></li>
                    </ul>
                </li>

                <li class="nav-item <?= ($seg2 == 'administrasi') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'administrasi') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-folder-open transition-all"></i>
                        <p>Administrasi & Arsip <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/administrasi/kode_surat') ?>" class="nav-link nav-modern <?= ($seg3 == 'kode_surat') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Kode Surat</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/administrasi/sifat_surat') ?>" class="nav-link nav-modern <?= ($seg3 == 'sifat_surat') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Sifat Surat</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/administrasi/surat_masuk') ?>" class="nav-link nav-modern <?= ($seg3 == 'surat_masuk') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Surat Masuk</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/administrasi/surat_keluar') ?>" class="nav-link nav-modern <?= ($seg3 == 'surat_keluar') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Surat Keluar</p></a></li>
                    </ul>
                </li>

                <li class="nav-item <?= ($seg2 == 'kelulusan') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'kelulusan') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-award transition-all"></i>
                        <p>Info Kelulusan <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/kelulusan/setting') ?>" class="nav-link nav-modern <?= ($seg3 == 'setting') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Pengaturan Waktu</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/kelulusan/data') ?>" class="nav-link nav-modern <?= ($seg3 == 'data') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Data Kelulusan</p></a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($role === 'guru'): ?>
                <li class="nav-header text-uppercase">AKADEMIK & INFO</li>
                
                <li class="nav-item <?= ($seg2 == 'informasi') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'informasi') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-bullhorn transition-all"></i>
                        <p>Pusat Informasi <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('guru/informasi/berita') ?>" class="nav-link nav-modern <?= ($seg3 == 'berita') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Berita Saya</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('guru/informasi/pengumuman') ?>" class="nav-link nav-modern <?= ($seg3 == 'pengumuman') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Pengumuman Saya</p></a></li>
                    </ul>
                </li>

                <li class="nav-item <?= ($seg2 == 'akademik') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'akademik') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-edit transition-all"></i>
                        <p>Akademik <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('guru/akademik/siswa_ajar') ?>" class="nav-link nav-modern <?= ($seg3 == 'siswa_ajar') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Data Siswa Diajar</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('guru/akademik/input_nilai') ?>" class="nav-link nav-modern <?= ($seg3 == 'input_nilai') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Input Nilai Rapor</p></a></li>
                    </ul>
                </li>

                <li class="nav-header text-uppercase">PROFIL PEGAWAI</li>
                <li class="nav-item <?= ($seg2 == 'kepegawaian') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'kepegawaian') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-id-badge transition-all"></i>
                        <p>Kepegawaian <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('guru/kepegawaian/riwayat') ?>" class="nav-link nav-modern <?= ($seg3 == 'riwayat') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Riwayat Pendidikan</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('guru/kepegawaian/sertifikasi') ?>" class="nav-link nav-modern <?= ($seg3 == 'sertifikasi') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Sertifikasi</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('guru/kepegawaian/beban_kerja') ?>" class="nav-link nav-modern <?= ($seg3 == 'beban_kerja') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Beban Kerja</p></a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($role === 'walikelas'): ?>
                <li class="nav-header text-uppercase">PENGELOLAAN KELAS</li>
                
                <li class="nav-item <?= ($seg2 == 'akademik') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'akademik') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-chalkboard transition-all"></i>
                        <p>Akademik <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('walikelas/akademik/data_kelas') ?>" class="nav-link nav-modern <?= ($seg3 == 'data_kelas') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Data Kelas</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('walikelas/akademik/data_siswa') ?>" class="nav-link nav-modern <?= ($seg3 == 'data_siswa') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Data Siswa</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('walikelas/akademik/jadwal') ?>" class="nav-link nav-modern <?= ($seg3 == 'jadwal') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Jadwal Pelajaran</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('walikelas/akademik/input_nilai') ?>" class="nav-link nav-modern <?= ($seg3 == 'input_nilai') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Input Nilai</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('walikelas/akademik/pantau_nilai') ?>" class="nav-link nav-modern <?= ($seg3 == 'pantau_nilai') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Pantau Guru Mapel</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('walikelas/akademik/cetak_rapor') ?>" class="nav-link nav-modern <?= ($seg3 == 'cetak_rapor') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Cetak Rapor Digital</p></a></li>
                    </ul>
                </li>

                <li class="nav-item <?= ($seg2 == 'informasi') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'informasi') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-bullhorn transition-all"></i>
                        <p>Pusat Informasi <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('walikelas/informasi/berita') ?>" class="nav-link nav-modern <?= ($seg3 == 'berita') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Berita Saya</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('walikelas/informasi/pengumuman') ?>" class="nav-link nav-modern <?= ($seg3 == 'pengumuman') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Pengumuman Saya</p></a></li>
                    </ul>
                </li>

                <li class="nav-header text-uppercase">PROFIL PEGAWAI</li>
                <li class="nav-item <?= ($seg2 == 'kepegawaian') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link nav-modern <?= ($seg2 == 'kepegawaian') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-id-badge transition-all"></i>
                        <p>Kepegawaian <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('walikelas/kepegawaian/riwayat') ?>" class="nav-link nav-modern <?= ($seg3 == 'riwayat') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Riwayat Pendidikan</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('walikelas/kepegawaian/sertifikasi') ?>" class="nav-link nav-modern <?= ($seg3 == 'sertifikasi') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Sertifikasi</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('walikelas/kepegawaian/beban_kerja') ?>" class="nav-link nav-modern <?= ($seg3 == 'beban_kerja') ? 'active' : '' ?>"><i class="far fa-circle nav-icon fs-7"></i><p>Beban Kerja</p></a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($role === 'siswa'): ?>
                <li class="nav-header text-uppercase">LAYANAN SISWA</li>
                
                <li class="nav-item">
                    <a href="<?= base_url('siswa/rapor/cetak_rapor') ?>" class="nav-link nav-modern <?= ($seg2 == 'rapor') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-file-pdf transition-all text-danger"></i>
                        <p>Cetak Rapor Digital</p>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </nav>
    </div>
</aside>