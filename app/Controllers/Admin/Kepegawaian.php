<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendidikanGuruModel;
use App\Models\PangkatGuruModel;
use App\Models\SertifikasiModel;
use App\Models\BebanKerjaModel;

class Kepegawaian extends BaseController
{
    public function riwayat_pendidikan()
    {
        $model = new PendidikanGuruModel();
        $data['pendidikan'] = $model->findAll();
        return view('admin/kepegawaian/riwayat_pendidikan', $data);
    }

    public function riwayat_pangkat()
    {
        $model = new PangkatGuruModel();
        $data['pangkat'] = $model->findAll();
        return view('admin/kepegawaian/riwayat_pangkat', $data);
    }

    public function sertifikasi()
    {
        $model = new SertifikasiModel();
        $data['sertifikasi'] = $model->findAll();
        return view('admin/kepegawaian/sertifikasi', $data);
    }

    public function beban_kerja()
    {
        $model = new BebanKerjaModel();
        $data['beban'] = $model->findAll();
        return view('admin/kepegawaian/beban_kerja', $data);
    }
}