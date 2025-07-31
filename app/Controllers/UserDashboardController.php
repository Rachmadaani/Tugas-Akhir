<?php

namespace App\Controllers;

use App\Models\CertificateModel;
use App\Models\EventModel;

class UserDashboardController extends BaseController
{
    protected $certificateModel;
    protected $eventModel;

    public function __construct()
    {
        $this->certificateModel = new CertificateModel();
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        $data['events'] = $this->eventModel->getEvents(); // Gunakan getEvents() agar tidak mengubah kode yang sudah berjalan
        return view('user/dashboard', $data);
    }

    public function certificates()
    {
        $userEmail = session()->get('email'); // Ambil email dari sesi login
        $certificates = $this->certificateModel
            ->where('email', $userEmail) // Sesuaikan nama kolomnya
            ->findAll();

        return view('user/certificates', ['certificates' => $certificates]);
    }

}
