<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\AuthModel;

class Auth extends BaseController
{
    public function register()
    {
        $val = $this->validate(
            [
                'nama' => 'required',
                'username' => [
                    'rules' => 'required|is_unique[user.username]',
                    'errors' => [
                        'is_unique' => '{field} Sudah dipakai'
                    ]
                ],
                'password' => 'required',
            ],
        );

        if (!$val) {
            $pesanvalidasi = \Config\Services::validation();
            return redirect()->to('/register')->withInput()->with('validate', $pesanvalidasi);
        }
        $data = array(
            'nama'      => $this->request->getPost('nama'),
            'nik'       => $this->request->getPost('nik'),
            'phone'     => $this->request->getPost('phone'),
            'username'  => $this->request->getPost('username'),
            'email'     => $this->request->getPost('email'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'created_by' => $this->request->getPost('username'),
            'updated_by' => $this->request->getPost('username'),

        );
        $model = new UsersModel;
        $model->insert($data);
        session()->setFlashdata('pesan', 'Selamat Anda berhasil Registrasi, silakan login!');
        return redirect()->to('/');
    }

    public function login()
    {

        $model = new AuthModel;
        $table = 'user';
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $row = $model->get_data_login($username, $table);
        // var_dump($row);
        if ($row == NULL) {
            session()->setFlashdata('pesan', 'username anda salah');
            return redirect()->to('/');
        }
        if (password_verify($password, $row->password)) {
            $data = array(
                'nama'       => $row->nama,
                'username'   => $row->username,
                'user_id'    => $row->id,
                'nik'        => $row->nik,
                'phone'      => $row->phone,
                'email'      => $row->email,
                'created_by' => $row->created_by,
                'updated_by' => $row->updated_by,
                'status'     => $row->status,
            );
            session()->set($data);
            session()->set('LoggedUserData', $row);
            session()->setFlashdata('pesan', 'Berhasil Login');
            return redirect()->to('/dashboard');
        }
        session()->setFlashdata('pesan', 'Password Salah');
        return redirect()->to('/');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->remove('LoggedUserData');
        session()->setFlashdata('pesan', 'Berhasil Logout');
        return redirect()->to('/');
    }
}
