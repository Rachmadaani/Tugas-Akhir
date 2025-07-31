<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
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
            color: white;
            border-radius: 0.5rem 0 0 0.5rem;
        }

        .btn-primary {
            background-color: #2575fc;
            border: none;
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

        .text-muted a {
            color: #2575fc;
        }

        .text-muted a:hover {
            text-decoration: underline;
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
                        <span class="logo-text">Login User</span>
                        <p class="text-muted">Masukkan data akun kamu untuk masuk</p>
                    </div>

                    <form action="<?= site_url('authuser/loginuser') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="username" id="username" value="<?= old('username') ?>" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
                    </form>

                    <p class="text-center mt-3 text-muted">Belum punya akun? <a href="<?= site_url('authuser/register') ?>">Daftar</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if (session()->getFlashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata("success"); ?>',
                showConfirmButton: false,
                timer: 2000
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '<?= session()->getFlashdata("error"); ?>',
                showConfirmButton: false,
                timer: 2000
            });
        <?php endif; ?>
    </script>

</body>

</html>