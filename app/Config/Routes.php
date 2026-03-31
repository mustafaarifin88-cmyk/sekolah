<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Frontend::index');
$routes->get('berita', 'Frontend::berita');
$routes->get('berita/detail/(:num)', 'Frontend::detail_berita/$1');
$routes->get('pengumuman', 'Frontend::pengumuman');
$routes->post('cek_kelulusan', 'Frontend::cek_kelulusan');

$routes->get('login', 'Auth::index');
$routes->post('login/proses', 'Auth::proses');
$routes->get('logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('profil', 'Admin\Aplikasi::profil');
    $routes->post('profil/update', 'Admin\Aplikasi::update_profil');

    $routes->group('aplikasi', static function ($routes) {
        $routes->get('identitas', 'Admin\Aplikasi::identitas');
        $routes->post('update_identitas', 'Admin\Aplikasi::update_identitas');
        $routes->get('kepsek', 'Admin\Aplikasi::kepsek');
        $routes->post('update_kepsek', 'Admin\Aplikasi::update_kepsek');
        $routes->get('menu', 'Admin\Aplikasi::menu');
        $routes->post('simpan_menu', 'Admin\Aplikasi::simpan_menu');
        $routes->get('tema', 'Admin\Aplikasi::tema');
        $routes->post('update_tema', 'Admin\Aplikasi::update_tema');
        $routes->get('visimisi', 'Admin\Aplikasi::visimisi');
        $routes->post('update_visimisi', 'Admin\Aplikasi::update_visimisi');
        $routes->get('set_kelas', 'Admin\Aplikasi::set_kelas');
        $routes->post('simpan_set_kelas', 'Admin\Aplikasi::simpan_set_kelas');
        $routes->get('set_mapel', 'Admin\Aplikasi::set_mapel');
        $routes->post('simpan_set_mapel', 'Admin\Aplikasi::simpan_set_mapel');
        $routes->get('slider', 'Admin\Aplikasi::slider');
        $routes->post('simpan_slider', 'Admin\Aplikasi::simpan_slider');
    });

    $routes->group('informasi', static function ($routes) {
        $routes->get('kategori_berita', 'Admin\Informasi::kategori_berita');
        $routes->post('simpan_kategori_berita', 'Admin\Informasi::simpan_kategori_berita');
        $routes->get('berita', 'Admin\Informasi::berita');
        $routes->post('simpan_berita', 'Admin\Informasi::simpan_berita');
        $routes->get('kategori_pengumuman', 'Admin\Informasi::kategori_pengumuman');
        $routes->post('simpan_kategori_pengumuman', 'Admin\Informasi::simpan_kategori_pengumuman');
        $routes->get('pengumuman', 'Admin\Informasi::pengumuman');
        $routes->post('simpan_pengumuman', 'Admin\Informasi::simpan_pengumuman');
    });

    $routes->group('akademik', static function ($routes) {
        $routes->get('kurikulum', 'Admin\Akademik::kurikulum');
        $routes->post('simpan_kurikulum', 'Admin\Akademik::simpan_kurikulum');
        $routes->get('kelas', 'Admin\Akademik::kelas');
        $routes->post('simpan_kelas', 'Admin\Akademik::simpan_kelas');
        $routes->get('siswa', 'Admin\Akademik::siswa');
        $routes->post('simpan_siswa', 'Admin\Akademik::simpan_siswa');
        $routes->post('import_siswa', 'Admin\Akademik::import_siswa');
        $routes->get('guru', 'Admin\Akademik::guru');
        $routes->post('simpan_guru', 'Admin\Akademik::simpan_guru');
        $routes->post('import_guru', 'Admin\Akademik::import_guru');
        $routes->get('mapel', 'Admin\Akademik::mapel');
        $routes->post('simpan_mapel', 'Admin\Akademik::simpan_mapel');
        $routes->get('jadwal', 'Admin\Akademik::jadwal');
        $routes->post('simpan_jadwal', 'Admin\Akademik::simpan_jadwal');
        $routes->get('pantau_rapor', 'Admin\Akademik::pantau_rapor');
        $routes->get('cetak_rapor', 'Admin\Akademik::cetak_rapor');
    });

    $routes->group('kesiswaan', static function ($routes) {
        $routes->get('eskul', 'Admin\Kesiswaan::eskul');
        $routes->post('simpan_eskul', 'Admin\Kesiswaan::simpan_eskul');
        $routes->get('prestasi', 'Admin\Kesiswaan::prestasi');
        $routes->post('simpan_prestasi', 'Admin\Kesiswaan::simpan_prestasi');
        $routes->get('disiplin', 'Admin\Kesiswaan::disiplin');
        $routes->post('simpan_disiplin', 'Admin\Kesiswaan::simpan_disiplin');
        $routes->get('organisasi', 'Admin\Kesiswaan::organisasi');
        $routes->post('simpan_organisasi', 'Admin\Kesiswaan::simpan_organisasi');
        $routes->get('bk', 'Admin\Kesiswaan::bk');
        $routes->post('simpan_bk', 'Admin\Kesiswaan::simpan_bk');
    });

    $routes->group('kepegawaian', static function ($routes) {
        $routes->get('riwayat_pendidikan', 'Admin\Kepegawaian::riwayat_pendidikan');
        $routes->post('simpan_riwayat_pendidikan', 'Admin\Kepegawaian::simpan_riwayat_pendidikan');
        $routes->get('riwayat_pangkat', 'Admin\Kepegawaian::riwayat_pangkat');
        $routes->post('simpan_riwayat_pangkat', 'Admin\Kepegawaian::simpan_riwayat_pangkat');
        $routes->get('sertifikasi', 'Admin\Kepegawaian::sertifikasi');
        $routes->post('simpan_sertifikasi', 'Admin\Kepegawaian::simpan_sertifikasi');
        $routes->get('beban_kerja', 'Admin\Kepegawaian::beban_kerja');
        $routes->post('simpan_beban_kerja', 'Admin\Kepegawaian::simpan_beban_kerja');
    });

    $routes->group('keuangan', static function ($routes) {
        $routes->get('bos', 'Admin\Keuangan::bos');
        $routes->post('simpan_bos', 'Admin\Keuangan::simpan_bos');
        $routes->get('pengeluaran', 'Admin\Keuangan::pengeluaran');
        $routes->post('simpan_pengeluaran', 'Admin\Keuangan::simpan_pengeluaran');
        $routes->get('laporan', 'Admin\Keuangan::laporan');
    });

    $routes->group('sarpras', static function ($routes) {
        $routes->get('ruang', 'Admin\Sarpras::ruang');
        $routes->post('simpan_ruang', 'Admin\Sarpras::simpan_ruang');
        $routes->get('kondisi', 'Admin\Sarpras::kondisi');
        $routes->post('simpan_kondisi', 'Admin\Sarpras::simpan_kondisi');
        $routes->get('barang', 'Admin\Sarpras::barang');
        $routes->post('simpan_barang', 'Admin\Sarpras::simpan_barang');
        $routes->get('kerusakan', 'Admin\Sarpras::kerusakan');
        $routes->post('simpan_kerusakan', 'Admin\Sarpras::simpan_kerusakan');
    });

    $routes->group('administrasi', static function ($routes) {
        $routes->get('kode_surat', 'Admin\Administrasi::kode_surat');
        $routes->post('simpan_kode_surat', 'Admin\Administrasi::simpan_kode_surat');
        $routes->get('sifat_surat', 'Admin\Administrasi::sifat_surat');
        $routes->post('simpan_sifat_surat', 'Admin\Administrasi::simpan_sifat_surat');
        $routes->get('surat_masuk', 'Admin\Administrasi::surat_masuk');
        $routes->post('simpan_surat_masuk', 'Admin\Administrasi::simpan_surat_masuk');
        $routes->get('surat_keluar', 'Admin\Administrasi::surat_keluar');
        $routes->post('simpan_surat_keluar', 'Admin\Administrasi::simpan_surat_keluar');
    });

    $routes->group('kelulusan', static function ($routes) {
        $routes->get('setting', 'Admin\Kelulusan::setting');
        $routes->post('simpan_setting', 'Admin\Kelulusan::simpan_setting');
        $routes->get('data', 'Admin\Kelulusan::data');
        $routes->post('simpan_data', 'Admin\Kelulusan::simpan_data');
    });
});

