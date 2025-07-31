<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class NotificationController extends Controller
{
    protected $notificationModel;
    protected $userModel;
    protected $email;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
        $this->userModel = new UserModel();
        $this->email = \Config\Services::email();
    }

    // Fungsi untuk mengirim email setelah pendaftaran/pembayaran
    public function sendEmailNotification($userId, $eventId, $message)
    {
        $user = $this->userModel->find($userId);
        if (!$user) {
            return false;
        }

        $this->email->setFrom('admin@eventolahraga.com', 'Event Olahraga');
        $this->email->setTo($user['email']);
        $this->email->setSubject('Konfirmasi Pendaftaran/Pembayaran Event');
        $this->email->setMessage($message);

        if ($this->email->send()) {
            $this->notificationModel->addNotification([
                'user_id' => $userId,
                'event_id' => $eventId,
                'type' => 'email',
                'message' => $message,
                'status' => 'sent'
            ]);
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk mengirim WhatsApp setelah pendaftaran/pembayaran
    public function sendWhatsAppNotification($userId, $eventId, $message)
    {
        $user = $this->userModel->find($userId);
        if (!$user || empty($user['phone'])) {
            return false;
        }

        $whatsappApiUrl = 'https://api.whatsapp.com/send';
        $whatsappNumber = $user['phone'];
        $messageText = urlencode($message);

        $fullUrl = "{$whatsappApiUrl}?phone={$whatsappNumber}&text={$messageText}";

        // Simpan ke database
        $this->notificationModel->addNotification([
            'user_id' => $userId,
            'event_id' => $eventId,
            'type' => 'whatsapp',
            'message' => $message,
            'status' => 'sent'
        ]);

        return redirect()->to($fullUrl);
    }

    // Fungsi untuk mengirim notifikasi otomatis setelah pendaftaran
    public function notifyAfterRegistration($userId, $eventId)
    {
        $message = "Halo! Anda telah berhasil mendaftar di event kami. Silakan cek detail event Anda.";
        $this->sendEmailNotification($userId, $eventId, $message);
        $this->sendWhatsAppNotification($userId, $eventId, $message);
    }

    // Fungsi untuk mengirim notifikasi otomatis setelah pembayaran
    public function notifyAfterPayment($userId, $eventId)
    {
        $message = "Pembayaran Anda telah diterima! Anda sekarang resmi terdaftar di event. Sampai jumpa di lokasi event.";
        $this->sendEmailNotification($userId, $eventId, $message);
        $this->sendWhatsAppNotification($userId, $eventId, $message);
    }
}
