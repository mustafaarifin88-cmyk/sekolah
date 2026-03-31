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
        $data['rapor'] = $model->findAll();
        return view('guru/input_nilai', $data);
    }
}