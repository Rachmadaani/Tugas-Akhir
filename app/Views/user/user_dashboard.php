<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard</title>

    <!-- Styles -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>
        body {
            background: linear-gradient(135deg, #cfefff, #fbe4ff);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        main {
            padding-bottom: 60px;
        }

        .section-header {
            margin: 60px 0 40px;
            text-align: center;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            position: relative;
        }

        .section-title::after {
            content: '';
            width: 238px;
            height: 3px;
            background-color: #007bff;
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            background-color: #fff;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-weight: 700;
            color: #34495e;
        }

        .card-text {
            color: #6c757d;
        }

        .btn-primary {
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 600;
        }

        .btn-disabled-info {
            background-color: #e3f2fd;
            color: #007bff;
            font-weight: 500;
            padding: 6px 16px;
            border-radius: 20px;
        }

        .countdown-box {
            background: linear-gradient(to right, #ffffff, #f0f9ff);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
            text-align: center;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .search-bar input {
            border-radius: 25px 0 0 25px;
        }

        .search-bar button {
            border-radius: 0 25px 25px 0;
        }
    </style>
</head>

<body>

    <?= $this->include('header_user_2') ?>

    <main class="flex-fill">
        <!-- Section Title -->
        <div class="section-header">
            <h1 class="section-title">Daftar Event</h1>
        </div>

        <!-- Carousel + Video Slider -->
        <div class="container mb-5">
            <div class="d-flex flex-wrap justify-content-center align-items-center" style="gap: 32px;"> <!-- 32px ≈ 2cm -->
                <!-- Carousel Gambar -->
                <div class="shadow" style="max-width: 356px;">
                    <div id="eventCarousel"
                        class="carousel slide carousel-fade"
                        data-bs-ride="carousel"
                        data-bs-interval="3000"
                        style="width: 100%;">

                        <div class="carousel-inner rounded overflow-hidden" style="height: 200px; aspect-ratio: 16/9;">
                            <?php for ($i = 1; $i <= 8; $i++): ?>
                                <div class="carousel-item <?= $i === 1 ? 'active' : '' ?>">
                                    <img src="<?= base_url('assets/image_run_dashboard/image_' . $i . '.png') ?>"
                                        class="d-block w-100 h-100"
                                        alt="Image <?= $i ?>"
                                        style="object-fit: cover; transition: opacity 1s ease-in-out;">
                                </div>
                            <?php endfor; ?>
                        </div>

                        <!-- Navigasi Carousel -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Sebelumnya</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Berikutnya</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="<?= base_url('event/search'); ?>" method="get" class="form-inline search-bar">
                        <div class="input-group w-100">
                            <input type="text" name="query" class="form-control text-center"
                                placeholder="Cari event..."
                                value="<?= isset($searchQuery) ? $searchQuery : '' ?>">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Event Terdekat Countdown -->
        <?php
        $nearestEvent = null;
        if (isset($events) && !empty($events)) {
            usort($events, fn($a, $b) => strtotime($a['event_date']) - strtotime($b['event_date']));
            $nearestEvent = $events[0];
        }
        ?>
        <?php if ($nearestEvent): ?>
            <div class="container mb-5">
                <div class="text-center">
                    <h3 class="text-dark fw-bold mb-3">🎯 Event Terdekat: <span class="text-primary"><?= $nearestEvent['event_name'] ?></span></h3>
                    <div class="d-flex justify-content-center">
                        <div class="countdown-box" id="countdown"></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- List Event -->
        <div class="container mb-5">
            <div class="row justify-content-center">
                <?php if (!empty($events)): ?>
                    <?php foreach ($events as $event): ?>
                        <div class="col-md-6 col-lg-4 mb-4 d-flex justify-content-center">
                            <a href="<?= session()->get('user_id') ? base_url('event/detail/' . $event['id']) : site_url('user/login') ?>" class="text-decoration-none w-100" style="max-width: 100%;">
                                <div class="card card-event h-100">
                                    <img src="<?= base_url('uploads/' . $event['event_image']) ?>" class="card-img-top" alt="<?= $event['event_name'] ?>" onerror="this.src='<?= base_url('assets/img/default-event.jpg') ?>';" style="height: 200px; object-fit: cover;">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title"><?= $event['event_name'] ?></h5>
                                        <p class="card-text mb-3">
                                            📅 <strong><?= date('d M Y', strtotime($event['event_date'])) ?></strong><br>
                                            📍 <?= $event['location'] ?>
                                        </p>
                                        <div class="mt-auto text-center">
                                            <span class="btn btn-disabled-info disabled">Klik untuk lihat detail</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada event yang tersedia saat ini.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?= $this->include('footer') ?>

    <!-- Scripts -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Countdown Timer
        <?php if ($nearestEvent): ?>
            const eventDate = new Date("<?= date('Y-m-d H:i:s', strtotime($nearestEvent['event_date'])) ?>").getTime();
            const countdownElement = document.getElementById("countdown");

            function updateCountdown() {
                const now = new Date().getTime();
                const timeLeft = eventDate - now;

                if (timeLeft > 0) {
                    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                    countdownElement.innerHTML = `<h5>${days} Hari, ${hours} Jam, ${minutes} Menit, ${seconds} Detik</h5>`;
                } else {
                    countdownElement.innerHTML = "<h5 class='text-danger'>Event telah dimulai!</h5>";
                    clearInterval(countdownInterval);
                }
            }

            const countdownInterval = setInterval(updateCountdown, 1000);
            updateCountdown();
        <?php endif; ?>

        // SweetAlert for login success
        <?php if (session()->getFlashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Login Berhasil!',
                text: '<?= session()->getFlashdata("success"); ?>',
                showConfirmButton: false,
                timer: 2500
            });
        <?php endif; ?>

        // Tambahkan Notifikasi "Selamat Datang"
        window.addEventListener('load', function() {
            setTimeout(function() {
                Swal.fire({
                    title: 'Selamat Datang!',
                    text: 'Selamat datang di website kami.',
                    icon: 'info',
                    showConfirmButton: false,
                    timer: 2500
                });
            }, 1000); // tampil 1 detik setelah halaman dimuat
        });
    </script>

</body>

</html>