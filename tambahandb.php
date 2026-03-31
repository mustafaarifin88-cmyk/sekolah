ALTER TABLE `siswa` MODIFY `id_kelas` int(11) NULL DEFAULT NULL;
ALTER TABLE `set_mapel_guru` ADD `id_kelas` INT(11) NULL AFTER `id_guru`;