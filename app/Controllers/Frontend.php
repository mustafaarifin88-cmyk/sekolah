<?php

namespace App\Controllers;

use App\Models\IdentitasSekolahModel;
use App\Models\SliderModel;
use App\Models\BeritaModel;
use App\Models\PengumumanModel;
use App\Models\DataKelulusanModel;
use App\Models\SiswaModel;

class Frontend extends BaseController
{
    public function index()
    {
        $identitasModel = new IdentitasSekolahModel();
        $sliderModel = new SliderModel();
        $beritaModel = new BeritaModel();

        $data = [
            'identitas' => $identitasModel->first(),
            'slider'    => $sliderModel->findAll(),
            'berita'    => $beritaModel->orderBy('tanggal_publish', 'DESC')->findAll(3)
        ];

        return view('frontend/home', $data);
    }

    public function berita()
    {
        $beritaModel = new BeritaModel();
        $data['berita'] = $beritaModel->orderBy('tanggal_publish', 'DESC')->paginate(6);
        $data['pager'] = $beritaModel->pager;
        return view('frontend/berita', $data);
    }

    public function detail_berita($id)
    {
        $beritaModel = new BeritaModel();
        $data['berita'] = $beritaModel->find($id);
        return view('frontend/detail_berita', $data);
    }

    public function pengumuman()
    {
        $pengumumanModel = new PengumumanModel();
        $data['pengumuman'] = $pengumumanModel->orderBy('created_at', 'DESC')->findAll();
        return view('frontend/pengumuman', $data);
    }

    public function cek_kelulusan()
    {
        $no_ujian = $this->request->getPost('no_ujian');
        $tgl_lahir = $this->request->getPost('tgl_lahir');

        $siswaModel = new SiswaModel();
        $lulusModel = new DataKelulusanModel();

        $siswa = $siswaModel->where('tanggal_lahir', $tgl_lahir)->first();

        if ($siswa) {
            $kelulusan = $lulusModel->where('id_siswa', $siswa['id_siswa'])
                                    ->where('nomor_ujian', $no_ujian)
                                    ->first();
            if ($kelulusan) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'data' => [
                        'nama' => $siswa['nama_siswa'],
                        'nisn' => $siswa['nisn'],
                        'tempat_lahir' => $siswa['tempat_lahir'],
                        'tanggal_lahir' => $siswa['tanggal_lahir'],
                        'status_kelulusan' => $kelulusan['status_kelulusan']
                    ]
                ]);
            }
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Data tidak ditemukan atau tidak cocok.'
        ]);
    }
}