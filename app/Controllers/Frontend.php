<?php

namespace App\Controllers;

use App\Models\IdentitasSekolahModel;
use App\Models\SliderModel;
use App\Models\BeritaModel;
use App\Models\PengumumanModel;
use App\Models\DataKelulusanModel;
use App\Models\SiswaModel;
use App\Models\SetKelulusanModel;
use App\Models\SuratKeluarModel;
use App\Models\KurikulumModel;
use App\Models\KelasModel;
use App\Models\GuruModel;
use App\Models\PrestasiModel;

class Frontend extends BaseController
{
    public function index()
    {
        $identitasModel = new IdentitasSekolahModel();
        $sliderModel = new SliderModel();
        $beritaModel = new BeritaModel();
        $pengumumanModel = new PengumumanModel();
        $arsipModel = new SuratKeluarModel();

        $data = [
            'identitas' => $identitasModel->first(),
            'slider'    => $sliderModel->findAll(),
            'berita_terbaru' => $beritaModel->where('status_publish', 'publish')->orderBy('tanggal_publish', 'DESC')->findAll(5),
            'pengumuman_terbaru' => $pengumumanModel->orderBy('created_at', 'DESC')->findAll(5),
            'arsip_terbaru' => $arsipModel->orderBy('tanggal_surat', 'DESC')->findAll(5)
        ];

        return view('frontend/home', $data);
    }

    public function berita()
    {
        $beritaModel = new BeritaModel();
        $data['berita'] = $beritaModel->where('status_publish', 'publish')->orderBy('tanggal_publish', 'DESC')->paginate(6);
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

    public function kurikulum()
    {
        $model = new KurikulumModel();
        $data['kurikulum'] = $model->findAll();
        return view('frontend/akademik/kurikulum', $data);
    }

    public function kelas()
    {
        $model = new KelasModel();
        $data['kelas'] = $model->findAll();
        return view('frontend/akademik/kelas', $data);
    }

    public function siswa()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('siswa.nama_siswa, siswa.nisn, siswa.jenis_kelamin, kelas.nama_kelas');
        $builder->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
        $builder->orderBy('kelas.nama_kelas', 'ASC');
        $builder->orderBy('siswa.nama_siswa', 'ASC');
        $data['siswa'] = $builder->get()->getResultArray();
        return view('frontend/akademik/siswa', $data);
    }

    public function guru()
    {
        $model = new GuruModel();
        $data['guru'] = $model->orderBy('nama_lengkap', 'ASC')->findAll();
        return view('frontend/akademik/guru', $data);
    }

    public function visimisi()
    {
        $model = new IdentitasSekolahModel();
        $data['identitas'] = $model->first();
        return view('frontend/akademik/visimisi', $data);
    }

    public function prestasi()
    {
        $model = new PrestasiModel();
        $data['prestasi'] = $model->findAll();
        return view('frontend/akademik/prestasi', $data);
    }

    public function cek_kelulusan()
    {
        $settingModel = new SetKelulusanModel();
        $setting = $settingModel->where('status', 'Aktif')->first();

        if (!$setting) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Pengumuman kelulusan belum diaktifkan oleh admin sekolah.'
            ]);
        }

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
            'message' => 'Data tidak ditemukan. Silakan periksa kembali Nomor Ujian dan Tanggal Lahir.'
        ]);
    }
}