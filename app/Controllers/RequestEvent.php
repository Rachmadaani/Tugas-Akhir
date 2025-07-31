<?php

namespace App\Controllers;

use App\Models\RequestEventModel;
use CodeIgniter\Controller;

class RequestEvent extends Controller
{
    public function index()
    {
        return view('user/request_event');
    }

    public function submit()
    {
        $model = new RequestEventModel();

        $data = $this->request->getPost();

        // Tambahkan nama_pengusul dari session (jika tidak dikirim melalui form)
        $data['nama_pengusul'] = session()->get('username'); // atau ganti sesuai nama session yg benar

        // Upload gambar jika ada
        $gambar = $this->request->getFile('gambar_event');
        if ($gambar && $gambar->isValid()) {
            $newName = $gambar->getRandomName();
            $gambar->move('uploads/', $newName);
            $data['gambar_event'] = $newName;
        }

        $model->insert($data);

        return redirect()->to('/user/user_dashboard')->with('success', 'Permintaan berhasil dikirim!');
    }
}
