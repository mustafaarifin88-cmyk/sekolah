<?php

namespace App\Controllers\Walikelas;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\PengumumanModel;

class Informasi extends BaseController
{
    public function berita()
    {
        $model = new BeritaModel();
        $data['berita'] = $model->where('id_user', session()->get('id_user'))->findAll();
        return view('walikelas/berita', $data);
    }

    public function pengumuman()
    {
        $model = new PengumumanModel();
        $data['pengumuman'] = $model->where('id_user', session()->get('id_user'))->findAll();
        return view('walikelas/pengumuman', $data);
    }
}