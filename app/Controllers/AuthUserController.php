<?php

namespace App\Controllers;

use App\Models\OnlyUserModel;
use CodeIgniter\Controller;

class AuthUserController extends Controller
{
    public function login()
    {
        helper(['form']);
        return view('user/login');
    }

    public function register()
    {
        helper(['form']);
        return view('user/register');
    }

    public function registerUser()
    {
        helper(['form']);
        $model = new OnlyUserModel();
        $validation = \Config\Services::validation();

        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email|is_unique[login_user.email]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            // Ambil semua pesan validasi sebagai string
            $errorMessages = $validation->getErrors();
            // Kirim satu pesan gabungan atau ambil salah satu
            $firstError = array_values($errorMessages)[0] ?? 'Terjadi kesalahan saat registrasi.';

            return redirect()->back()->withInput()->with('error_message', $firstError);
        }

        $model->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('success_message', 'Registrasi berhasil! Silakan login.');
        return redirect()->to('/authuser/login');
    }

    public function loginUser()
    {
        $model = new OnlyUserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan username
        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Simpan ke session jika berhasil login
            session()->set([
                'user_id'      => $user['id'],
                'username'     => $user['username'],
                'email'        => $user['email'],
                'is_logged_in' => true,
            ]);

            session()->setFlashdata('success', 'Selamat datang, ' . $user['username'] . '!');
            return redirect()->to('/user/user_dashboard');
        } else {
            session()->setFlashdata('error', 'Username atau password salah.');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user/login');
    }

    public function profil()
    {
        $userId = session()->get('user_id');
        $model = new OnlyUserModel();
        $user = $model->find($userId);

        return view('user/profil_user', ['user' => $user]);
    }
}
