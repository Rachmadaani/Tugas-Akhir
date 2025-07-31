<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;
use App\Models\PembayaranModel;
use App\Models\EventModel;
use App\Models\KategoriEventModel;

class PembayaranController extends BaseController
{
    public function index($id_event)
    {
        $eventModel = new EventModel();
        $kategoriEventModel = new KategoriEventModel();

        $event = $eventModel->find($id_event);
        $kategori_event = $kategoriEventModel->find($event['event_kategori']);

        $data = [
            'event_name' => $event['event_name'],
            'event_kategori' => $kategori_event['nama_kategori'],
            'biaya' => $kategori_event['category_price'],
        ];

        return view('payment/pembayaran', $data);
    }

    public function submit_payment()
    {
        $pembayaranModel = new \App\Models\PembayaranModel();
        $pendaftaranModel = new \App\Models\PendaftaranModel();

        $validationRules = [
            'bukti_transfer' => [
                'uploaded[bukti_transfer]',
                'mime_in[bukti_transfer,image/jpg,image/jpeg,image/png]',
                'max_size[bukti_transfer,10240]',
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->with('error_message', $this->validator->getErrors());
        }

        $id_pendaftaran = $this->request->getPost('id_pendaftaran');
        $jumlah_pembayaran = $this->request->getPost('jumlah_pembayaran');

        // Ambil data pendaftaran
        $pendaftaran = $pendaftaranModel->getPendaftaranWithBiaya($id_pendaftaran);

        if (!$pendaftaran) {
            return redirect()->back()->with('error_message', 'Data pendaftaran tidak ditemukan.');
        }

        // Cek apakah kunci 'biaya' tersedia
        if (!isset($pendaftaran['biaya'])) {
            return redirect()->back()->with('error_message', 'Data biaya tidak tersedia untuk pendaftaran ini.');
        }

        $biaya = (float) $pendaftaran['biaya'];
        $status_pembayaran = ($jumlah_pembayaran >= $biaya) ? 'lunas' : 'belum lunas';
        $bukti_transfer = $this->uploadFile('bukti_transfer');

        $data = [
            'id_user' => $id_pendaftaran,
            'id_event' => $pendaftaran['id_event'] ?? null,
            'event_kategori' => $pendaftaran['kategori_event'] ?? null,
            'biaya' => $biaya,
            'jumlah_pembayaran' => $jumlah_pembayaran,
            'status_pembayaran' => $status_pembayaran,
            'bukti_transfer' => $bukti_transfer,
            'status' => $status_pembayaran, // ← TAMBAHKAN INI
        ];

        // Kirim email
        $this->sendEmail($id_pendaftaran, $pendaftaran['id_event'], $status_pembayaran);

        $pembayaranModel->insert($data);
        $data['created_at'] = date('Y-m-d H:i:s'); // Tambahkan created_at manual jika belum otomatis

        // Tambahan data untuk ditampilkan di payment_receipt
        $dataPembayaran = array_merge($data, [
            'nama_lengkap' => $pendaftaran['nama_lengkap'] ?? '-',
            'email' => $pendaftaran['email'] ?? '-',
            'no_hp' => $pendaftaran['no_hp'] ?? '-',
            'event_name' => $pendaftaran['event_name'] ?? '-', // ← gunakan dari pendaftaran
            'nama_kategori' => $pendaftaran['nama_kategori'] ?? '-', // ← gunakan dari pendaftaran
            'kode_transaksi' => strtoupper(uniqid('TRX')),
            'created_at' => $data['created_at'], // Pastikan ini ikut
        ]);

        return view('payment/payment_receipt', ['payment' => $dataPembayaran]);
    }

    private function sendEmail($id_user, $id_event, $status_pembayaran)
    {
        $email = \Config\Services::email();

        $userModel = new \App\Models\OnlyUserModel();
        $eventModel = new \App\Models\EventModel();

        $user = $userModel->asArray()->find($id_user);
        $event = $eventModel->find($id_event);

        if (!$user || !$event) {
            log_message('error', 'Data user atau event tidak ditemukan.');
            return;
        }

        $email->setFrom('admin@example.com', 'Admin Event');
        $email->setTo($user['email'] ?? 'default@email.com');
        $email->setSubject('Konfirmasi Pembayaran Event');

        $message = "
        <h3>Halo {$user['username']}</h3>
        <p>Terima kasih telah mendaftar pada event <strong>{$event['event_name']}</strong>.</p>
        <p>Status pembayaran Anda: <strong>{$status_pembayaran}</strong>.</p>
        <p>Silakan tunggu konfirmasi selanjutnya dari panitia.</p>
        <br><p>Salam,<br>Admin Event</p>
    ";

        $email->setMessage($message);

        if (!$email->send()) {
            log_message('error', 'Email gagal dikirim: ' . $email->printDebugger(['headers']));
        }
    }

    public function uploadFile($fileInputName)
    {
        $file = $this->request->getFile($fileInputName);

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getName();
            $file->move(WRITEPATH . 'uploads/', $fileName);
            return $fileName;
        }

        return '';
    }

    public function form($idEvent)
    {
        $eventModel = new EventModel();
        $pendaftaranModel = new PendaftaranModel();

        $event = $eventModel->getEventWithKategori($idEvent);

        // Cari pendaftaran berdasarkan event ID
        $pendaftaran = $pendaftaranModel
            ->where('id_event', $idEvent)
            ->orderBy('id', 'DESC') // Ambil yang terbaru jika banyak
            ->first();

        if (!$event || !$pendaftaran) {
            return redirect()->back()->with('error', 'Event atau pendaftaran tidak ditemukan');
        }

        return view('payment/pembayaran', [
            'event_name' => $event['event_name'],
            'event_kategori' => $event['nama_kategori'],
            'rute' => $event['rute'],
            'biaya' => $event['biaya'],
            'id_pendaftaran' => $pendaftaran['id'], // Kirim ke view
        ]);
    }
}
