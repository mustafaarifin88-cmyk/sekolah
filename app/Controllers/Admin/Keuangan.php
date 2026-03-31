<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KeuanganBosModel;
use App\Models\PengeluaranModel;

class Keuangan extends BaseController
{
    public function bos()
    {
        $model = new KeuanganBosModel();
        $data['bos'] = $model->findAll();
        return view('admin/keuangan/bos', $data);
    }

    public function pengeluaran()
    {
        $model = new PengeluaranModel();
        $data['pengeluaran'] = $model->findAll();
        return view('admin/keuangan/pengeluaran', $data);
    }

    public function laporan()
    {
        return view('admin/keuangan/laporan');
    }
}