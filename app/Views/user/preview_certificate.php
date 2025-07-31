<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Sertifikat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Preview Sertifikat</h2>
        <div class="card">
            <div class="card-body">
                <p><strong>Nama Lengkap:</strong> <?= esc($history['nama_lengkap']) ?></p>
                <p><strong>Nama Event:</strong> <?= isset($history['event_name']) ? esc($history['event_name']) : 'Tidak tersedia' ?></p>
                <p><strong>Nama Kategori:</strong> <?= isset($history['nama_kategori']) ? esc($history['nama_kategori']) : 'Tidak tersedia' ?></p>
                <p><strong>Event Dimulai:</strong> <?= isset($history['event_date']) ? date('d F Y', strtotime($history['event_date'])) : 'Tidak tersedia' ?></p><p><strong>Kewarganegaraan:</strong> <?= esc($history['kewarganegaraan']) ?></p>
                <p><strong>Tanggal Mendaftar:</strong> <?= isset($history['tanggal_mendaftar']) ? esc($history['tanggal_mendaftar']) : 'Tidak tersedia' ?></p>
                <p><strong>No. HP:</strong> <?= esc($history['no_hp']) ?></p>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="<?= site_url('user/pdfCertificate/' . $history['id']) ?>" class="btn btn-primary">
                <i class="fas fa-download"></i> Download Sertifikat PDF
            </a>
            <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</body>
</html>
