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
        $identitas = $model->first();
        $id = $identitas ? $identitas['id'] : null;

        $data = [
            'nama_sekolah'   => $this->request->getPost('nama_sekolah'),
            'alamat_sekolah' => $this->request->getPost('alamat_sekolah'),
            'nama_dinas'     => $this->request->getPost('nama_dinas'),
            'nama_kepsek'    => $this->request->getPost('nama_kepsek'),
            'nip_kepsek'     => $this->request->getPost('nip_kepsek'),
            'sk_kepsek'      => $this->request->getPost('sk_kepsek'),
        ];

        $fileKeys = ['logo_sekolah', 'logo_pemda', 'foto_kepsek', 'ttd_kepsek'];
        
        foreach ($fileKeys as $key) {
            $file = $this->request->getFile($key);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads/identitas/', $newName);
                $data[$key] = $newName;
            }
        }

        if ($id) {
            $model->update($id, $data);
        } else {
            $model->insert($data);
        }

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

    // INI ADALAH FUNGSI YANG MENYEBABKAN ERROR JIKA TIDAK ADA
    public function simpan_menu()
    {
        $model = new MenuEksternalModel();
        
        $data = [
            'nama_menu'      => $this->request->getPost('nama_menu'),
            'link_eksternal' => $this->request->getPost('link_eksternal'),
            'urutan'         => $this->request->getPost('urutan')
        ];

        $model->insert($data);
        
        return redirect()->to(base_url('admin/aplikasi/menu'))->with('success', 'Menu eksternal berhasil ditambahkan!');
    }

    public function tema()
    {
        $model = new TemaModel();
        $data['tema'] = $model->first();
        return view('admin/aplikasi/tema', $data);
    }

    public function update_tema()
    {
        $model = new TemaModel();
        $tema = $model->first();
        $id = $tema ? $tema['id'] : null;

        $data = [
            'tema_header' => $this->request->getPost('tema_header')
        ];

        if ($id) {
            $model->update($id, $data);
        } else {
            $model->insert($data);
        }

        return redirect()->to(base_url('admin/aplikasi/tema'))->with('success', 'Tema website berhasil diperbarui!');
    }

    public function visimisi()
    {
        $model = new IdentitasSekolahModel();
        $data['visimisi'] = $model->first();
        return view('admin/aplikasi/visimisi', $data);
    }

    public function update_visimisi()
    {
        $model = new IdentitasSekolahModel();
        $identitas = $model->first();
        $id = $identitas ? $identitas['id'] : null;

        $data = [
            'visi_misi' => $this->request->getPost('visi_misi')
        ];

        if ($id) {
            $model->update($id, $data);
        } else {
            $model->insert($data);
        }

        return redirect()->to(base_url('admin/aplikasi/visimisi'))->with('success', 'Visi dan Misi berhasil diperbarui!');
    }

    public function set_mapel()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('set_mapel_guru');
        $builder->select('set_mapel_guru.*, guru_tendik.nama_lengkap as nama_guru, mapel.nama_mapel');
        $builder->join('guru_tendik', 'guru_tendik.id_guru = set_mapel_guru.id_guru');
        $builder->join('mapel', 'mapel.id_mapel = set_mapel_guru.id_mapel');
        
        $data['set_mapel'] = $builder->get()->getResultArray();
        return view('admin/aplikasi/set_mapel', $data);
    }

    public function simpan_set_mapel()
    {
        $model = new SetMapelGuruModel();
        $id_guru = $this->request->getPost('id_guru');
        $id_mapel_array = $this->request->getPost('id_mapel');

        if (is_array($id_mapel_array)) {
            foreach ($id_mapel_array as $id_mapel) {
                $model->insert([
                    'id_guru' => $id_guru,
                    'id_mapel' => $id_mapel
                ]);
            }
        }

        return redirect()->to(base_url('admin/aplikasi/set_mapel'))->with('success', 'Penugasan Mata Pelajaran berhasil disimpan!');
    }

    public function set_kelas()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('set_kelas_wali');
        $builder->select('set_kelas_wali.*, guru_tendik.nama_lengkap as nama_guru, kelas.nama_kelas');
        $builder->join('guru_tendik', 'guru_tendik.id_guru = set_kelas_wali.id_guru');
        $builder->join('kelas', 'kelas.id_kelas = set_kelas_wali.id_kelas');
        
        $data['set_kelas'] = $builder->get()->getResultArray();
        return view('admin/aplikasi/set_kelas', $data);
    }

    public function simpan_set_kelas()
    {
        $model = new SetKelasWaliModel();
        
        $data = [
            'id_guru'  => $this->request->getPost('id_guru'),
            'id_kelas' => $this->request->getPost('id_kelas')
        ];

        $model->insert($data);
        
        return redirect()->to(base_url('admin/aplikasi/set_kelas'))->with('success', 'Wali Kelas berhasil ditugaskan!');
    }

    public function profil()
    {
        $model = new UserModel();
        $data['profil'] = $model->find(session()->get('id_user'));
        return view('admin/aplikasi/profil', $data);
    }

    public function update_profil()
    {
        $model = new UserModel();
        $id = session()->get('id_user');
        
        $data = [
            'username' => $this->request->getPost('username')
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/profil/', $newName);
            $data['foto'] = $newName;
            
            session()->set('foto', $newName);
        }

        session()->set('username', $data['username']);
        $model->update($id, $data);

        return redirect()->to(base_url('admin/aplikasi/profil'))->with('success', 'Profil admin berhasil diperbarui!');
    }

    public function slider()
    {
        $model = new SliderModel();
        $data['slider'] = $model->findAll();
        return view('admin/aplikasi/slider', $data);
    }

    public function simpan_slider()
    {
        $model = new SliderModel();
        
        $data = [
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/slider/', $newName);
            $data['foto'] = $newName;
        }

        $model->insert($data);

        return redirect()->to(base_url('admin/aplikasi/slider'))->with('success', 'Slider baru berhasil ditambahkan!');
    }
}