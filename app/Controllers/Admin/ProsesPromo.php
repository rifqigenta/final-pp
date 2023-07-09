<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\PromoModel;
use DateTime;

class ProsesPromo extends BaseController{
  
  	protected $promoModel;
	public function __construct() {
		$this->promoModel= new PromoModel();
	}

  	public function tambah(){
		$validate = [
			'nama' => [
				'label' => 'Nama',
				'rules' => 'required|min_length[5]',
				'errors' => [
					'required' => "*Harus Di isi",
					'min_length' => "*Minimal 5 karakter"
				],
			],
			'kodePromo' => [
				'label' => 'Kode Promo',
				'rules' => 'required|min_length[3]|alpha_numeric|is_unique[promo.kode_promo]',
				'errors' => [
					'required' => "*Harus Di isi",
					'min_length' => "*Minimal 5 karakter",
					'alpha_numeric' => "*Harus berisi huruf dan angka saja",
					'is_unique' => "Kode promo sudah digunakan"
				],
			],
			'tanggalBerakhir' => [
				'label' => 'Tanggal Berakhir',
				'rules' => 'required|valid_date[Y-m-d]',
				'errors' => [
					'required' => "*Harus Di isi",
					'valid_date'=> "*Harus Tanggal"
				],
			],
			'potongan' => [
				'label' => 'Potongan',
				'rules' => 'required|is_natural_no_zero|less_than_equal_to[100]',
				'errors' => [
					'required' => "*Harus Di isi",
					'is_natural_no_zero' => "*Minimal 1%",
					'less_than_equal_to' => "*Maksimal 100%"
				],
			],
			'minimalPembelian' => [
				'label' => 'Minimal Pembelian',
				'rules' => 'required|is_natural',
				'errors' => [
					'required' => "*Harus Di isi",
					'is_natural' => "*Minimal Rp. 0",
				],
			],
			'kuota' => [
				'label' => 'Kuota',
				'rules' => 'required|is_natural_no_zero',
				'errors' => [
					'required' => "*Harus Di isi",
					'is_natural_no_zero' => "*Minimal 1",
				],
			],
		];

		if(!$this->validate($validate)){
			return redirect()->back()->withInput();
		}else{
			// Variabel Form
			$data['nama'] = $this->request->getPost("nama");
			$data['kode_promo'] = $this->request->getPost("kodePromo");
			$data['tgl_berakhir'] = $this->request->getPost("tanggalBerakhir");
			$data['potongan_persen'] = $this->request->getPost("potongan");
			$data['minimum_pembelian'] = $this->request->getPost("minimalPembelian");
			$data['kuota'] = $this->request->getPost("kuota");

			// Cek Valid Data
			$tgl = new DateTime($data['tgl_berakhir']);
			$data['tgl_berakhir'] =  date_format($tgl, "Y-m-d 23:59:59");
			$currentDate = date('Y-m-d H:i:s');
			if($currentDate > $data['tgl_berakhir']){
				return redirect()->back()->withInput();
			}else{
				// Exec Database
				$execDB = $this->promoModel->insert($data);

				echo "<script>
					alert('Promo Berhasil Ditambah');
					window.location.href = '/admin/promo/';
				</script>";
			}
		}
  	}

	public function update(){
		$validate = [
			'idUpdate'	=> [
			  'label'	=> "ID",
			  'rules'	=> 'required|is_natural|is_not_unique[promo.id_promo]',
			  'errors'=> [
				'required'			=> "*Harus Di isi",
				'is_natural'		=> "*Harus angka",
				'is_not_unique'	=> "*Id Tidak Ditemukan"
			  ]
			],
			'status' => [
			  'label'	=> "Status",
			  'rules'	=> "in_list[1,2]",
			  'errors'=> [
				'in_list' => "*Status Tidak Tersedia",
			  ]
			]
		];

		if(!$this->validate($validate)){
			echo json_encode(0);
		}else{
			// Variabel FORM
			$id				= $this->request->getPost('idUpdate');
			$data['status']	= $this->request->getPost('status');

			// Exec DB
			$exec = $this->promoModel->update($id, $data);
			
			if($exec){
				return json_encode(1);
			}else{
				return json_encode(0);
			}
		}
	}
}
