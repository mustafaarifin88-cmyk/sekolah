-- Buat Tabel Beban Kerja (Jika belum ada)
CREATE TABLE IF NOT EXISTS `beban_kerja` (
  `id_beban` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) NOT NULL,
  `jumlah_jam_kerja` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_beban`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tambahkan kolom jadwal di set_mapel_guru (Abaikan/hapus baris yang error jika kolom sudah ada)
ALTER TABLE `set_mapel_guru` 
ADD `id_kelas` INT(11) NULL AFTER `id_guru`,
ADD `hari` VARCHAR(20) NULL AFTER `id_mapel`,
ADD `jam_mulai` TIME NULL AFTER `hari`,
ADD `jam_selesai` TIME NULL AFTER `jam_mulai`;