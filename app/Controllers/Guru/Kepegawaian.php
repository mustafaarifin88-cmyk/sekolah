<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\PendidikanGuruModel;
use App\Models\SertifikasiModel;
use App\Models\BebanKerjaModel;

class Kepegawaian extends BaseController
{
    public function riwayat()
    {
        $model = new PendidikanGuruModel();
        $data['pendidikan'] = $model->where('id_guru', session()->get('id_relasi'))->findAll();
        return view('guru/riwayat', $data);
    }

    public function sertifikasi()
    {
        $model = new SertifikasiModel();
        $data['sertifikasi'] = $model->where('id_guru', session()->get('id_relasi'))->findAll();
        return view('guru/sertifikasi', $data);
    }

    public function beban_kerja()
    {
        $model = new BebanKerjaModel();
        $data['beban'] = $model->where('id_guru', session()->get('id_relasi'))->findAll();
        return view('guru/beban_kerja', $data);
    }
}