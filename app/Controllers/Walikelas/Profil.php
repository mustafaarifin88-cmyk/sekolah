<?php

namespace App\Controllers\Walikelas;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['profil'] = $model->find(session()->get('id_user'));
        return view('walikelas/profil', $data);
    }
}