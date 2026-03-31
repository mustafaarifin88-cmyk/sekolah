<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Sistem Informasi Sekolah</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @keyframes bgGradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .login-page {
            background: linear-gradient(-45deg, #1e3c72, #2a5298, #6a11cb, #2575fc);
            background-size: 400% 400%;
            animation: bgGradient 15s ease infinite;
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            padding: 40px;
            width: 100%;
            max-width: 450px;
        }
        .login-logo a {
            color: #ffffff;
            font-weight: 700;
            font-size: 32px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 12px;
            padding: 12px 20px;
            height: auto;
            font-size: 15px;
        }
        .form-control:focus {
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(255,255,255,0.3);
        }
        .input-group-text {
            background: transparent;
            border: none;
            color: rgba(255,255,255,0.8);
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
        }
        .btn-login {
            background: #ffffff;
            color: #2575fc;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 700;
            font-size: 16px;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(255,255,255,0.2);
        }
        .btn-login:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255,255,255,0.3);
            color: #1e3c72;
        }
        .text-light-custom {
            color: rgba(255,255,255,0.9);
        }
        .alert-custom {
            background: rgba(220, 53, 69, 0.8);
            color: white;
            border: none;
            border-radius: 10px;
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body class="login-page">

<div class="glass-panel">
    <div class="login-logo mb-4">
        <a href="<?= base_url('/') ?>"><b>SIS</b> Sekolah</a>
    </div>

    <p class="text-center text-light-custom mb-4 fw-light">Silakan masuk untuk melanjutkan</p>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-custom text-center mb-4 p-2 shadow-sm">
            <i class="fas fa-exclamation-circle me-1"></i> <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('login/proses') ?>" method="post">
        <div class="input-group mb-4 position-relative">
            <input type="text" name="username" class="form-control shadow-sm" placeholder="Username" required autocomplete="off">
            <div class="input-group-append">
                <div class="input-group-text text-dark opacity-50">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-4 position-relative">
            <input type="password" name="password" class="form-control shadow-sm" placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text text-dark opacity-50">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <button type="submit" class="btn btn-login w-100">MASUK <i class="fas fa-arrow-right ms-2"></i></button>
            </div>
        </div>
    </form>
    
    <div class="text-center mt-4">
        <a href="<?= base_url('/') ?>" class="text-light-custom text-decoration-none border-bottom border-light pb-1"><i class="fas fa-home me-1"></i> Kembali ke Beranda</a>
    </div>
</div>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>