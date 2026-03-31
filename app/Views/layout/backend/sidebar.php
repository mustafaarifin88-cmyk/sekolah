<aside class="main-sidebar sidebar-modern shadow-lg elevation-4">
    <a href="#" class="brand-link border-0 text-center py-4 bg-transparent">
        <img src="<?= base_url('uploads/identitas/logo.png') ?>" alt="Logo" class="brand-image img-circle shadow bg-white p-1" style="opacity: .9">
        <span class="brand-text font-weight-bold text-white fs-5">SIS Panel</span>
    </a>

    <div class="sidebar">
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="<?= base_url(session()->get('role') . '/dashboard') ?>" class="nav-link text-white nav-modern">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <?php if(session()->get('role') === 'admin'): ?>
                <li class="nav-header text-uppercase opacity-50 text-white fw-bold text-xs mt-3">Aplikasi & Info</li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white nav-modern">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Setting Aplikasi <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/aplikasi/identitas') ?>" class="nav-link text-white opacity-75"><i class="far fa-circle nav-icon fs-7"></i><p>Identitas & Kepsek</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/aplikasi/menu') ?>" class="nav-link text-white opacity-75"><i class="far fa-circle nav-icon fs-7"></i><p>Menu Frontend</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/aplikasi/slider') ?>" class="nav-link text-white opacity-75"><i class="far fa-circle nav-icon fs-7"></i><p>Slider Beranda</p></a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white nav-modern">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Pusat Informasi <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/informasi/berita') ?>" class="nav-link text-white opacity-75"><i class="far fa-circle nav-icon fs-7"></i><p>Berita</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/informasi/pengumuman') ?>" class="nav-link text-white opacity-75"><i class="far fa-circle nav-icon fs-7"></i><p>Pengumuman</p></a></li>
                    </ul>
                </li>
                
                <li class="nav-header text-uppercase opacity-50 text-white fw-bold text-xs mt-3">Sistem Inti</li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white nav-modern">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>Akademik <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/siswa') ?>" class="nav-link text-white opacity-75"><i class="far fa-circle nav-icon fs-7"></i><p>Data Siswa</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/guru') ?>" class="nav-link text-white opacity-75"><i class="far fa-circle nav-icon fs-7"></i><p>Data Guru</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/kelas') ?>" class="nav-link text-white opacity-75"><i class="far fa-circle nav-icon fs-7"></i><p>Data Kelas</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/mapel') ?>" class="nav-link text-white opacity-75"><i class="far fa-circle nav-icon fs-7"></i><p>Mata Pelajaran</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/akademik/jadwal') ?>" class="nav-link text-white opacity-75"><i class="far fa-circle nav-icon fs-7"></i><p>Jadwal Pelajaran</p></a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/kelulusan/setting') ?>" class="nav-link text-white nav-modern">
                        <i class="nav-icon fas fa-award"></i>
                        <p>Info Kelulusan</p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(session()->get('role') === 'guru' || session()->get('role') === 'walikelas'): ?>
                <li class="nav-header text-uppercase opacity-50 text-white fw-bold text-xs mt-3">Akademik</li>
                <li class="nav-item">
                    <a href="<?= base_url(session()->get('role') . '/akademik/input_nilai') ?>" class="nav-link text-white nav-modern">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Input Nilai Rapor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(session()->get('role') . '/akademik/jadwal') ?>" class="nav-link text-white nav-modern">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Jadwal Mengajar</p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(session()->get('role') === 'siswa'): ?>
                <li class="nav-header text-uppercase opacity-50 text-white fw-bold text-xs mt-3">Akademik Siswa</li>
                <li class="nav-item">
                    <a href="<?= base_url('siswa/rapor/cetak_rapor') ?>" class="nav-link text-white nav-modern">
                        <i class="nav-icon fas fa-file-pdf"></i>
                        <p>Cetak Rapor Digital</p>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </nav>
    </div>
</aside>