$routes->group('guru', ['filter' => 'guru'], static function ($routes) {
    $routes->get('/', 'Guru\Dashboard::index');
    $routes->get('dashboard', 'Guru\Dashboard::index');
    $routes->get('profil', 'Guru\Profil::index');
    $routes->post('profil/update', 'Guru\Profil::update_profil');

    $routes->group('informasi', static function ($routes) {
        $routes->get('berita', 'Guru\Informasi::berita');
        $routes->post('simpan_berita', 'Guru\Informasi::simpan_berita');
        $routes->get('pengumuman', 'Guru\Informasi::pengumuman');
        $routes->post('simpan_pengumuman', 'Guru\Informasi::simpan_pengumuman');
    });

    $routes->group('akademik', static function ($routes) {
        $routes->get('siswa_ajar', 'Guru\Akademik::siswa_ajar');
        $routes->get('input_nilai', 'Guru\Akademik::input_nilai');
        $routes->post('simpan_nilai', 'Guru\Akademik::simpan_nilai');
        $routes->post('import_nilai', 'Guru\Akademik::import_nilai');
    });

    $routes->group('kepegawaian', static function ($routes) {
        $routes->get('riwayat', 'Guru\Kepegawaian::riwayat');
        $routes->post('simpan_riwayat', 'Guru\Kepegawaian::simpan_riwayat');
        $routes->get('sertifikasi', 'Guru\Kepegawaian::sertifikasi');
        $routes->post('simpan_sertifikasi', 'Guru\Kepegawaian::simpan_sertifikasi');
        $routes->get('beban_kerja', 'Guru\Kepegawaian::beban_kerja');
    });
});

