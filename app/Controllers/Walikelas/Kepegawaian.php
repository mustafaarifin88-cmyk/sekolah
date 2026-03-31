<?php

namespace App\Controllers\Walikelas;

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
        return view('walikelas/riwayat', $data);
    }

    public function sertifikasi()
    {
        $model = new SertifikasiModel();
        $data['sertifikasi'] = $model->where('id_guru', session()->get('id_relasi'))->findAll();
        return view('walikelas/sertifikasi', $data);
    }

    public function beban_kerja()
    {
        $model = new BebanKerjaModel();
        $data['beban'] = $model->where('id_guru', session()->get('id_relasi'))->findAll();
        return view('walikelas/beban_kerja', $data);
    }
}