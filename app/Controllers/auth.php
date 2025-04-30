<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $user = $model->where('username', $username)->first();
        
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => true,
                ];
                $session->set($sessionData);

                // Redirect berdasarkan role
                if ($user['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard');
                } elseif ($user['role'] == 'dokter') {
                    return redirect()->to('/dokter');
                } else {
                    return redirect()->to('/pelanggan');
                }
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $role     = $this->request->getPost('role');

        // Cek apakah username sudah ada
        if ($model->where('username', $username)->first()) {
            return redirect()->back()->with('error', 'Username sudah digunakan!');
        }

        // Cek apakah email sudah ada
        if ($model->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'Email sudah digunakan!');
        }

        // Optional: Cek apakah password sudah sama dengan yang lain (biasanya ini tidak wajib)
        // Jika mau, perlu cara khusus karena password disimpan dalam hash.

        // Jika semua aman, simpan ke database
        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role'     => $role,
        ];
        
        $model->save($data);

        return redirect()->to('/login')->with('success', 'Berhasil daftar, silakan login!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
