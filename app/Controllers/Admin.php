<?php

namespace App\Controllers;

use App\Models\M_admin;

class Admin extends BaseController
{

    protected $m_admin;
    protected $db;
    public function __construct()
    {
        $this->m_admin = new M_admin();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // if (session()->get('email') == null) {
        //     return redirect()->to('/Auth');
        // }
        // $data['judul'] = 'Dashboard';
        $data = [
            'akun' => $this->m_admin->getAkun(session()->get('email')),
            'judul' => "Dashboard"

        ];

        return view('/admin/index', $data);
    }
    /////////////////////////////////// ADMIN ///////////////////////////////////
    public function admin()
    {
        if (session()->get('email') == null) {
            return redirect()->to('/Auth');
        }

        $data = [
            'akun' => $this->m_admin->getAkun(session()->get('email')),
            'judul' => "Data Admin",
            'validation' => \Config\Services::validation()
        ];
        return view('data_table/data_admin', $data);
    }

    public function ambilAdmin()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'admin' => $this->m_admin->getAdmin(),
                'validation' => \Config\Services::validation()
            ];

            $msg = [
                'data' => view('data_table/table_admin', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf data tidak dapat diproses');
        }
    }

    public function save_admin()
    {
        $validaion = \Config\Services::validation();
        if ($this->request->isAJAX()) {

            $valid = $this->validate([
                'name' => 'required',
                'email' => [
                    'rules' => 'required|valid_email|is_unique[tb_akun.email]',
                    'errors' => [
                        'required' => 'The email field is required.',
                        'is_unique' => 'Email already registered.'
                    ]
                ],
                'password' => 'required'
            ]);

            if (!$valid) {
                $msg = ['error' => [
                    'name' => $validaion->getError('name'),
                    'email' => $validaion->getError('email'),
                    'password' => $validaion->getError('password'),
                ]];
            } else {
                if ($this->request->getVar('foto') == null) {
                    $foto = 'default.jpeg';
                } else {
                    $foto = $this->request->getVar('foto');
                }
                $this->m_admin->save([
                    'nama' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'foto' => $foto,
                    'role_id' => 2
                ]);

                $msg = [
                    'sukses' => 'Data Admin has been saved.'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function updateAdmin($id)
    {
        $this->m_admin->save([
            'id_akun' => $id,
            'nama' => $this->request->getVar('name')
        ]);
        return redirect()->to('/Admin/admin');
    }

    public function update_admin()
    {
        if ($this->request->isAJAX()) {
            $id_akun = $this->request->getVar('id_akun');
            $row = $this->m_admin->find($id_akun);

            $data = [
                'segment' => 'saveUpdate_admin',
                'id_akun' => $row['id_akun'],
                'nama' => $row['nama'],
                'foto' => $row['foto'],
            ];

            $msg = [
                'sukses' => view('data_table/modal/modalEdit_akun', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function saveUpdate_admin()
    {
        $validaion = \Config\Services::validation();
        if ($this->request->isAJAX()) {

            $valid = $this->validate([
                'name' => 'required',
            ]);

            if (!$valid) {
                $msg = ['error' => [
                    'name' => $validaion->getError('name'),
                ]];
            } else {
                $id = $this->request->getVar('id');

                if ($this->request->getVar('foto') == null) {
                    $foto = 'default.jpeg';
                } else {
                    $foto = $this->request->getVar('foto');
                }
                $this->m_admin->update($id, [
                    'nama' => $this->request->getVar('name'),
                    'foto' => $foto,
                ]);

                $msg = [
                    'sukses' => 'Data Admin has been di updated.'
                ];
            }
            echo json_encode($msg);
        }
    }
    /////////////////////////////////// END ADMIN ///////////////////////////////////

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id_akun');
            $this->m_admin->delete($id);

            $msg = [
                'sukses' => 'Data has been deleted.'
            ];

            echo json_encode($msg);
        }
    }

    //////////////////////////////////////////////////////////////////////////////gambar//////////////
    public function gambar()
    {
        if (session()->get('email') == null) {
            return redirect()->to('/Auth');
        }

        $data = [
            'akun' => $this->m_admin->getAkun(session()->get('email')),
            'gambar' => $this->m_admin->getGambar(),
            'judul' => "Data Gambar",
            'validation' => \Config\Services::validation()
        ];
        return view('admin/data_gambar', $data);
    }
    public function addgambar()
    {
        if (session()->get('email') == null) {
            return redirect()->to('/Auth');
        }

        $data = [
            'akun' => $this->m_admin->getAkun(session()->get('email')),
            'gambar' => $this->m_admin->getGambar(),
            'judul' => "Input Gambar",
            'validation' => \Config\Services::validation()
        ];
        return view('admin/add_gambar', $data);
    }
    public function savegambar()
    {
        if (!$this->validate([
            'kategori' => 'required',
            'nama' => 'is_image[nama]|mime_in[nama,image/jpg,image/jpeg,image/png]'
        ])) {
            // return redirect()->to('/Akomodasi/add')->withInput()->with('validation', $this->validation);
            return redirect()->to('/Admin/addgambar')->withInput();
        }

        // ambil data file gambar
        $fileFoto = $this->request->getFile('nama');
        if ($fileFoto->getError() == 4) {
            $namaFoto = "default.jpg";
        } else {
            // generate nama file random untuk nama foto
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar ke folder
            $fileFoto->move('upload/gambar', $namaFoto);
        }

        $data = [
            'kategori' => $this->request->getVar('kategori'),
            'nama' => $namaFoto
        ];

        $this->db->table('tb_gambar')->insert($data);
        return redirect()->to('/Admin/gambar');
    }

    public function delete($id)
    {
        // get foto berdasarkan id
        $foto = $this->m_admin->getGambar_byId($id);
        // dd($foto['nama']);

        // cek jika file gambar default.jpg
        if ($foto['nama'] != 'default.jpg') {
            // hapus foto akomodasi
            unlink('upload/gambar/' . $foto['nama']);
        }

        $this->db->table('tb_gambar')->delete(['id' => $id]);
        return redirect()->to('/Admin/gambar');
    }


    /////////////////////////////////// ADMIN ///////////////////////////////////
    public function user()
    {
        if (session()->get('email') == null) {
            return redirect()->to('/Auth');
        }

        $data = [
            'akun' => $this->m_admin->getAkun(session()->get('email')),
            'judul' => "Data User",
            'validation' => \Config\Services::validation()
        ];
        return view('data_table/data_user', $data);
    }

    public function ambilUser()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'admin' => $this->m_admin->getuser(),
                'validation' => \Config\Services::validation()
            ];

            $msg = [
                'data' => view('data_table/table_user', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf data tidak dapat diproses');
        }
    }

    public function save_user()
    {
        $validaion = \Config\Services::validation();
        if ($this->request->isAJAX()) {

            $valid = $this->validate([
                'name' => 'required',
                'email' => [
                    'rules' => 'required|valid_email|is_unique[tb_akun.email]',
                    'errors' => [
                        'required' => 'The email field is required.',
                        'is_unique' => 'Email already registered.'
                    ]
                ],
                'password' => 'required'
            ]);

            if (!$valid) {
                $msg = ['error' => [
                    'name' => $validaion->getError('name'),
                    'email' => $validaion->getError('email'),
                    'password' => $validaion->getError('password'),
                ]];
            } else {
                if ($this->request->getVar('foto') == null) {
                    $foto = 'default.jpeg';
                } else {
                    $foto = $this->request->getVar('foto');
                }
                $this->m_admin->save([
                    'nama' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'foto' => $foto,
                    'role_id' => 3
                ]);

                $msg = [
                    'sukses' => 'Data Admin has been saved.'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function updateUser($id)
    {
        $this->m_admin->save([
            'id_akun' => $id,
            'nama' => $this->request->getVar('name')
        ]);
        return redirect()->to('/Admin/user');
    }

    public function update_user()
    {
        if ($this->request->isAJAX()) {
            $id_akun = $this->request->getVar('id_akun');
            $row = $this->m_admin->find($id_akun);

            $data = [
                'segment' => 'saveUpdate_user',
                'id_akun' => $row['id_akun'],
                'nama' => $row['nama'],
                'foto' => $row['foto'],
            ];

            $msg = [
                'sukses' => view('data_table/modal/modalEdit_akun', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function saveUpdate_user()
    {
        $validaion = \Config\Services::validation();
        if ($this->request->isAJAX()) {

            $valid = $this->validate([
                'name' => 'required',
            ]);

            if (!$valid) {
                $msg = ['error' => [
                    'name' => $validaion->getError('name'),
                ]];
            } else {
                $id = $this->request->getVar('id');

                if ($this->request->getVar('foto') == null) {
                    $foto = 'default.jpeg';
                } else {
                    $foto = $this->request->getVar('foto');
                }
                $this->m_admin->update($id, [
                    'nama' => $this->request->getVar('name'),
                    'foto' => $foto,
                ]);

                $msg = [
                    'sukses' => 'Data Admin has been di updated.'
                ];
            }
            echo json_encode($msg);
        }
    }
}
