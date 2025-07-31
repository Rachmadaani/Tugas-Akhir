<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sertifikat Peserta</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .certificate-wrapper {
            width: 100%;
            height: 100%;
            padding: 60px 70px;
            box-sizing: border-box;
            border: 10px double #003366;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            background-image: url("<?= 'file:///' . realpath(FCPATH . 'assets/bg_sertifikat/bg_sertifikat.png') ?>");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .top-section {
            text-align: center;
            z-index: 2;
        }

        .certificate-title {
            font-size: 40px;
            font-weight: bold;
            color: #003366;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        .certificate-subtitle {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
        }

        .recipient-name {
            font-size: 26px;
            font-weight: bold;
            color: #000;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .status-label {
            font-size: 20px;
            font-weight: bold;
            color: #003366;
            margin-bottom: 30px;
        }

        .event-description {
            font-size: 16px;
            color: #444;
            margin: 10px 0 30px;
        }

        .signature-section {
            display: flex;
            justify-content: flex-end;
            margin-top: 80px;
            /* diturunkan lebih jauh */
            z-index: 2;
        }

        .signature-block {
            text-align: center;
        }

        .signature-block img {
            width: 120px;
            margin-bottom: 5px;
        }

        .signature-name {
            font-weight: bold;
            font-size: 14px;
            color: #222;
        }

        .panitia-label {
            font-size: 13px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="certificate-wrapper">

        <!-- Bagian Atas Sertifikat -->
        <div class="top-section">
            <div class="certificate-title">SERTIFIKAT</div>
            <div class="certificate-subtitle">Diberikan kepada:</div>

            <div class="recipient-name"><?= esc($history['nama_lengkap']) ?></div>

            <div class="status-label">Sebagai PESERTA</div>

            <div class="event-description">
                Pada event olahraga <strong><?= esc($history['event_name']) ?></strong><br>
                yang diselenggarakan oleh <strong>Event Olahraga</strong><br>
                bertempat di <strong><?= esc($history['location']) ?></strong>, pada tanggal <strong><?= date('d F Y', strtotime($history['start_date'])) ?></strong>
            </div>
        </div>

        <!-- Bagian Signature -->
        <div class="signature-section">
            <div class="signature-block">
                <img src="<?= 'file:///' . realpath(FCPATH . 'assets/ttd_panitia/' . $history['ttd_panitia']) ?>" alt="Tanda Tangan Panitia">
                <div class="signature-name"><?= esc($history['nama_panitia']) ?></div>
                <div class="panitia-label">Ketua Panitia</div>
            </div>
        </div>

    </div>
</body>

</html>