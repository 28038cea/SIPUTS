<?php

namespace App\Controllers;

use App\Models\M_admin;

class Auth extends BaseController
{
    protected $m_admin;
    public function __construct()
    {
        $this->m_admin = new M_admin();
    }

    public function index()
    {
        $data = [
            'title' => 'Login '
        ];
        return view('pages/login', $data);
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $akun = $this->m_admin->getAkun($email);
        // dd($akun);

        if ($akun) {
            if (password_verify($password, $akun['password'])) {
                $data = [
                    'id_akun' => $akun['id_akun'],
                    'nama' => $akun['nama'],
                    'email' => $akun['email'],
                    'foto' => $akun['foto'],
                    'role_id' => $akun['role_id'],
                    'id_akun' => $akun['id_akun'],
                ];
                session()->set($data);
                if ($akun['role_id'] == 2) {
                    return redirect()->to('/Admin');
                } else if ($akun['role_id'] == 3) {
                    return redirect()->to('/Pages');
                } else {
                    return redirect()->to('/Auth');
                }
            } else {
                session()->setFlashdata('registered', '<div class="alert alert-warning" role="alert"><b>Failed!</b> wrong password!</div>');
                return redirect()->to('/Auth');
            }
        } else {
            session()->setFlashdata('registered', '<div class="alert alert-warning" role="alert"><b>Failed!</b> your email is not registered!</div>');
            return redirect()->to('/Auth');
        }
    }

    public function registration()
    {
        $data = [
            'title' => 'Registrasi | SIP',
            'validation' => \Config\Services::validation()
        ];
        return view('pages/register', $data);
    }

    public function regis()
    {
        if (!$this->validate([
            'name' => 'required',
            'email' => [
                'rules' => 'required|is_unique[tb_akun.email]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'password1' => [
                'rules' => 'required|min_length[6]|matches[password2]',
                'errors' => [
                    'matches' => 'Password not match!',
                    'min_length' => 'Password at least 6 character!'
                ]
            ],
            'password2' => 'required|matches[password1]'
        ])) {
            $validaion = \Config\Services::validation();
            // dd($validaion);
            return redirect()->to('/Auth/registration')->withInput()->with('validation', $validaion);
        }

        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $this->m_admin->save([
            'nama' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
            'foto' => 'default.jpeg',
            'role_id' => 3
        ]);
        session()->setFlashdata('registered', '<div class="alert alert-success" role="alert"><b>Congratulation!</b> your account has been created. Please login to your account!</div>');
        return redirect()->to('/Auth');
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('registered', '<div class="alert alert-success" role="alert"><b>Congratulation!</b> you have been logout!</div>');
        return redirect()->to('/Pages');
    }

    //--------------------------------------------------------------------

}
