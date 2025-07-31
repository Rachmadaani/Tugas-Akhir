<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #000000 0%, #4f4f4f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            position: relative;
        }

        .logo-top {
            position: absolute;
            top: 20px;
            left: 30px;
        }

        .logo-top img {
            height: 50px;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 0.5rem;
        }

        .input-group-text {
            background-color: #2575fc;
            border-radius: 0.5rem 0 0 0.5rem;
        }

        .btn-success {
            border-radius: 0.5rem;
        }

        .form-label {
            font-weight: 600;
        }

        .logo-text {
            font-size: 2rem;
            font-weight: bold;
            color: #2575fc;
        }
    </style>
</head>

<body>

    <!-- Logo kiri atas -->
    <div class="logo-top">
        <img src="<?= base_url('assets/komdigi/komdigi.png') ?>" alt="Logo Komdigi">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card p-4 bg-white">
                    <div class="text-center mb-4">
                        <span class="logo-text">Daftar Akun</span>
                        <p class="text-muted">Buat akun baru untuk mulai bergabung</p>
                    </div>

                    <form action="<?= site_url('authuser/registeruser') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="username" id="username" class="form-control" value="<?= old('username') ?>" required>
                            </div>
                            <small class="form-text text-muted">
                                Harap masukkan username sesuai dengan nama lengkap Anda.
                            </small>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>" required>
                            </div>
                            <small class="form-text text-muted">
                                Harap gunakan alamat email yang aktif dan valid.
                            </small>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 mt-2">Register</button>
                    </form>

                    <p class="text-center mt-3">Sudah punya akun? <a href="<?= site_url('authuser/login') ?>">Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap & FontAwesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if (session()->getFlashdata('success_message')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Registrasi Berhasil!',
                text: '<?= session()->getFlashdata('success_message') ?>',
                showConfirmButton: false,
                timer: 2500
            });
        <?php elseif (session()->getFlashdata('error_message')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Registrasi Gagal',
                text: '<?= session()->getFlashdata('error_message') ?>',
                showConfirmButton: false,
                timer: 3000
            });
        <?php endif; ?>
    </script>

</body>

</html>