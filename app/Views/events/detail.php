<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #cfefff, #fbe4ff);
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .card-header {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .btn {
            border-radius: 20px;
        }

        .table th {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <?= $this->include('header_user_1') ?>

    <div class="main-content flex-grow-1">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="card-title mb-0">Detail Event</h1>
                </div>
                <div class="card-body">
                    <h2 class="text-center text-dark mb-4"><?= esc($event['event_name']); ?></h2>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><i class="fas fa-calendar-alt"></i> <strong>Tanggal:</strong> <?= esc($event['event_date']); ?></p>
                            <p><i class="fas fa-map-marker-alt"></i> <strong>Lokasi:</strong> <?= esc($event['location']); ?></p>
                            <p><i class="fas fa-user"></i> <strong>Nama Panitia:</strong> <?= esc($event['nama_panitia']); ?></p>
                            <p><i class="fas fa-phone"></i> <strong>No HP Panitia:</strong> <?= esc($event['nohp_panitia']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-info-circle"></i> <strong>Deskripsi:</strong><br> <?= esc($event['description']); ?></p>
                        </div>
                    </div>

                    <!-- Timer Countdown -->
                    <h4 class="text-center text-primary">Hitung Mundur Menuju Event</h4>
                    <div id="countdown" class="alert alert-info text-center font-weight-bold shadow-sm"></div>

                    <!-- Tabel Kategori -->
                    <h4 class="mt-4 text-center text-primary">Detail Kategori</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Rute</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Jam Mulai</th>
                                    <th>Waktu Cut-Off</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($categories)) : ?>
                                    <?php foreach ($categories as $category) : ?>
                                        <tr>
                                            <td><?= esc($category['nama_kategori']); ?></td>
                                            <td><?= esc($category['rute']); ?></td>
                                            <td><?= esc($category['start_date']); ?></td>
                                            <td><?= esc($category['start_jam']); ?></td>
                                            <td><?= esc($category['cut_off_time']); ?></td>
                                            <td>Rp <?= number_format(esc($category['biaya']), 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada kategori tersedia</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="row mt-4">
                        <!-- Tombol Daftar (Kiri) -->
                        <div class="col-4 text-start">
                            <?php if (!empty($categories)) : ?>
                                <?php if ($categories[0]['biaya'] == 0) : ?>
                                    <a href="<?= base_url('pendaftaran/formGratis/' . $event['id']) ?>" class="btn btn-success w-100">Mendaftar</a>
                                <?php else : ?>
                                    <a href="<?= base_url('pendaftaran/formBerbayar/' . $event['id']) ?>" class="btn btn-primary w-100">Mendaftar</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <!-- Tombol Data Peserta (Tengah) -->
                        <div class="col-4 text-center">
                            <a href="<?= site_url('event/peserta/' . esc($event['id'])); ?>" class="btn btn-outline-secondary w-100">Data Peserta</a>
                        </div>

                        <!-- Tombol Kembali (Kanan) -->
                        <div class="col-4 text-end">
                            <a href="<?= site_url('user/user_dashboard'); ?>" class="btn btn-outline-info w-100">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('footer') ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        <?php if (!empty($categories)) : ?>
            const eventStart = new Date("<?= $event['event_date']; ?> <?= $categories[0]['start_jam']; ?>").getTime();
            const timer = setInterval(() => {
                const now = new Date().getTime();
                const distance = eventStart - now;
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("countdown").innerHTML = `${days} Hari ${hours} Jam ${minutes} Menit ${seconds} Detik`;
                if (distance < 0) {
                    clearInterval(timer);
                    document.getElementById("countdown").innerHTML = "Event Telah Dimulai!";
                }
            }, 1000);
        <?php else : ?>
            document.getElementById("countdown").innerHTML = "Tidak ada informasi waktu tersedia.";
        <?php endif; ?>
    </script>

    <script>
        <?php if (session()->getFlashdata('alert') === 'success') : ?>
            Swal.fire({
                title: "Selamat!",
                text: "Anda berhasil masuk ke halaman Detail Event.",
                icon: "success",
                confirmButtonText: "OK"
            });
        <?php endif; ?>
    </script>

</body>

</html>