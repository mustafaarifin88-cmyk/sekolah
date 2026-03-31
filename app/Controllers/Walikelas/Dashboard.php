<?php

namespace App\Controllers\Walikelas;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('walikelas/dashboard');
    }
}