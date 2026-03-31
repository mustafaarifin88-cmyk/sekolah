<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\IdentitasSekolahModel;
use App\Models\MenuEksternalModel;
use App\Models\TemaModel;
use App\Models\SliderModel;
use App\Models\SetMapelGuruModel;
use App\Models\SetKelasWaliModel;
use App\Models\UserModel;

class Aplikasi extends BaseController
{
    public function identitas()
    {
        $model = new IdentitasSekolahModel();
        $data['identitas'] = $model->first();
        return view('admin/aplikasi/identitas', $data);
    }

    public function update_identitas()
    {
    }

    public function kepsek()
    {
        $model = new IdentitasSekolahModel();
        $data['kepsek'] = $model->first();
        return view('admin/aplikasi/kepsek', $data);
    }

    public function menu()
    {
        $model = new MenuEksternalModel();
        $data['menu'] = $model->findAll();
        return view('admin/aplikasi/menu', $data);
    }

    public function tema()
    {
        $model = new TemaModel();
        $data['tema'] = $model->first();
        return view('admin/aplikasi/tema', $data);
    }

    public function visimisi()
    {
        $model = new IdentitasSekolahModel();
        $data['visimisi'] = $model->first();
        return view('admin/aplikasi/visimisi', $data);
    }

    public function set_mapel()
    {
        $model = new SetMapelGuruModel();
        $data['set_mapel'] = $model->findAll();
        return view('admin/aplikasi/set_mapel', $data);
    }

    public function set_kelas()
    {
        $model = new SetKelasWaliModel();
        $data['set_kelas'] = $model->findAll();
        return view('admin/aplikasi/set_kelas', $data);
    }

    public function profil()
    {
        $model = new UserModel();
        $data['profil'] = $model->find(session()->get('id_user'));
        return view('admin/aplikasi/profil', $data);
    }

    public function slider()
    {
        $model = new SliderModel();
        $data['slider'] = $model->findAll();
        return view('admin/aplikasi/slider', $data);
    }
}