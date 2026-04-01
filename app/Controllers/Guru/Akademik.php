<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\RaporModel;

class Akademik extends BaseController
{
    public function siswa_ajar()
    {
        $db = \Config\Database::connect();
        $id_guru = session()->get('id_relasi');
        
        $kelas_diajar = $db->table('set_mapel_guru')->where('id_guru', $id_guru)->select('id_kelas')->distinct()->get()->getResultArray();
        $kelas_ids = array_column($kelas_diajar, 'id_kelas');
        
        if(!empty($kelas_ids)){
            $builder = $db->table('siswa');
            $builder->select('siswa.*, kelas.nama_kelas');
            $builder->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
            $builder->whereIn('siswa.id_kelas', $kelas_ids);
            $data['siswa'] = $builder->get()->getResultArray();
        } else {
            $data['siswa'] = [];
        }
        
        return view('guru/siswa_ajar', $data);
    }

    public function input_nilai()
    {
        $db = \Config\Database::connect();
        $id_guru = session()->get('id_relasi');
        
        $tugas_mengajar = $db->table('set_mapel_guru')
            ->select('set_mapel_guru.*, kelas.nama_kelas, mapel.nama_mapel')
            ->join('kelas', 'kelas.id_kelas = set_mapel_guru.id_kelas')
            ->join('mapel', 'mapel.id_mapel = set_mapel_guru.id_mapel')
            ->where('set_mapel_guru.id_guru', $id_guru)
            ->get()->getResultArray();
            
        $kelas_ids = array_column($tugas_mengajar, 'id_kelas');
        
        if(!empty($kelas_ids)){
            $data['siswa'] = $db->table('siswa')->whereIn('id_kelas', $kelas_ids)->get()->getResultArray();
        } else {
            $data['siswa'] = [];
        }

        $model = new RaporModel();
        $data['tugas'] = $tugas_mengajar;
        
        $builder = $db->table('nilai_rapor');
        $builder->select('nilai_rapor.*, siswa.nama_siswa, kelas.nama_kelas, mapel.nama_mapel');
        $builder->join('siswa', 'siswa.id_siswa = nilai_rapor.id_siswa');
        $builder->join('kelas', 'kelas.id_kelas = nilai_rapor.id_kelas');
        $builder->join('mapel', 'mapel.id_mapel = nilai_rapor.id_mapel');
        $builder->where('nilai_rapor.id_guru', $id_guru);
        
        $data['rapor'] = $builder->get()->getResultArray();
        
        return view('guru/input_nilai', $data);
    }

    public function simpan_nilai()
    {
        $model = new RaporModel();
        $tugas = explode('-', $this->request->getPost('tugas_mengajar'));
        
        $data = [
            'id_siswa' => $this->request->getPost('id_siswa'),
            'id_kelas' => $tugas[0],
            'id_mapel' => $tugas[1],
            'id_guru' => session()->get('id_relasi'),
            'semester' => $this->request->getPost('semester'),
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
            'nilai' => $this->request->getPost('nilai')
        ];
        $model->insert($data);
        return redirect()->to(base_url('guru/akademik/input_nilai'))->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function update_nilai($id)
    {
        $model = new RaporModel();
        $tugas = explode('-', $this->request->getPost('tugas_mengajar'));
        
        $data = [
            'id_siswa' => $this->request->getPost('id_siswa'),
            'id_kelas' => $tugas[0],
            'id_mapel' => $tugas[1],
            'semester' => $this->request->getPost('semester'),
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
            'nilai' => $this->request->getPost('nilai')
        ];
        $model->update($id, $data);
        return redirect()->to(base_url('guru/akademik/input_nilai'))->with('success', 'Nilai berhasil diperbarui.');
    }

    public function hapus_nilai($id)
    {
        $model = new RaporModel();
        $model->delete($id);
        return redirect()->to(base_url('guru/akademik/input_nilai'))->with('success', 'Nilai berhasil dihapus.');
    }

    public function import_nilai()
    {
        return redirect()->to(base_url('guru/akademik/input_nilai'))->with('success', 'Import Nilai berhasil dilakukan.');
    }
}