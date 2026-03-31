-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Mar 2026 pada 11.39
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `beban_kerja_guru`
--

CREATE TABLE `beban_kerja_guru` (
  `id_beban` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jumlah_jam_kerja` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_kategori_b` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi_berita` longtext NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `status_publish` enum('publish','schedule') NOT NULL DEFAULT 'publish',
  `tanggal_publish` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bk`
--

CREATE TABLE `bk` (
  `id_bk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `judul_kasus` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana_bos`
--

CREATE TABLE `dana_bos` (
  `id_bos` int(11) NOT NULL,
  `jumlah_dana_masuk` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tanggal_terima` date DEFAULT NULL,
  `tahun_anggaran` year(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelulusan`
--

CREATE TABLE `data_kelulusan` (
  `id_lulus` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nomor_ujian` varchar(50) NOT NULL,
  `status_kelulusan` enum('LULUS','TIDAK LULUS') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `eskul`
--

CREATE TABLE `eskul` (
  `id_eskul` int(11) NOT NULL,
  `nama_eskul` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_tendik`
--

CREATE TABLE `guru_tendik` (
  `id_guru` int(11) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `gelar_depan` varchar(50) DEFAULT NULL,
  `gelar_belakang` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `status_pegawai` enum('PNS','PPPK Penuh Waktu','PPPK Paruh Waktu','KKI','Honor Murni') NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nikki` varchar(50) DEFAULT NULL,
  `nuptk` varchar(50) DEFAULT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `no_sk_pengangkatan` varchar(100) DEFAULT NULL,
  `tgl_sk_pengangkatan` date DEFAULT NULL,
  `tahun_sk_pengangkatan` year(4) DEFAULT NULL,
  `no_npwp` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas_sekolah`
--

CREATE TABLE `identitas_sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `logo_sekolah` varchar(255) DEFAULT NULL,
  `alamat_sekolah` text DEFAULT NULL,
  `logo_pemda` varchar(255) DEFAULT NULL,
  `nama_dinas` varchar(255) DEFAULT NULL,
  `foto_kepsek` varchar(255) DEFAULT NULL,
  `nama_kepsek` varchar(255) DEFAULT NULL,
  `nip_kepsek` varchar(50) DEFAULT NULL,
  `sk_kepsek` varchar(255) DEFAULT NULL,
  `ttd_kepsek` varchar(255) DEFAULT NULL,
  `visi_misi` text DEFAULT NULL,
  `tema_header` varchar(50) DEFAULT 'bg-primary',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id_kategori_b` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pengumuman`
--

CREATE TABLE `kategori_pengumuman` (
  `id_kategori_p` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kedisiplinan`
--

CREATE TABLE `kedisiplinan` (
  `id_disiplin` int(11) NOT NULL,
  `nama_pelanggaran` varchar(255) NOT NULL,
  `poin` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerusakan_barang`
--

CREATE TABLE `kerusakan_barang` (
  `id_kerusakan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tingkat_kondisi` enum('Rusak Ringan','Rusak Sedang','Rusak Berat') NOT NULL,
  `tanggal_lapor` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_surat`
--

CREATE TABLE `kode_surat` (
  `id_kode_surat` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id_kurikulum` int(11) NOT NULL,
  `nama_kurikulum` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_eksternal`
--

CREATE TABLE `menu_eksternal` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `link_eksternal` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_rapor`
--

CREATE TABLE `nilai_rapor` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `semester` int(11) DEFAULT 1,
  `tahun_ajaran` varchar(20) DEFAULT NULL,
  `nilai` decimal(5,2) DEFAULT 0.00,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi`
--

CREATE TABLE `organisasi` (
  `id_organisasi` int(11) NOT NULL,
  `nama_organisasi` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_keuangan`
--

CREATE TABLE `pengeluaran_keuangan` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pengeluaran` varchar(255) NOT NULL,
  `jumlah_pengeluaran` decimal(15,2) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_kategori_p` int(11) NOT NULL,
  `judul_pengumuman` varchar(255) NOT NULL,
  `isi_pengumuman` longtext NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `nama_prestasi` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pangkat_guru`
--

CREATE TABLE `riwayat_pangkat_guru` (
  `id_riwayat_pkt` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `no_sk` varchar(100) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `tahun_sk` year(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pendidikan_guru`
--

CREATE TABLE `riwayat_pendidikan_guru` (
  `id_riwayat_pdd` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `asal_sekolah` varchar(150) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikasi_guru`
--

CREATE TABLE `sertifikasi_guru` (
  `id_sertifikasi` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_sertifikasi` varchar(200) NOT NULL,
  `tahun` year(4) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_kelulusan`
--

CREATE TABLE `setting_kelulusan` (
  `id_setting_lulus` int(11) NOT NULL,
  `tahun_ajar` varchar(20) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `jam_terbit` time NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL DEFAULT 'tidak aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_kelas_wali`
--

CREATE TABLE `set_kelas_wali` (
  `id_set_wali` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_mapel_guru`
--

CREATE TABLE `set_mapel_guru` (
  `id_set_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sifat_surat`
--

CREATE TABLE `sifat_surat` (
  `id_sifat_surat` int(11) NOT NULL,
  `sifat` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_siswa` varchar(150) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_pendaftaran` enum('Siswa Baru','Mutasi Masuk') DEFAULT 'Siswa Baru',
  `asal_sd` varchar(150) DEFAULT NULL,
  `no_ijazah_sd` varchar(100) DEFAULT NULL,
  `tahun_ijazah_sd` year(4) DEFAULT NULL,
  `no_shun_sd` varchar(100) DEFAULT NULL,
  `tahun_shun_sd` year(4) DEFAULT NULL,
  `asal_smp_sebelumnya` varchar(150) DEFAULT NULL,
  `no_ijazah_smp` varchar(100) DEFAULT NULL,
  `tahun_ijazah_smp` year(4) DEFAULT NULL,
  `no_shun_smp` varchar(100) DEFAULT NULL,
  `tahun_shun_smp` year(4) DEFAULT NULL,
  `nama_orang_tua` varchar(150) DEFAULT NULL,
  `pekerjaan_orang_tua` varchar(100) DEFAULT NULL,
  `penghasilan_orang_tua` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_disiplin`
--

CREATE TABLE `siswa_disiplin` (
  `id_siswa_disiplin` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_disiplin` int(11) NOT NULL,
  `tanggal_kejadian` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_eskul`
--

CREATE TABLE `siswa_eskul` (
  `id_siswa_eskul` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_eskul` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_prestasi`
--

CREATE TABLE `siswa_prestasi` (
  `id_siswa_prestasi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_prestasi` int(11) NOT NULL,
  `tingkat` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `id_kode_surat` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan_surat` varchar(150) NOT NULL,
  `perihal` longtext NOT NULL,
  `id_sifat_surat` int(11) NOT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `id_kode_surat` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `dari` varchar(150) NOT NULL,
  `perihal` longtext NOT NULL,
  `id_sifat_surat` int(11) NOT NULL,
  `tujuan_id_guru` int(11) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','walikelas','siswa') NOT NULL,
  `foto` varchar(255) DEFAULT 'default.png',
  `id_relasi` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`, `foto`, `id_relasi`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$57qSO2MRSClHSBp5.EDyTepRDkkgNiAHUKmUq5YnLeDVTjYd0g4AS', 'admin', 'default.png', NULL, '2026-03-31 16:39:03', '2026-03-31 16:39:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_kondisi` (`id_kondisi`);

--
-- Indeks untuk tabel `beban_kerja_guru`
--
ALTER TABLE `beban_kerja_guru`
  ADD PRIMARY KEY (`id_beban`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori_b` (`id_kategori_b`);

--
-- Indeks untuk tabel `bk`
--
ALTER TABLE `bk`
  ADD PRIMARY KEY (`id_bk`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `dana_bos`
--
ALTER TABLE `dana_bos`
  ADD PRIMARY KEY (`id_bos`);

--
-- Indeks untuk tabel `data_kelulusan`
--
ALTER TABLE `data_kelulusan`
  ADD PRIMARY KEY (`id_lulus`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `eskul`
--
ALTER TABLE `eskul`
  ADD PRIMARY KEY (`id_eskul`);

--
-- Indeks untuk tabel `guru_tendik`
--
ALTER TABLE `guru_tendik`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `identitas_sekolah`
--
ALTER TABLE `identitas_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori_b`);

--
-- Indeks untuk tabel `kategori_pengumuman`
--
ALTER TABLE `kategori_pengumuman`
  ADD PRIMARY KEY (`id_kategori_p`);

--
-- Indeks untuk tabel `kedisiplinan`
--
ALTER TABLE `kedisiplinan`
  ADD PRIMARY KEY (`id_disiplin`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kerusakan_barang`
--
ALTER TABLE `kerusakan_barang`
  ADD PRIMARY KEY (`id_kerusakan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `kode_surat`
--
ALTER TABLE `kode_surat`
  ADD PRIMARY KEY (`id_kode_surat`);

--
-- Indeks untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indeks untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `menu_eksternal`
--
ALTER TABLE `menu_eksternal`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `nilai_rapor`
--
ALTER TABLE `nilai_rapor`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indeks untuk tabel `pengeluaran_keuangan`
--
ALTER TABLE `pengeluaran_keuangan`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_kategori_p` (`id_kategori_p`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indeks untuk tabel `riwayat_pangkat_guru`
--
ALTER TABLE `riwayat_pangkat_guru`
  ADD PRIMARY KEY (`id_riwayat_pkt`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `riwayat_pendidikan_guru`
--
ALTER TABLE `riwayat_pendidikan_guru`
  ADD PRIMARY KEY (`id_riwayat_pdd`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `sertifikasi_guru`
--
ALTER TABLE `sertifikasi_guru`
  ADD PRIMARY KEY (`id_sertifikasi`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `setting_kelulusan`
--
ALTER TABLE `setting_kelulusan`
  ADD PRIMARY KEY (`id_setting_lulus`);

--
-- Indeks untuk tabel `set_kelas_wali`
--
ALTER TABLE `set_kelas_wali`
  ADD PRIMARY KEY (`id_set_wali`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `set_mapel_guru`
--
ALTER TABLE `set_mapel_guru`
  ADD PRIMARY KEY (`id_set_mapel`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `sifat_surat`
--
ALTER TABLE `sifat_surat`
  ADD PRIMARY KEY (`id_sifat_surat`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `siswa_disiplin`
--
ALTER TABLE `siswa_disiplin`
  ADD PRIMARY KEY (`id_siswa_disiplin`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_disiplin` (`id_disiplin`);

--
-- Indeks untuk tabel `siswa_eskul`
--
ALTER TABLE `siswa_eskul`
  ADD PRIMARY KEY (`id_siswa_eskul`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_eskul` (`id_eskul`);

--
-- Indeks untuk tabel `siswa_prestasi`
--
ALTER TABLE `siswa_prestasi`
  ADD PRIMARY KEY (`id_siswa_prestasi`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_prestasi` (`id_prestasi`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `id_kode_surat` (`id_kode_surat`),
  ADD KEY `id_sifat_surat` (`id_sifat_surat`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `id_kode_surat` (`id_kode_surat`),
  ADD KEY `id_sifat_surat` (`id_sifat_surat`),
  ADD KEY `tujuan_id_guru` (`tujuan_id_guru`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `beban_kerja_guru`
--
ALTER TABLE `beban_kerja_guru`
  MODIFY `id_beban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bk`
--
ALTER TABLE `bk`
  MODIFY `id_bk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dana_bos`
--
ALTER TABLE `dana_bos`
  MODIFY `id_bos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_kelulusan`
--
ALTER TABLE `data_kelulusan`
  MODIFY `id_lulus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `eskul`
--
ALTER TABLE `eskul`
  MODIFY `id_eskul` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru_tendik`
--
ALTER TABLE `guru_tendik`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `identitas_sekolah`
--
ALTER TABLE `identitas_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori_b` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_pengumuman`
--
ALTER TABLE `kategori_pengumuman`
  MODIFY `id_kategori_p` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kedisiplinan`
--
ALTER TABLE `kedisiplinan`
  MODIFY `id_disiplin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kerusakan_barang`
--
ALTER TABLE `kerusakan_barang`
  MODIFY `id_kerusakan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kode_surat`
--
ALTER TABLE `kode_surat`
  MODIFY `id_kode_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu_eksternal`
--
ALTER TABLE `menu_eksternal`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_rapor`
--
ALTER TABLE `nilai_rapor`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id_organisasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_keuangan`
--
ALTER TABLE `pengeluaran_keuangan`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pangkat_guru`
--
ALTER TABLE `riwayat_pangkat_guru`
  MODIFY `id_riwayat_pkt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pendidikan_guru`
--
ALTER TABLE `riwayat_pendidikan_guru`
  MODIFY `id_riwayat_pdd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sertifikasi_guru`
--
ALTER TABLE `sertifikasi_guru`
  MODIFY `id_sertifikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting_kelulusan`
--
ALTER TABLE `setting_kelulusan`
  MODIFY `id_setting_lulus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `set_kelas_wali`
--
ALTER TABLE `set_kelas_wali`
  MODIFY `id_set_wali` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `set_mapel_guru`
--
ALTER TABLE `set_mapel_guru`
  MODIFY `id_set_mapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sifat_surat`
--
ALTER TABLE `sifat_surat`
  MODIFY `id_sifat_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa_disiplin`
--
ALTER TABLE `siswa_disiplin`
  MODIFY `id_siswa_disiplin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa_eskul`
--
ALTER TABLE `siswa_eskul`
  MODIFY `id_siswa_eskul` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa_prestasi`
--
ALTER TABLE `siswa_prestasi`
  MODIFY `id_siswa_prestasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi` (`id_kondisi`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `beban_kerja_guru`
--
ALTER TABLE `beban_kerja_guru`
  ADD CONSTRAINT `beban_kerja_guru_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru_tendik` (`id_guru`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori_b`) REFERENCES `kategori_berita` (`id_kategori_b`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bk`
--
ALTER TABLE `bk`
  ADD CONSTRAINT `bk_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_kelulusan`
--
ALTER TABLE `data_kelulusan`
  ADD CONSTRAINT `data_kelulusan_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `guru_tendik` (`id_guru`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kerusakan_barang`
--
ALTER TABLE `kerusakan_barang`
  ADD CONSTRAINT `kerusakan_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_rapor`
--
ALTER TABLE `nilai_rapor`
  ADD CONSTRAINT `nilai_rapor_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_rapor_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_rapor_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_rapor_ibfk_4` FOREIGN KEY (`id_guru`) REFERENCES `guru_tendik` (`id_guru`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_kategori_p`) REFERENCES `kategori_pengumuman` (`id_kategori_p`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_pangkat_guru`
--
ALTER TABLE `riwayat_pangkat_guru`
  ADD CONSTRAINT `riwayat_pangkat_guru_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru_tendik` (`id_guru`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_pendidikan_guru`
--
ALTER TABLE `riwayat_pendidikan_guru`
  ADD CONSTRAINT `riwayat_pendidikan_guru_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru_tendik` (`id_guru`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sertifikasi_guru`
--
ALTER TABLE `sertifikasi_guru`
  ADD CONSTRAINT `sertifikasi_guru_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru_tendik` (`id_guru`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `set_kelas_wali`
--
ALTER TABLE `set_kelas_wali`
  ADD CONSTRAINT `set_kelas_wali_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru_tendik` (`id_guru`) ON DELETE CASCADE,
  ADD CONSTRAINT `set_kelas_wali_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `set_mapel_guru`
--
ALTER TABLE `set_mapel_guru`
  ADD CONSTRAINT `set_mapel_guru_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru_tendik` (`id_guru`) ON DELETE CASCADE,
  ADD CONSTRAINT `set_mapel_guru_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `siswa_disiplin`
--
ALTER TABLE `siswa_disiplin`
  ADD CONSTRAINT `siswa_disiplin_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_disiplin_ibfk_2` FOREIGN KEY (`id_disiplin`) REFERENCES `kedisiplinan` (`id_disiplin`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_eskul`
--
ALTER TABLE `siswa_eskul`
  ADD CONSTRAINT `siswa_eskul_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_eskul_ibfk_2` FOREIGN KEY (`id_eskul`) REFERENCES `eskul` (`id_eskul`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_prestasi`
--
ALTER TABLE `siswa_prestasi`
  ADD CONSTRAINT `siswa_prestasi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_prestasi_ibfk_2` FOREIGN KEY (`id_prestasi`) REFERENCES `prestasi` (`id_prestasi`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`id_kode_surat`) REFERENCES `kode_surat` (`id_kode_surat`) ON DELETE CASCADE,
  ADD CONSTRAINT `surat_keluar_ibfk_2` FOREIGN KEY (`id_sifat_surat`) REFERENCES `sifat_surat` (`id_sifat_surat`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`id_kode_surat`) REFERENCES `kode_surat` (`id_kode_surat`) ON DELETE CASCADE,
  ADD CONSTRAINT `surat_masuk_ibfk_2` FOREIGN KEY (`id_sifat_surat`) REFERENCES `sifat_surat` (`id_sifat_surat`) ON DELETE CASCADE,
  ADD CONSTRAINT `surat_masuk_ibfk_3` FOREIGN KEY (`tujuan_id_guru`) REFERENCES `guru_tendik` (`id_guru`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
