<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bukti Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0f2f7, #f0e6fa);
            /* Softer, modern gradient */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            /* Ensure body takes full viewport height */
            display: flex;
            /* Use flexbox for centering */
            align-items: center;
            /* Center vertically */
            justify-content: center;
            /* Center horizontally */
        }

        .receipt-card {
            max-width: 600px;
            width: 90%;
            /* Make it slightly responsive */
            margin: 30px auto;
            /* Adjust margin for flexbox */
            border-radius: 15px;
            /* Slightly more rounded corners */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            /* Stronger, softer shadow */
            padding: 40px;
            /* More padding */
            background: white;
            position: relative;
            /* For potential future elements */
            overflow: hidden;
            /* Ensures shadows or pseudo-elements are clipped */
        }

        .receipt-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            /* A subtle colored bar at the top */
            background: linear-gradient(to right, #007bff, #6610f2);
            /* Bootstrap primary and indigo */
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .receipt-header {
            text-align: center;
            border-bottom: 1px solid #eee;
            /* Lighter, solid border */
            margin-bottom: 25px;
            padding-bottom: 15px;
        }

        .receipt-header h3 {
            margin-bottom: 8px;
            color: #343a40;
            /* Darker text for heading */
            font-weight: 600;
            /* Slightly bolder */
        }

        .receipt-header p {
            font-size: 1.1rem;
            /* Slightly larger event name */
            margin-bottom: 5px;
            color: #555;
        }

        .receipt-header small {
            color: #888;
            font-size: 0.9em;
        }

        .receipt-detail p {
            margin: 10px 0;
            /* More vertical space between details */
            font-size: 1.05rem;
            /* Slightly larger font for details */
            color: #333;
            display: flex;
            /* For aligning label and value */
            justify-content: space-between;
            /* Pushes value to the right */
            align-items: baseline;
        }

        .receipt-detail p strong {
            color: #000;
            /* Make labels stand out */
            flex-basis: 30%;
            /* Give strong labels a defined width */
            text-align: left;
        }

        .receipt-detail p span {
            flex-basis: 65%;
            /* Give values a defined width */
            text-align: right;
        }

        .receipt-detail hr {
            border-top: 1px dashed #ddd;
            /* Maintain a dashed line for separation */
            margin: 25px 0;
        }

        .receipt-detail .text-muted.small {
            text-align: center;
            margin-top: 20px;
            font-size: 0.85em;
            color: #aaa !important;
        }

        .status-badge {
            background-color: #d4edda;
            /* Light green for success */
            color: #155724;
            /* Dark green text */
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
            /* To apply padding/border-radius correctly */
        }

        .btn-print {
            margin-top: 35px;
            text-align: center;
        }

        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        }

        @media print {
            @page {
                size: landscape;
                /* Set page orientation to landscape */
                margin: 1cm;
                /* Set consistent margins for print */
            }

            body {
                background: none;
                margin: 0;
                padding: 0;
                display: block;
                /* Revert flex for printing */
            }

            .receipt-card {
                box-shadow: none;
                margin: 0 auto;
                /* Center the card horizontally on the printed page */
                border-radius: 0;
                padding: 20px;
                width: 80%;
                /* Adjust width for landscape printing to fill more space */
                max-width: 800px;
                /* Allow it to grow a bit more in landscape */
            }

            .receipt-card::before {
                display: none;
            }

            .btn-print {
                display: none;
            }

            /* Adjust font sizes for print if necessary */
            .receipt-header h3 {
                font-size: 1.5em;
            }

            .receipt-detail p {
                font-size: 0.95em;
            }
        }
    </style>
</head>

<body>

    <div class="receipt-card">
        <div class="receipt-header">
            <h3>Bukti Pembayaran</h3>
            <p>Event: <strong class="text-primary"><?= esc($payment['event_name']) ?></strong></p>
            <small><?= isset($payment['created_at']) ? date('d M Y, H:i', strtotime($payment['created_at'])) : '' ?></small>
        </div>

        <div class="receipt-detail">
            <p><strong>Nama:</strong> <span><?= esc($payment['nama_lengkap']) ?></span></p>
            <p><strong>Email:</strong> <span><?= esc($payment['email']) ?></span></p>
            <p><strong>Telepon:</strong> <span><?= esc($payment['no_hp']) ?></span></p>
            <p><strong>Kategori:</strong> <span><?= esc($payment['nama_kategori']) ?></span></p>
            <p><strong>Biaya:</strong> <span class="fw-bold text-success">Rp <?= number_format($payment['biaya'], 0, ',', '.') ?></span></p>
            <p><strong>Status:</strong> <span class="status-badge"><?= esc($payment['status']) ?></span></p>
            <hr>
            <p class="text-muted small">ID Transaksi: <span class="fw-bold"><?= esc($payment['kode_transaksi']) ?></span></p>
        </div>

        <div class="btn-print">
            <button onclick="window.print()" class="btn btn-outline-primary me-2">Cetak Bukti Pembayaran</button>
            <a href="<?= site_url('user/user_dashboard') ?>" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
        </div>

    </div>

</body>

</html>