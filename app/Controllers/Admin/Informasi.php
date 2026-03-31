<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriBeritaModel;
use App\Models\PengumumanModel;
use App\Models\KategoriPengumModel;

class Informasi extends BaseController
{
    public function kategori_berita()
    {
        $model = new KategoriBeritaModel();
        $data['kategori'] = $model->findAll();
        return view('admin/informasi/kategori_berita', $data);
    }

    public function berita()
    {
        $model = new BeritaModel();
        $data['berita'] = $model->findAll();
        return view('admin/informasi/berita', $data);
    }

    public function kategori_pengumuman()
    {
        $model = new KategoriPengumModel();
        $data['kategori'] = $model->findAll();
        return view('admin/informasi/kategori_pengumuman', $data);
    }

    public function pengumuman()
    {
        $model = new PengumumanModel();
        $data['pengumuman'] = $model->findAll();
        return view('admin/informasi/pengumuman', $data);
    }
}