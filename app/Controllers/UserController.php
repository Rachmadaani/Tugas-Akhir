<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\EventHistoryModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class UserController extends BaseController
{
    public function dashboard()
    {
        $eventModel = new EventModel();
        $data['events'] = $eventModel->findAll(); // Mengambil semua event dari database
        // Ambil event yang belum lewat dari tanggal sekarang
        $data['events'] = $eventModel->where('event_date >=', date('Y-m-d'))->findAll();

        return view('user/user_dashboard', $data); // Pastikan path ke view sudah benar
    }

    public function history_event()
    {
        $search = $this->request->getGet('search');
        $eventHistoryModel = new EventHistoryModel();
        $eventHistory = $eventHistoryModel->getEventHistory($search);

        return view('user/history_event', [
            'eventHistory' => $eventHistory,
            'search' => $search
        ]);
    }

    public function previewCertificate($id)
    {
        $model = new \App\Models\EventHistoryModel();
        $data['history'] = $model->getHistoryById($id); // Pastikan ini

        if (!$data['history']) {
            return redirect()->to('/user/history_event')->with('error', 'Data tidak ditemukan.');
        }

        return view('user/preview_certificate', $data);
    }

    public function pdfCertificate($id)
    {
        $model = new \App\Models\EventHistoryModel();
        $data['history'] = $model->getHistoryById($id);

        if (!$data['history']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
        }

        // Ambil nama file tanda tangan dari database
        $ttdFile = $data['history']['ttd_panitia'] ?? 'default.png'; // fallback jika kosong

        // Path absolut untuk Dompdf (gunakan realpath agar bisa diakses)
        $data['ttd_path'] = 'file:///' . realpath(FCPATH . 'assets/ttd_panitia/' . $ttdFile);

        // Render view jadi HTML
        $html = view('user/pdf_certificate', $data, ['saveData' => true]);

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Cetak PDF
        $dompdf->stream("Sertifikat_{$data['history']['nama_lengkap']}.pdf", ['Attachment' => true]);
        exit;
    }
}
