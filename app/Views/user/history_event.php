<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event History Peserta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Modern & Unique Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f4f6f9, #eaeef3);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Main content area styling */
        .main-content-area {
            flex: 1;
            /* Allows this section to grow and push the footer down if one is added */
            padding: 40px 0;
        }

        .card-custom {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
            /* Space between cards/sections */
            border: none;
            /* Remove default bootstrap card border */
        }

        h3 {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 25px;
            text-align: center;
        }

        /* Form Group and Input Styling */
        .form-group input.form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
        }

        /* Buttons Styling */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 123, 255, 0.3);
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.4);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(108, 117, 125, 0.3);
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
            box-shadow: 0 4px 10px rgba(108, 117, 125, 0.4);
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            border-radius: 6px;
            padding: 8px 15px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-info:hover {
            background-color: #117a8b;
            border-color: #10707f;
        }

        /* Table Styling */
        .table {
            border-radius: 8px;
            overflow: hidden;
            /* Ensures rounded corners apply to content */
        }

        .table thead.thead-dark th {
            background-color: #007bff;
            color: #ffffff;
            border-color: #007bff;
            font-weight: 600;
            padding: 12px 15px;
            text-align: center;
            /* Center header text */
            vertical-align: middle;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f0f8ff;
            /* Light blue on hover */
        }

        .table td {
            vertical-align: middle;
            padding: 10px 15px;
        }

        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e9ecef;
            /* Light border around the whole table */
        }

        /* Alert styling */
        .alert-warning {
            border-radius: 8px;
            background-color: #fff3cd;
            color: #856404;
            border-color: #ffeeba;
            padding: 15px;
            text-align: center;
            font-weight: 500;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .card-custom {
                padding: 20px;
            }

            h3 {
                font-size: 1.75rem;
            }

            .main-content-area {
                padding: 20px 0;
            }
        }
    </style>
</head>

<body>
    <?= $this->include('header_user_1') ?>

    <div class="container main-content-area">
        <h3 class="mb-4">Histori Event Peserta yang Diikuti</h3>

        <div class="card-custom">
            <form method="get" action="<?= site_url('user/history_event') ?>" class="mb-0">
                <div class="row align-items-center">
                    <div class="col-12 col-md-8 mb-3 mb-md-0">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" id="searchName" name="search" placeholder="Cari berdasarkan nama peserta..." value="<?= esc($search ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search mr-2"></i>Cari</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-custom">
            <button type="button" class="btn btn-secondary w-100" onclick="history.back()"><i class="fas fa-arrow-left mr-2"></i>Kembali</button>
        </div>


        <?php if (!empty($eventHistory)) : ?>
            <div class="card-custom">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Nama Event</th>
                                <th>Nama Kategori</th>
                                <th>Event Dimulai</th>
                                <th>Kewarganegaraan</th>
                                <th>Tanggal Mendaftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($eventHistory as $history) : ?>
                                <tr>
                                    <td><?= esc($history['nama_lengkap']); ?></td>
                                    <td><?= esc($history['nama_event']); ?></td>
                                    <td><?= esc($history['nama_kategori']); ?></td>
                                    <td><?= esc($history['event_dimulai']); ?></td>
                                    <td><?= esc($history['kewarganegaraan']); ?></td>
                                    <td><?= esc($history['tanggal_mendaftar']); ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('user/certificates/preview/' . ($history['id'] ?? '0')) ?>"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-file-alt"></i> Preview
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else : ?>
            <div class="alert alert-warning card-custom">
                <i class="fas fa-exclamation-triangle mr-2"></i>Belum ada histori event yang diikuti.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>