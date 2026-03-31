<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SetKelulusanModel;
use App\Models\DataKelulusanModel;

class Kelulusan extends BaseController
{
    public function setting()
    {
        $model = new SetKelulusanModel();
        $data['setting'] = $model->findAll();
        return view('admin/kelulusan/setting', $data);
    }

    public function data()
    {
        $model = new DataKelulusanModel();
        $data['kelulusan'] = $model->findAll();
        return view('admin/kelulusan/data', $data);
    }
}