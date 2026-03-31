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

    $routes->group('aplikasi', static function ($routes) {
        $routes->get('identitas', 'Admin\Aplikasi::identitas');
        $routes->post('update_identitas', 'Admin\Aplikasi::update_identitas');
        $routes->get('kepsek', 'Admin\Aplikasi::kepsek');
        $routes->get('menu', 'Admin\Aplikasi::menu');
        $routes->post('simpan_menu', 'Admin\Aplikasi::simpan_menu');
        $routes->get('tema', 'Admin\Aplikasi::tema');
        $routes->post('update_tema', 'Admin\Aplikasi::update_tema');
        $routes->get('visimisi', 'Admin\Aplikasi::visimisi');
        $routes->post('update_visimisi', 'Admin\Aplikasi::update_visimisi');
        $routes->get('set_mapel', 'Admin\Aplikasi::set_mapel');
        $routes->post('simpan_set_mapel', 'Admin\Aplikasi::simpan_set_mapel');
        $routes->get('set_kelas', 'Admin\Aplikasi::set_kelas');
        $routes->post('simpan_set_kelas', 'Admin\Aplikasi::simpan_set_kelas');
        $routes->get('profil', 'Admin\Aplikasi::profil');
        $routes->post('update_profil', 'Admin\Aplikasi::update_profil');
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
        $routes->get('kelas', 'Admin\Akademik::kelas');
        $routes->get('siswa', 'Admin\Akademik::siswa');
        $routes->get('guru', 'Admin\Akademik::guru');
        $routes->get('mapel', 'Admin\Akademik::mapel');
        $routes->get('jadwal', 'Admin\Akademik::jadwal');
        $routes->get('pantau_rapor', 'Admin\Akademik::pantau_rapor');
        $routes->get('cetak_rapor', 'Admin\Akademik::cetak_rapor');
    });

    $routes->group('kesiswaan', static function ($routes) {
        $routes->get('eskul', 'Admin\Kesiswaan::eskul');
        $routes->get('prestasi', 'Admin\Kesiswaan::prestasi');
        $routes->get('disiplin', 'Admin\Kesiswaan::disiplin');
        $routes->get('organisasi', 'Admin\Kesiswaan::organisasi');
        $routes->get('bk', 'Admin\Kesiswaan::bk');
    });

    $routes->group('kepegawaian', static function ($routes) {
        $routes->get('riwayat_pendidikan', 'Admin\Kepegawaian::riwayat_pendidikan');
        $routes->get('riwayat_pangkat', 'Admin\Kepegawaian::riwayat_pangkat');
        $routes->get('sertifikasi', 'Admin\Kepegawaian::sertifikasi');
        $routes->get('beban_kerja', 'Admin\Kepegawaian::beban_kerja');
    });

    $routes->group('keuangan', static function ($routes) {
        $routes->get('bos', 'Admin\Keuangan::bos');
        $routes->get('pengeluaran', 'Admin\Keuangan::pengeluaran');
        $routes->get('laporan', 'Admin\Keuangan::laporan');
    });

    $routes->group('sarpras', static function ($routes) {
        $routes->get('ruang', 'Admin\Sarpras::ruang');
        $routes->get('kondisi', 'Admin\Sarpras::kondisi');
        $routes->get('barang', 'Admin\Sarpras::barang');
        $routes->get('kerusakan', 'Admin\Sarpras::kerusakan');
    });

    $routes->group('administrasi', static function ($routes) {
        $routes->get('kode_surat', 'Admin\Administrasi::kode_surat');
        $routes->get('sifat_surat', 'Admin\Administrasi::sifat_surat');
        $routes->get('surat_masuk', 'Admin\Administrasi::surat_masuk');
        $routes->get('surat_keluar', 'Admin\Administrasi::surat_keluar');
    });

    $routes->group('kelulusan', static function ($routes) {
        $routes->get('setting', 'Admin\Kelulusan::setting');
        $routes->get('data', 'Admin\Kelulusan::data');
    });
});

$routes->group('guru', ['filter' => 'guru'], static function ($routes) {
    $routes->get('/', 'Guru\Dashboard::index');
    $routes->get('dashboard', 'Guru\Dashboard::index');
    $routes->get('profil', 'Guru\Profil::index');

    $routes->group('informasi', static function ($routes) {
        $routes->get('berita', 'Guru\Informasi::berita');
        $routes->get('pengumuman', 'Guru\Informasi::pengumuman');
    });

    $routes->group('akademik', static function ($routes) {
        $routes->get('siswa_ajar', 'Guru\Akademik::siswa_ajar');
        $routes->get('input_nilai', 'Guru\Akademik::input_nilai');
    });

    $routes->group('kepegawaian', static function ($routes) {
        $routes->get('riwayat', 'Guru\Kepegawaian::riwayat');
        $routes->get('sertifikasi', 'Guru\Kepegawaian::sertifikasi');
        $routes->get('beban_kerja', 'Guru\Kepegawaian::beban_kerja');
    });
});

$routes->group('walikelas', ['filter' => 'walikelas'], static function ($routes) {
    $routes->get('/', 'Walikelas\Dashboard::index');
    $routes->get('dashboard', 'Walikelas\Dashboard::index');
    $routes->get('profil', 'Walikelas\Profil::index');

    $routes->group('informasi', static function ($routes) {
        $routes->get('berita', 'Walikelas\Informasi::berita');
        $routes->get('pengumuman', 'Walikelas\Informasi::pengumuman');
    });

    $routes->group('akademik', static function ($routes) {
        $routes->get('data_kelas', 'Walikelas\Akademik::data_kelas');
        $routes->get('data_siswa', 'Walikelas\Akademik::data_siswa');
        $routes->get('jadwal', 'Walikelas\Akademik::jadwal');
        $routes->get('input_nilai', 'Walikelas\Akademik::input_nilai');
        $routes->get('pantau_nilai', 'Walikelas\Akademik::pantau_nilai');
        $routes->get('cetak_rapor', 'Walikelas\Akademik::cetak_rapor');
    });

    $routes->group('kepegawaian', static function ($routes) {
        $routes->get('riwayat', 'Walikelas\Kepegawaian::riwayat');
        $routes->get('sertifikasi', 'Walikelas\Kepegawaian::sertifikasi');
        $routes->get('beban_kerja', 'Walikelas\Kepegawaian::beban_kerja');
    });
});

$routes->group('siswa', ['filter' => 'siswa'], static function ($routes) {
    $routes->get('/', 'Siswa\Dashboard::index');
    $routes->get('dashboard', 'Siswa\Dashboard::index');
    $routes->get('profil', 'Siswa\Profil::index');
    
    $routes->group('rapor', static function ($routes) {
        $routes->get('cetak_rapor', 'Siswa\Rapor::cetak_rapor');
    });
});