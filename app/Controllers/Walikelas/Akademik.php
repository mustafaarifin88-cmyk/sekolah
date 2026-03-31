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

    public function pantau_nilai()
    {
        $model = new RaporModel();
        $data['rapor'] = $model->findAll();
        return view('walikelas/pantau_nilai', $data);
    }

    public function cetak_rapor()
    {
        $model = new SiswaModel();
        $data['siswa'] = $model->findAll();
        return view('walikelas/cetak_rapor', $data);
    }
}