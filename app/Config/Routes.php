<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Frontend::index');
$routes->get('berita', 'Frontend::berita');
$routes->get('berita/detail/(:segment)', 'Frontend::detail_berita/$1');
$routes->get('pengumuman', 'Frontend::pengumuman');
$routes->post('cek_kelulusan', 'Frontend::cek_kelulusan');

$routes->get('login', 'Auth::index');
$routes->post('login/proses', 'Auth::proses');
$routes->get('logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');
});

$routes->group('guru', ['filter' => 'guru'], static function ($routes) {
    $routes->get('/', 'Guru\Dashboard::index');
    $routes->get('dashboard', 'Guru\Dashboard::index');
});

$routes->group('walikelas', ['filter' => 'walikelas'], static function ($routes) {
    $routes->get('/', 'Walikelas\Dashboard::index');
    $routes->get('dashboard', 'Walikelas\Dashboard::index');
});

$routes->group('siswa', ['filter' => 'siswa'], static function ($routes) {
    $routes->get('/', 'Siswa\Dashboard::index');
    $routes->get('dashboard', 'Siswa\Dashboard::index');
});