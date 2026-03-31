<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriBeritaModel;
use App\Models\PengumumanModel;
use App\Models\KategoriPengumModel;

class Informasi extends BaseController
{
    public function kategori_berita()
    {
        $model = new KategoriBeritaModel();
        $data['kategori'] = $model->findAll();
        return view('admin/informasi/kategori_berita', $data);
    }

    public function berita()
    {
        $model = new BeritaModel();
        $data['berita'] = $model->findAll();
        return view('admin/informasi/berita', $data);
    }

    public function kategori_pengumuman()
    {
        $model = new KategoriPengumModel();
        $data['kategori'] = $model->findAll();
        return view('admin/informasi/kategori_pengumuman', $data);
    }

    public function pengumuman()
    {
        $model = new PengumumanModel();
        $katModel = new KategoriPengumModel();
        
        $data['pengumuman'] = $model->findAll();
        $data['kategori_list'] = $katModel->findAll(); // Mengambil daftar kategori untuk dropdown
        
        return view('admin/informasi/pengumuman', $data);
    }

    // FUNGSI BARU UNTUK MENYIMPAN DATA KE DATABASE
    public function simpan_pengumuman()
    {
        $model = new PengumumanModel();
        
        $data = [
            'id_kategori_p'    => $this->request->getPost('id_kategori_p'),
            'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
            'isi_pengumuman'   => $this->request->getPost('isi_pengumuman'),
            'id_user'          => session()->get('id_user') // Mengambil ID admin/user yang sedang login
        ];

        $model->insert($data);
        
        return redirect()->to(base_url('admin/informasi/pengumuman'))->with('success', 'Pengumuman berhasil ditambahkan');
    }
}