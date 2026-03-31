<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('siswa/dashboard');
    }
}