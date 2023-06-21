<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KaryawanModel;

class ProsesKaryawan extends BaseController
{

    protected $karyawanModel;
    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }

    public function tambah()
    {

        $validate = [
            'role_kode' => [
                'label' => 'Role Kode',
                'rules' => 'required',
                'errors' => [
                    'required' => "*Harus diisi",
                ],
            ],
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
                'rules' => 'required',
                'errors' => [
                    'required' => "*Harus diisi",
                ],
            ],
        ];

        if (!$this->validate($validate)) {
            return redirect()->back()->withInput();
        } else {
            $role = $this->request->getPost("role_kode");
            $karyawan = $this->request->getPost("nama");
            $alamat = $this->request->getPost("alamat");
            $email = $this->request->getPost("email");
            $pass = $this->request->getPost("password");

            $data = [
                'role_kode' => $role,
                'nama' => $karyawan,
                'alamat' => $alamat,
                'email' => $email,
                'password' => $pass,
            ];

            // Exec Database
            $execDB = $this->kategoriModel->insert($data);

            echo "<script>
				alert('Kategori Berhasil Ditambah');
				window.location.href = '/admin/kategori/';
			</script>";
        }
    }

    // public function update()
    // {
    //     $validate = [
    //         'idUpdate'    => [
    //             'label'    => "ID",
    //             'rules'    => 'required|is_natural|is_not_unique[kategori.id_kategori]',
    //             'errors' => [
    //                 'required'            => "*Harus Di isi",
    //                 'is_natural'        => "*Harus angka",
    //                 'is_not_unique'    => "*Id Tidak Ditemukan"
    //             ]
    //         ],
    //         'status' => [
    //             'label'    => "Status",
    //             'rules'    => "permit_empty|in_list[0,1]",
    //             'errors' => [
    //                 'in_list' => "*Status Tidak Tersedia",
    //             ]
    //         ],
    //         'kategoriEdit' => [
    //             'label' => 'Kategori',
    //             'rules' => 'permit_empty|alpha_space|min_length[5]',
    //             'errors' => [
    //                 'alpha_space' => "*Hanya boleh huruf",
    //                 'min_length' => "*Minimal 5 karakter"
    //             ],
    //         ]
    //     ];

    //     if (!$this->validate($validate)) {
    //         return redirect()->back()->withInput();
    //     } else {
    //         // Variabel FORM
    //         $id            = $this->request->getPost('idUpdate');
    //         $status    = $this->request->getPost('status');
    //         $kategori   = $this->request->getPost('kategoriEdit');

    //         // Cek Update Status
    //         if ($status != "" || $status != null) {
    //             $data['status']    = "0";
    //         }

    //         // Cek Update Kategori
    //         if ($kategori != "" || $kategori != null) {
    //             $data['nama_kategori']    = $kategori;
    //         }

    //         // Exec DB
    //         $exec = $this->kategoriModel->update($id, $data);

    //         if ($exec) {
    //             if (isset($data['status'])) {
    //                 return json_encode(1);
    //             } else {
    //                 echo "<script>
    //       alert('Kategori Berhasil Diubah');
    //       window.location.href = '/admin/kategori/';
    //     </script>";
    //             }
    //         } else {
    //             return json_encode(0);
    //         }
    //     }
    // }
}
