<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\ProdukModel;

class ProsesProduk extends BaseController{

    protected $produkModel;
	public function __construct() {
        $this->produkModel = new ProdukModel();
	}

    public function tambah(){
        // Validation
        $validate = [
            'nama' => [
				'label' => 'Nama Produk',
				'rules' => 'required|min_length[5]',
				'errors' => [
					'required' => "*Harus Di isi",
					'min_length' => "*Minimal 5 karakter"
				],
			],
            'kategori' => [
				'label' => 'Kategori',
				'rules' => 'required|is_not_unique[kategori.id_kategori]',
				'errors' => [
					'required' => "*Harus Di isi",
					'is_not_unique' => "*Kategori Tidak Tersedia"
				],
			],
            'harga' => [
				'label' => 'Harga',
				'rules' => 'required|is_natural',
				'errors' => [
					'required' => "*Harus Di isi",
					'is_natural' => "*Harus angka, lebih dari 0"
				],
			],
            'gambar' => [
                'uploaded[gambar]',
                'mime_in[gambar, image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[gambar, 4096]',
            ]
        ];

        if(!$this->validate($validate)){
			// var_dump($this->validation->getErrors());
			return redirect()->back()->withInput();
		}else{
            // Variabel Form
			$data['nama'] = $this->request->getPost("nama");
			$data['id_kategori'] = $this->request->getPost("kategori");
			$data['harga'] = $this->request->getPost("harga");
            $gambar = $this->request->getFile("gambar");

            // Proses Gambar
            $fileName = $gambar->getRandomName();
			$data['gambar'] = $fileName;
			$gambar->move('gambar/produk/', $fileName);


            // Exec DB
            $this->produkModel->insert($data);

            // Return Alert
			echo "<script>
                alert('Produk Berhasil Ditambah');
                window.location.href = '/admin/produk/';
            </script>";
        }
    }

	function update(){
		// Validation
        $validate = [
            'idUpdate' => [
				'label' => 'Id Update',
				'rules' => 'required|is_not_unique[produk.id_produk]',
				'errors' => [
					'required' => "*Harus Di isi",
					'is_not_unique' => "*Produk Tidak Ditemukan"
				],
			],
			'status' =>[
				'label' => 'Status',
				'rules' => 'permit_empty|in_list[0]',
				'errors' => [
					'in_list' => "*Status Tidak Ditemukan"
				],
			],
			'editNama' => [
				'label' => 'Nama Produk',
				'rules' => 'permit_empty|min_length[5]',
				'errors' => [
					'min_length' => "*Minimal 5 karakter"
				],
			],
            'editKategori' => [
				'label' => 'Kategori',
				'rules' => 'permit_empty|is_not_unique[kategori.id_kategori]',
				'errors' => [
					'is_not_unique' => "*Kategori Tidak Tersedia"
				],
			],
            'editHarga' => [
				'label' => 'Harga',
				'rules' => 'permit_empty|is_natural',
				'errors' => [
					'is_natural' => "*Harus angka, lebih dari 0"
				],
			],
            'editGambar' => [
				'permit_empty',
                'uploaded[editGambar]',
                'mime_in[editGambar, image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[editGambar, 4096]',
            ]
		];

		if(!$this->validate($validate)){
			var_dump($this->validation->getErrors());
			// return redirect()->back()->withInput();
		}else{
			// Variabel Form
			$id = $this->request->getPost("idUpdate");
			$nama = $this->request->getPost("editNama");
			$kategori = $this->request->getPost("editKategori");
			$harga = $this->request->getPost("editHarga");
			$status = $this->request->getPOST("status");
            $gambar = $this->request->getFile("editGambar");

			// CEK UPDATE
			if($nama!=""){
				$data['nama'] = $nama;
			}
			if($kategori!=""){
				$data['id_kategori'] = $kategori;
			}
			if($harga!=""){
				$data['harga'] = $harga;
			}
			if($status!=""){
				$data['status'] = $status;
			}

			// Cek Gambar Update
			if(!empty($_FILES['editGambar']['name'])){
				$fileName = $gambar->getRandomName();
				$data['gambar'] = $fileName;
				$gambar->move('gambar/produk/', $fileName);
			}

			// Exec DB
			$db = $this->produkModel->update($id, $data);

			if($status!=""){
				if($db){
					echo json_encode(1);
				}else{
					echo json_encode(0);
				}
			}else{
				if($db){
					echo "<script>
						alert('Produk Diperbarui');
						window.location.href = '/admin/produk/';
					</script>";
				}else{
					echo "<script>
						alert('Gagal, silahkan diperbarui');
						window.location.href = '/admin/produk/';
					</script>";
				}
			}

		}
	}
}
