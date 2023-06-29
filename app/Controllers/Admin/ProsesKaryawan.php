<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KaryawanModel;
use App\Models\Login\LoginModel;

class ProsesKaryawan extends BaseController
{

    protected $karyawanModel, $loginModel;
    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
        $this->loginModel = new LoginModel();
    }

    public function tambah()
    {

        $validate = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => "*Harus diisi",
                ],
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => "*Harus diisi",
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => "*Harus diisi",
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => "*Harus diisi",
                    'min_length[8]' => "Minimal 8 karakter"
                ],
            ],
        ];

        if ($this->validate($validate)) {
            
            $nama = $this->request->getPost('nama');
            $alamat = $this->request->getPost('alamat');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $cek = $this->karyawanModel->select('role_kode')->orderBy("role_kode", 'DESC')
            ->limit(1)
            ->get();
            
            if($cek) {
                $sumKaryawan = $this->karyawanModel->countAll();
        
                $role_kode = 'K-' . ($sumKaryawan + 1);
            }
            
            $data = [
                'role_kode' => $role_kode,
                'uname' => $email,
                'pass' => md5($password),
                'level' => 1,
            ];
            $execUser = $this->loginModel->insert($data);
            
            $dataKasir = [
                'role_kode' => $role_kode,
                'nama' => $nama,
                'alamat' => $alamat,
                'email' => $email,
            
            ];
            $execKasir = $this->karyawanModel->insert($dataKasir);

            echo "<script>
                    alert('Kategori Berhasil Ditambah');
                    window.location.href = '/admin/karyawan/';
                </script>"; 
        } else {
            return redirect()->back()->withInput();
            
        }
    }

    public function update()
    {
        $validate = [
            'idUpdate'    => [
                'label'    => "ID",
                'rules'    => 'required|is_natural|is_not_unique[kasir.id_kasir]',
                'errors' => [
                    'required'            => "*Harus Di isi",
                    'is_natural'        => "*Harus angka",
                    'is_not_unique'    => "*Id Tidak Ditemukan"
                ]
            ],
            'status' => [
                'label'    => "Status",
                'rules'    => "permit_empty|in_list[0,1]",
                'errors' => [
                    'in_list' => "*Status Tidak Tersedia",
                ]
            ],
            'namaEdit' => [
                'label' => 'Nama',
                'rules' => 'permit_empty|alpha_space',
                'errors' => [
                    'alpha_space' => "*Hanya boleh huruf"
                ],
            ],
            'alamatEdit' => [
                'label' => 'Alamat',
                'rules' => 'permit_empty|alpha_numeric',
                'errors' => [
                    'alpha_numeric' => "*Hanya Berisi Huruf dan Angka"
                ],
            ]
        ];

        if (!$this->validate($validate)) {
            return redirect()->back()->withInput();
        } else {
            // Variabel FORM
            $id             = $this->request->getPost('idUpdate');
            $status         = $this->request->getPost('status');
            $nama           = $this->request->getPost('namaEdit');
            $alamat           = $this->request->getPost('alamatEdit');

            // Cek Update Status
            if ($status != "" || $status !=null) {
                $data['status']    = "0";
            }
            // Cek Update Karyawan
            if ($nama != "" || $nama !=null) {
                $data['nama']    = $nama;
            }
            // Cek Update Karyawan
            if ($alamat != "" || $alamat !=null) {
                $data['alamat']    = $alamat;
            }

            // Exec DB
            $execKasir = $this->karyawanModel->update($id, $data);
            if ($execKasir) {
                if (isset($data['status'])) {
                    return json_encode(1);
                } else {
                    echo "<script>
                    alert('Data Karyawan Berhasil Diubah');
                    window.location.href = '/admin/karyawan/';
                    </script>";
                }
            } else {
                return json_encode(0);
            }
        }
    }
}
