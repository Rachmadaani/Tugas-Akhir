<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header User 1</title>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .header {
            margin-left: 0;
            margin-right: 0;
            padding: 0px 0;
        }

        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }

        .modal-content {
            padding: 15px;
        }
    </style>
</head>

<body>

    <div class="header bg-light border-bottom py-2">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <!-- Kiri: Logo -->
            <div class="d-flex align-items-center">
                <img src="<?= base_url('assets/komdigi/komdigi.png') ?>" alt="Logo" style="height: 40px; margin-right: 10px;">
            </div>
            <!-- Tengah: Judul di tengah secara absolut -->
            <h1 class="position-absolute start-50 translate-middle-x mb-0 fs-4">EVENT OLAHRAGA</h1>

            <?php if (session()->get('user_id')): ?>
                <!-- Tombol hanya tampil jika pengguna sudah login -->
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item text-primary" href="<?= site_url('user/dashboard'); ?>">Dashboard</a></li>
                        <li><a class="dropdown-item" data-toggle="modal" data-target="#profileModal">Profil</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('user/history-event'); ?>">Histori</a></li>
                        <li><a class="dropdown-item" data-toggle="modal" data-target="#contactModal">Kontak</a></li>
                        <li><a class="dropdown-item" data-toggle="modal" data-target="#aboutModal">About</a></li>
                        <li><a class="dropdown-item text-danger" href="#" id="logoutBtn">Logout</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <!-- Tombol Login jika pengguna belum login -->
                <a href="<?= site_url('user/login') ?>" class="btn btn-link">Login</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal Profil -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profil Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Pengguna:</strong> <?= session()->get('username') ?></p>
                    <p><strong>Email:</strong> <?= session()->get('email') ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Histori Event -->
    <div class="modal fade" id="eventHistoryModal" tabindex="-1" aria-labelledby="eventHistoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventHistoryModalLabel">Histori Event yang Diikuti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="event-history-list">
                        <p class="text-muted">Memuat data...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Kontak -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Kontak Kami</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Untuk informasi lebih lanjut, Anda dapat menghubungi kami melalui:</p>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fas fa-phone-alt"></i> <strong>Telepon:</strong>
                            <a href="tel:+628895228029">+62 8895228029</a>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i> <strong>Email:</strong>
                            <a href="mailto:cseventolahraga@gmail.com">cseventolahraga@gmail.com</a>
                        </li>
                        <li>
                            <i class="fab fa-instagram"></i> <strong>Instagram:</strong>
                            <a href="https://www.instagram.com/eventolahraga" target="_blank">@eventolahraga</a>
                        </li>
                        <li>
                            <i class="fab fa-facebook"></i> <strong>Facebook:</strong>
                            <a href="https://www.facebook.com/eventolahraga" target="_blank">Event Olahraga</a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong>
                            Jl. Olahraga No.123, Jakarta
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal About -->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aboutModalLabel">Tentang Kami</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Pendaftaran Event Olahraga</strong> adalah platform digital yang menyediakan informasi dan layanan pendaftaran acara olahraga di Indonesia. Kami bertujuan untuk mempromosikan gaya hidup sehat dan aktif melalui berbagai acara olahraga, mempermudah pendaftaran, serta menyatukan komunitas olahraga di seluruh negeri.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('logoutBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah reload halaman

            Swal.fire({
                title: "Konfirmasi Logout",
                text: "Apakah Anda yakin ingin keluar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, Logout",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= site_url('user/logout') ?>";
                }
            });
        });
    </script>

</body>

</html>