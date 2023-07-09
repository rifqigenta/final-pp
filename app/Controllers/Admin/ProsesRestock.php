<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\RestockModel;
use App\Models\Admin\ProdukModel;

class ProsesRestock extends BaseController
{
	protected $restockModel, $produkModel;
	public function __construct()
	{
		$this->restockModel = new RestockModel();
		$this->produkModel = new ProdukModel();
	}

	public function tambah()
	{
		$validate = [
			'id_produk' => [
				'label' => 'Produk',
				'rules' => 'required|is_not_unique[produk.id_produk]',
				'errors' => [
					'required' => "*Harus Di isi",
					'is_not_unique' => "*Produk Tidak Ditemukan"
				],
			],
			'kuantitas' => [
				'label' => 'Kuantitas',
				'rules' => 'required|is_natural',
				'errors' => [
					'required' => "*Harus Di isi",
					'is_natiral' => "*Harus angka dan lebih dari 0"
				],
			],
			'harga' => [
				'label' => 'Harga',
				'rules' => 'required|is_natural',
				'errors' => [
					'required' => "*Harus Di isi",
					'is_natiral' => "*Harus angka dan lebih dari 0"
				],
			],
		];

		if (!$this->validate($validate)) {
			return redirect()->back()->withInput();
		} else {

			// Variabel Form
			$data['id_produk'] = $this->request->getPost("id_produk");
			$data['kuantitas'] = $this->request->getPost("kuantitas");
			$data['harga'] = $this->request->getPost("harga");

			// Exec DB
			$db = $this->restockModel->insert($data);

			// Update Stock
			$updateStock = $this->produkModel->select("kuantitas")->where("id_produk", $data['id_produk'])->get()->getRowArray()["kuantitas"];
			$stockTerkini['kuantitas'] = $updateStock + $data['kuantitas'];
			$updateProduk = $this->produkModel->update($data['id_produk'], $stockTerkini);

			if ($db) {
				echo "<script>
				alert('Restock Berhasil Ditambah');
				window.location.href = '/admin/restock/';
			</script>";
			} else {
				echo "<script>
				alert('Gagal, silahkan coba lagi');
				window.location.href = '/admin/restock/';
			</script>";
			}
		}
	}
	
	public function delete()
	{
		$id_restock = $this->request->getPost('id_restock');
		$restockData = $this->restockModel->find($id_restock);

		if (!$restockData) {
			return $this->response->setJSON(['success' => false]);
		}

		$produkData = $this->produkModel->find($restockData['id_produk']);

		if (!$produkData) {
			return $this->response->setJSON(['success' => false]);
		}

		$updateProduk = $this->produkModel->update($produkData['id_produk'], ['kuantitas' => $produkData['kuantitas'] - $restockData['kuantitas']]);

		if ($updateProduk) {
			$deleteRestock = $this->restockModel->delete($id_restock);
			if ($deleteRestock) {
				return $this->response->setJSON(['success' => true]);
			}
		}
		return $this->response->setJSON(['success' => false]);
	}
}
