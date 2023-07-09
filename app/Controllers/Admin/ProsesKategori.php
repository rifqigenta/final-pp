<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\KategoriModel;

class ProsesKategori extends BaseController{

  protected $kategoriModel;
	public function __construct() {
		$this->kategoriModel 	= new KategoriModel();
	}



  public function tambah(){

    $validate = [
			'kategori' => [
				'label' => 'Kategori',  
				'rules' => 'required|alpha_space|min_length[4]',
				'errors' => [
					'required' => "*Harus Di isi",
					'alpha_space' => "*Hanya boleh huruf",
					'min_length' => "*Minimal 4 karakter"
				],
			]
		];

    if(!$this->validate($validate)){
			return redirect()->back()->withInput();
		}else{
      $kategori = $this->request->getPost("kategori");

      $data = [
				'nama_kategori' => $kategori,
			];

      // Exec Database
			$execDB = $this->kategoriModel->insert($data);

      echo "<script>
				alert('Kategori Berhasil Ditambah');
				window.location.href = '/admin/kategori/';
			</script>";
    }

  }

  public function update(){
    $validate = [
      'idUpdate'	=> [
        'label'	=> "ID",
        'rules'	=> 'required|is_natural|is_not_unique[kategori.id_kategori]',
        'errors'=> [
          'required'			=> "*Harus Di isi",
          'is_natural'		=> "*Harus angka",
          'is_not_unique'	=> "*Id Tidak Ditemukan"
        ]
      ],
      'status' => [
        'label'	=> "Status",
        'rules'	=> "permit_empty|in_list[0,1]",
        'errors'=> [
          'in_list' => "*Status Tidak Tersedia",
        ]
      ],
      'kategoriEdit' => [
        'label' => 'Kategori',
        'rules' => 'permit_empty|alpha_space|min_length[4]',
        'errors' => [
          'alpha_space' => "*Hanya boleh huruf",
          'min_length' => "*Minimal 4 karakter"
        ],
      ]
    ];

    if(!$this->validate($validate)){
			return redirect()->back()->withInput();
		}else{
      // Variabel FORM
      $id			= $this->request->getPost('idUpdate');
			$status	= $this->request->getPost('status');
			$kategori   = $this->request->getPost('kategoriEdit');

      // Cek Update Status
      if($status!="" || $status!=null){
				$data['status']	= "0";
			}

      // Cek Update Kategori
      if($kategori!="" || $kategori!=null){
				$data['nama_kategori']	= $kategori;
			}

      // Exec DB
      $exec = $this->kategoriModel->update($id, $data);
      
      if($exec){
        if(isset($data['status'])){
          return json_encode(1);
        }else{
          echo "<script>
          alert('Kategori Berhasil Diubah');
          window.location.href = '/admin/kategori/';
        </script>";
        }
      }else{
        return json_encode(0);
      }
    }
  }
}
