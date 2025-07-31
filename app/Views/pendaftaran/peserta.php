<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List Peserta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #cfefff, #fbe4ff);
            min-height: 100vh;
        }

        .page-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 0;
        }

        .container {
            background-color: #ffffff;
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            max-width: 100%;
        }

        h2 {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .event-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        .table thead th {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f0f8ff;
        }

        .table td {
            vertical-align: middle;
        }

        .btn-primary {
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0, 123, 255, 0.4);
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: auto;
        }

        @media screen and (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }

            .event-title {
                font-size: 1.3rem;
            }
        }
    </style>
</head>

<body>

    <div class="page-wrapper">

        <!-- Header -->
        <?= $this->include('header_user_2') ?>

        <!-- Main Content -->
        <main>
            <div class="container">
                <h2>Daftar Peserta untuk Event:</h2>
                <div class="event-title"><?= esc($event['event_name']); ?></div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Kategori Event</th>
                                <th>Rute</th>
                                <th>Biaya</th>
                                <th>Kewarganegaraan</th>
                                <th>Ukuran Kaos</th>
                                <th>Persetujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pesertaList)) : ?>
                                <?php foreach ($pesertaList as $index => $peserta) : ?>
                                    <tr>
                                        <td class="text-center"><?= $index + 1; ?></td>
                                        <td><?= esc($peserta['nama_lengkap']); ?></td>
                                        <td><?= esc($peserta['kategori_event_nama']); ?></td>
                                        <td><?= esc($peserta['rute']); ?></td>
                                        <td>Rp <?= number_format($peserta['biaya'], 0, ',', '.'); ?></td>
                                        <td><?= esc($peserta['kewarganegaraan']); ?></td>
                                        <td><?= esc($peserta['ukuran_kaos']); ?></td>
                                        <td><?= esc($peserta['persetujuan_peserta']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Tidak ada peserta yang terdaftar untuk event ini.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4">
                    <a href="<?= site_url('event/detail/' . esc($event['id'])); ?>" class="btn btn-primary">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Detail Event
                    </a>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <?= $this->include('footer') ?>

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>