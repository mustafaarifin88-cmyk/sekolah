<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KodeSuratModel;
use App\Models\SifatSuratModel;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;

class Administrasi extends BaseController
{
    public function kode_surat()
    {
        $model = new KodeSuratModel();
        $data['kode_surat'] = $model->findAll();
        return view('admin/administrasi/kode_surat', $data);
    }

    public function sifat_surat()
    {
        $model = new SifatSuratModel();
        $data['sifat_surat'] = $model->findAll();
        return view('admin/administrasi/sifat_surat', $data);
    }

    public function surat_masuk()
    {
        $model = new SuratMasukModel();
        $data['surat_masuk'] = $model->findAll();
        return view('admin/administrasi/surat_masuk', $data);
    }

    public function surat_keluar()
    {
        $model = new SuratKeluarModel();
        $data['surat_keluar'] = $model->findAll();
        return view('admin/administrasi/surat_keluar', $data);
    }
}