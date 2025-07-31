<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $email = \Config\Services::email();

        $email->setFrom('admin@example.com', 'Admin Event');
        $email->setTo('user@example.com'); // Ganti dengan email penerima
        $email->setSubject('Konfirmasi Pendaftaran Event');
        $email->setMessage('<p>Terima kasih telah mendaftar! Berikut adalah detail event Anda.</p>');

        if ($email->send()) {
            return 'Email berhasil dikirim!';
        } else {
            return 'Gagal mengirim email: ' . $email->printDebugger(['headers']);
        }
    }
}