$routes->group('walikelas', ['filter' => 'walikelas'], static function ($routes) {
    $routes->get('/', 'Walikelas\Dashboard::index');
    $routes->get('dashboard', 'Walikelas\Dashboard::index');
    $routes->get('profil', 'Walikelas\Profil::index');
    $routes->post('profil/update', 'Walikelas\Profil::update_profil');

    $routes->group('informasi', static function ($routes) {
        $routes->get('berita', 'Walikelas\Informasi::berita');
        $routes->post('simpan_berita', 'Walikelas\Informasi::simpan_berita');
        $routes->get('pengumuman', 'Walikelas\Informasi::pengumuman');
        $routes->post('simpan_pengumuman', 'Walikelas\Informasi::simpan_pengumuman');
    });

    $routes->group('akademik', static function ($routes) {
        $routes->get('data_kelas', 'Walikelas\Akademik::data_kelas');
        $routes->get('data_siswa', 'Walikelas\Akademik::data_siswa');
        $routes->get('jadwal', 'Walikelas\Akademik::jadwal');
        $routes->get('input_nilai', 'Walikelas\Akademik::input_nilai');
        $routes->post('simpan_nilai', 'Walikelas\Akademik::simpan_nilai');
        $routes->get('pantau_nilai', 'Walikelas\Akademik::pantau_nilai');
        $routes->get('cetak_rapor', 'Walikelas\Akademik::cetak_rapor');
    });

    $routes->group('kepegawaian', static function ($routes) {
        $routes->get('riwayat', 'Walikelas\Kepegawaian::riwayat');
        $routes->post('simpan_riwayat', 'Walikelas\Kepegawaian::simpan_riwayat');
        $routes->get('sertifikasi', 'Walikelas\Kepegawaian::sertifikasi');
        $routes->post('simpan_sertifikasi', 'Walikelas\Kepegawaian::simpan_sertifikasi');
        $routes->get('beban_kerja', 'Walikelas\Kepegawaian::beban_kerja');
    });
});

$routes->group('siswa', ['filter' => 'siswa'], static function ($routes) {
    $routes->get('/', 'Siswa\Dashboard::index');
    $routes->get('dashboard', 'Siswa\Dashboard::index');
    $routes->get('profil', 'Siswa\Profil::index');
    $routes->post('profil/update', 'Siswa\Profil::update_profil');

    $routes->group('rapor', static function ($routes) {
        $routes->get('cetak_rapor', 'Siswa\Rapor::cetak_rapor');
    });
});