ALTER TABLE `set_mapel_guru` 
ADD `hari` VARCHAR(20) NULL AFTER `id_mapel`,
ADD `jam_mulai` TIME NULL AFTER `hari`,
ADD `jam_selesai` TIME NULL AFTER `jam_mulai`;