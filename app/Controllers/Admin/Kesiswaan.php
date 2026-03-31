<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EskulModel;
use App\Models\PrestasiModel;
use App\Models\DisiplinModel;
use App\Models\OrganisasiModel;
use App\Models\BkModel;

class Kesiswaan extends BaseController
{
    public function eskul()
    {
        $model = new EskulModel();
        $data['eskul'] = $model->findAll();
        return view('admin/kesiswaan/eskul', $data);
    }

    public function prestasi()
    {
        $model = new PrestasiModel();
        $data['prestasi'] = $model->findAll();
        return view('admin/kesiswaan/prestasi', $data);
    }

    public function disiplin()
    {
        $model = new DisiplinModel();
        $data['disiplin'] = $model->findAll();
        return view('admin/kesiswaan/disiplin', $data);
    }

    public function organisasi()
    {
        $model = new OrganisasiModel();
        $data['organisasi'] = $model->findAll();
        return view('admin/kesiswaan/organisasi', $data);
    }

    public function bk()
    {
        $model = new BkModel();
        $data['bk'] = $model->findAll();
        return view('admin/kesiswaan/bk', $data);
    }
}