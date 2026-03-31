<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\RaporModel;

class Akademik extends BaseController
{
    public function siswa_ajar()
    {
        $model = new SiswaModel();
        $data['siswa'] = $model->findAll();
        return view('guru/siswa_ajar', $data);
    }

    public function input_nilai()
    {
        $model = new RaporModel();
        $data['rapor'] = $model->where('id_guru', session()->get('id_relasi'))->findAll();
        return view('guru/input_nilai', $data);
    }

    public function simpan_nilai()
    {
        $model = new RaporModel();
        $data = [
            'id_siswa' => $this->request->getPost('id_siswa'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_mapel' => $this->request->getPost('id_mapel'),
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
        $data = [
            'id_siswa' => $this->request->getPost('id_siswa'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_mapel' => $this->request->getPost('id_mapel'),
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