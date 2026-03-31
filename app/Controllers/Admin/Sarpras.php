<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RuangModel;
use App\Models\KondisiModel;
use App\Models\BarangModel;
use App\Models\KerusakanModel;

class Sarpras extends BaseController
{
    public function ruang()
    {
        $model = new RuangModel();
        $data['ruang'] = $model->findAll();
        return view('admin/sarpras/ruang', $data);
    }

    public function kondisi()
    {
        $model = new KondisiModel();
        $data['kondisi'] = $model->findAll();
        return view('admin/sarpras/kondisi', $data);
    }

    public function barang()
    {
        $model = new BarangModel();
        $data['barang'] = $model->findAll();
        return view('admin/sarpras/barang', $data);
    }

    public function kerusakan()
    {
        $model = new KerusakanModel();
        $data['kerusakan'] = $model->findAll();
        return view('admin/sarpras/kerusakan', $data);
    }
}