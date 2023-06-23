<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\InfoTokoModel;

class InfoTokoProses extends BaseController{

    protected $infoTokoModel;
    public function __construct(){
        $this->infoTokoModel = new InfoTokoModel();
    }
    
    public function update(){
        $validate = [
            'namaToko' => [
                'label' => 'Nama Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => "*Harus diisi",
                ],
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => "*Harus diisi",
                ],
            ],
            'noWA' => [
                'label' => 'No Whatsapp',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => "*Harus diisi",
                    'numeric'  => "*Harus Angka"
                ],
            ],
            'deskripsi' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => "*Harus diisi",
                ],
            ],
        ];

        if (!$this->validate($validate)) {
            return redirect()->back()->withInput();
        } else {
            
            // Variabel FORM
            $data['nama_toko']  = $this->request->getPOST('namaToko');
            $data['alamat']     = $this->request->getPOST('alamat');
            $data['no_wa']      = $this->request->getPOST('noWA');
            $data['deskripsi_toko']= $this->request->getPOST('deskripsi');

            // Cek Tabel isi?
            $cekData = $this->infoTokoModel->select("*")->orderBy("id_toko", "DESC")->limit(1);

            if($cekData->countAll()<1){
                // Input Baru

                // Exec DB
                $this->infoTokoModel->insert($data);
                
            }else{
                // Edit
                $idUpdate = $cekData->get()->getRowArray()['id_toko'];

                // Exec DB
                $this->infoTokoModel->update($idUpdate, $data);
            }

            echo "<script>
				alert('Info Toko Diupdate');
			    window.location.href = '/admin/info-toko';
		    </script>";
        }
    }
}
