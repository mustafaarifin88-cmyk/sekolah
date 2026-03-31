<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KurikulumModel;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use App\Models\GuruModel;
use App\Models\MapelModel;
use App\Models\JadwalModel;
use App\Models\RaporModel;

class Akademik extends BaseController
{
    public function kurikulum()
    {
        $model = new KurikulumModel();
        $data['kurikulum'] = $model->findAll();
        return view('admin/akademik/kurikulum', $data);
    }

    public function kelas()
    {
        $model = new KelasModel();
        $data['kelas'] = $model->findAll();
        return view('admin/akademik/kelas', $data);
    }

    public function siswa()
    {
        $model = new SiswaModel();
        $data['siswa'] = $model->findAll();
        return view('admin/akademik/siswa', $data);
    }

    public function guru()
    {
        $model = new GuruModel();
        $data['guru'] = $model->findAll();
        return view('admin/akademik/guru', $data);
    }

    public function mapel()
    {
        $model = new MapelModel();
        $data['mapel'] = $model->findAll();
        return view('admin/akademik/mapel', $data);
    }

    public function jadwal()
    {
        $model = new JadwalModel();
        $data['jadwal'] = $model->findAll();
        return view('admin/akademik/jadwal', $data);
    }

    public function pantau_rapor()
    {
        $model = new RaporModel();
        $data['rapor'] = $model->findAll();
        return view('admin/akademik/pantau_rapor', $data);
    }

    public function cetak_rapor()
    {
        $model = new SiswaModel();
        $data['siswa'] = $model->findAll();
        return view('admin/akademik/cetak_rapor', $data);
    }
}