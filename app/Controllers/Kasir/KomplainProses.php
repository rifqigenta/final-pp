<?php

namespace App\Controllers\Kasir;

use App\Controllers\BaseController;
use App\Models\Kasir\KomplainModel;

class KomplainProses extends BaseController{

  protected $komplainModel;
  public function __construct(){
    $this->komplainModel = new KomplainModel();
  }

  public function tambah(){
    
    // Validation
    $validate = [
      'nama' => [
        'label' => 'Nama',
        'rules' => 'required|min_length[3]',
        'errors' => [
          'required' => "*Harus Di isi",
          'min_length' => "*Minimal 3 Karakter"
        ]
      ],
      'komplain' => [
        'label' => 'Komplain',
        'rules' => 'required|min_length[20]',
        'errors' => [
          'required' => "*Harus Di isi",
          'min_length' => "*Minimal 20 Karakter"
        ]
      ],
    ];

    // Cek Validasi
    if(!$this->validate($validate)){
			// var_dump($this->validation->getErrors());
			return redirect()->back()->withInput();
		}else{

      $data['nama'] = $this->request->getPost("nama");
      $data['teks_komplain'] = $this->request->getPost("komplain");
      $data['id_kasir'] = session('id_kasir');

      // Eksekusi Database
      $exec = $this->komplainModel->insert($data);

      if($exec){
        echo "<script>
          alert('Komplain berhasil ditambah');
          window.location.href = '/kasir/komplain/';
        </script>";
      }else{
        echo "<script>
						alert('Gagal, silahkan ulangi lagi');
						window.location.href = '/kasir/komplain/';
					</script>";
      }

    }

  }
}
