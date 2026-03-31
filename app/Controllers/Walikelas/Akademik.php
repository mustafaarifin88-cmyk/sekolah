<?php

namespace App\Controllers\Walikelas;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use App\Models\JadwalModel;
use App\Models\RaporModel;

class Akademik extends BaseController
{
    public function data_kelas()
    {
        $model = new KelasModel();
        $data['kelas'] = $model->findAll();
        return view('walikelas/data_kelas', $data);
    }

    public function data_siswa()
    {
        $model = new SiswaModel();
        $data['siswa'] = $model->findAll();
        return view('walikelas/data_siswa', $data);
    }

    public function jadwal()
    {
        $model = new JadwalModel();
        $data['jadwal'] = $model->findAll();
        return view('walikelas/jadwal', $data);
    }

    public function input_nilai()
    {
        $model = new RaporModel();
        $data['rapor'] = $model->where('id_guru', session()->get('id_relasi'))->findAll();
        return view('walikelas/input_nilai', $data);
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
        return redirect()->to(base_url('walikelas/akademik/input_nilai'))->with('success', 'Nilai berhasil ditambahkan.');
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
        return redirect()->to(base_url('walikelas/akademik/input_nilai'))->with('success', 'Nilai berhasil diperbarui.');
    }

    public function hapus_nilai($id)
    {
        $model = new RaporModel();
        $model->delete($id);
        return redirect()->to(base_url('walikelas/akademik/input_nilai'))->with('success', 'Nilai berhasil dihapus.');
    }

    public function pantau_nilai()
    {
        $model = new RaporModel();
        $data['rapor'] = $model->findAll();
        return view('walikelas/pantau_nilai', $data);
    }

    public function cetak_rapor()
    {
        $model = new RaporModel();
        $data['rapor'] = $model->findAll();
        return view('walikelas/cetak_rapor', $data);
    }
}