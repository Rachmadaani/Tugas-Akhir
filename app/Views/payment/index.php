<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Pembayaran</h1>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Event</th>
                        <th>Kategori</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Status</th>
                        <th>Scan KTP</th>
                        <th>Bukti Transfer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pembayaran as $row) : ?>
                        <tr>
                            <td><?= esc($row['id']) ?></td>
                            <td><?= esc($row['id_user']) ?></td>
                            <td><?= esc($row['id_event']) ?></td>
                            <td><?= esc($row['event_kategori']) ?></td>
                            <td>Rp <?= number_format($row['jumlah_pembayaran'], 2, ',', '.') ?></td>
                            <td><?= esc($row['status_pembayaran']) ?></td>
                            <td>
                                <?php if (!empty($row['scan_ktp'])) : ?>
                                    <img src="<?= base_url('uploads/' . $row['scan_ktp']) ?>" width="100" class="img-thumbnail">
                                <?php else : ?>
                                    <span class="text-muted">Tidak ada gambar</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($row['bukti_transfer'])) : ?>
                                    <img src="<?= base_url('uploads/' . $row['bukti_transfer']) ?>" width="100" class="img-thumbnail">
                                <?php else : ?>
                                    <span class="text-muted">Tidak ada bukti</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>