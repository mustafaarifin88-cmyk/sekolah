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
        $model = new IdentitasSekolahModel();
        
        // Cek apakah data identitas sudah ada di database (karena ini pengaturan single row)
        $identitas = $model->first();
        $id = $identitas ? $identitas['id'] : null;

        // Tangkap data teks dari input form
        $data = [
            'nama_sekolah'   => $this->request->getPost('nama_sekolah'),
            'alamat_sekolah' => $this->request->getPost('alamat_sekolah'),
            'nama_dinas'     => $this->request->getPost('nama_dinas'),
            'nama_kepsek'    => $this->request->getPost('nama_kepsek'),
            'nip_kepsek'     => $this->request->getPost('nip_kepsek'),
            'sk_kepsek'      => $this->request->getPost('sk_kepsek'),
        ];

        // Daftar input file yang perlu diproses
        $fileKeys = ['logo_sekolah', 'logo_pemda', 'foto_kepsek', 'ttd_kepsek'];
        
        foreach ($fileKeys as $key) {
            $file = $this->request->getFile($key);
            
            // Jika ada file yang diunggah dan valid
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Generate nama acak agar tidak bentrok
                $newName = $file->getRandomName();
                // Pindahkan file ke folder public/uploads/identitas/
                $file->move('uploads/identitas/', $newName);
                // Tambahkan nama file baru ke array data untuk disimpan ke DB
                $data[$key] = $newName;
            }
        }

        // Lakukan Insert jika data kosong, atau Update jika data sudah ada
        if ($id) {
            $model->update($id, $data);
        } else {
            $model->insert($data);
        }

        // Kembalikan ke halaman form dengan pesan sukses
        return redirect()->to(base_url('admin/aplikasi/identitas'))->with('success', 'Data Identitas berhasil diperbarui!');
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