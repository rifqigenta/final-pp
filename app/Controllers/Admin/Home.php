<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KategoriModel;
use App\Models\Admin\PromoModel;
use App\Models\Admin\KaryawanModel;
use App\Models\Admin\InfoTokoModel;
use App\Models\Admin\KomplainModel;
use App\Models\Admin\TransaksiModel;
use App\Models\Admin\ProdukModel;
use App\Models\Admin\RestockModel;

class Home extends BaseController{

    protected $kategoriModel, $promoModel, $karyawanModel, $infoTokoModel, $komplainModel, $transaksiModel, $produkModel, $restockModel;
	public function __construct() {
		$this->kategoriModel 	= new KategoriModel();
		$this->promoModel = new PromoModel();
		$this->karyawanModel = new KaryawanModel();
        $this->infoTokoModel = new infoTokoModel();
        $this->komplainModel = new KomplainModel();
        $this->transaksiModel= new TransaksiModel();
        $this->produkModel  = new ProdukModel();
        $this->restockModel = new RestockModel();
	}

    public function index(){
        $tanggal = date("Y-m-d");
        $data['sayur'] = $this->produkModel->select("count(id_produk) as total")->where(["status"=>"1", "kuantitas >"=>0])->get()->getRowArray()['total'];
        $data['totalPenjualan'] = $this->transaksiModel->select("count(id_transaksi) as total, SUM(total_bayar) as pendapatan")->LIKE("tgl_pembelian", $tanggal)->get()->getRowArray();
        $data['peringkatKasir'] = $this->transaksiModel->select("COUNT(transaksi.id_transaksi) as total, b.nama")->JOIN("kasir b", "transaksi.id_kasir=b.id_kasir")->GROUPBY("transaksi.id_kasir")->get()->getResultArray();
        $data['title'] = "Dashboard Admin";
        return view("admin/home", $data);
        // . view("admin/home")
        // . view("admin/main/footer");
    }

    public function karyawan(){
        $data['title'] = "Daftar Karyawan";
        $data['detail'] = $this->karyawanModel->select("*")->where("status", "1")->get()->getResultArray();
        return view("admin/karyawan", $data);
        // . view("admin/karyawan")
        // . view("admin/main/footer");
    }

    public function promo(){
        $data['title'] = "Daftar Promo";
        $data['detail'] = $this->promoModel->select("*")->where("status <", "2")->get()->getResultArray();
        return view("admin/promo", $data);
        // . view("admin/promo")
        // . view("admin/main/footer");
    }

    public function laporan(){
        $data['title'] = "Daftar Laporan";
        return view("admin/laporan", $data);
        // . view("admin/laporan")
        // . view("admin/main/footer");
    }

    public function komplain(){
        $data['title'] = "Daftar Komplain";
        $data['detail'] = $this->komplainModel->select("komplain.*, c.nama as nama_kasir")->JOIN("kasir c", "komplain.id_kasir=c.id_kasir")->get()->getResultArray();
        return view("admin/komplain", $data);
        // . view("admin/komplain")
        // . view("admin/main/footer");
    }

    public function produk(){
        $data['title'] = "Daftar Produk";
        $paginate = 5;

        // Variabel Filter
		$q	= $this->request->getVar("q");
		$idKategori	= $this->request->getVar("idKategori");
		$terlaris	= $this->request->getVar("terlaris");

        // BASE QUERY
        $produk = $this->produkModel->select("produk.id_produk, produk.id_kategori, produk.nama, produk.kuantitas, produk.harga, produk.gambar, b.nama_kategori, COUNT(c.id_produk) as total")
        ->JOIN("kategori b", "produk.id_kategori=b.id_kategori")
        ->JOIN("transaksi_detail c", "produk.id_produk=c.id_produk", "left")
        ->GROUPBY("produk.id_produk");

        // Kategori
		if($idKategori!="" || $idKategori!=null){
            $produk->WHERE("produk.id_kategori", $idKategori);
        }

        // Cari
		if($q!="" || $q!=null){
            $produk->LIKE("produk.nama", $q)->orLike("b.nama_kategori", $q);
        }

        // Terlaris
		if($terlaris="0"){
            $produk->orderBy("total", "DESC");
        }elseif ($terlaris=="1") {
            $produk->orderBy("total", "ASC");
        }else{
            $produk->orderBy("produk.id_produk", "DESC");
        }

        // Hanya Produk dengan Status 1
        $produk->WHERE("produk.status", "1");

        // Exec DB
        $data['produk'] = $produk->paginate($paginate, 'produk');

        $data['kategori'] = $this->kategoriModel->select("*")->where("status", "1")->get()->getResultArray();
        $data['pager'] = $produk->pager;
        $data['nomor'] = nomor($this->request->getVar('page_produk'), $paginate);
        return view("admin/produk", $data);
        // . view("admin/produk")
        // . view("admin/main/footer");
    }

    public function infoToko(){
        $data['title'] = "Info Toko";
        $data['detail'] = $this->infoTokoModel->select("*")->orderBy("id_toko", "DESC")->limit(1)->get()->getRowArray();
        return view("admin/info-toko", $data);
    }

    function laporanPenjualan(){
        $data['title'] = "Laporan Penjualan";
		$q	= $this->request->getVar("q");
        $tglMulai = $this->request->getVar("tglAwal");
		$tglAkhir = $this->request->getVar("tglAkhir");
        $paginate = 5;

        // Base Query
        $laporanPenjualan = $this->transaksiModel->select("transaksi.*, b.nama")
        ->JOIN("kasir b", "transaksi.id_kasir=b.id_kasir")
        ->orderBY("transaksi.id_transaksi", "DESC");
        
        // Tangagl Mulai
		if($tglMulai!="" || $tglMulai!=null){
            $laporanPenjualan->WHERE("transaksi.tgl_pembelian >=", $tglMulai);
        }

        // Tangagl Mulai
		if($tglAkhir!="" || $tglAkhir!=null){
            $laporanPenjualan->WHERE("transaksi.tgl_pembelian <=", $tglAkhir);
        }

        // Cari
		if($q!="" || $q!=null){
            $laporanPenjualan->LIKE("transaksi.id_transaksi", $q)->orLike("b.nama", $q);
        }
        $data['detail'] = $laporanPenjualan->paginate($paginate, "penjualan"); 
        $data['pager'] = $laporanPenjualan->pager;
        return view("admin/laporan-penjualan", $data);
    }

    function laporanStok(){
        $data['title'] = "Laporan Stok";
        return view("admin/laporan-stok", $data);
        // . view("admin/laporan-stok")
        // . view("admin/main/footer");
    }

    function kategori(){
        $data['title']  = "Daftar Kategori";
        $data['detail'] = $this->kategoriModel->select("*")->where("status", "1")->get()->getResultArray();
        return view("admin/kategori", $data);
        // . view("admin/kategori")
        // . view("admin/main/footer");
    }

    function restock(){
        $data['title'] = "Restock";
        $paginate = 5;
        $data['produk'] = $this->produkModel->select("*")->where("status", "1")->get()->getResultArray();

        // Get Variabel Filter
        $q	= $this->request->getVar("q");
		$idKategori	= $this->request->getVar("idKategori");
        
        // Kategori
        $data['kategori'] = $this->kategoriModel->select("*")->where("status", "1")->get()->getResultArray();

        // Base Query
        $baseQuery = $this->restockModel->select("restock.*, b.nama, b.id_kategori, c.nama_kategori")->JOIN("produk b", "restock.id_produk=b.id_produk")->JOIN("kategori c", "b.id_kategori=c.id_kategori")->orderBy("restock.id_restock", "DESC");

        // Kategori
		if($idKategori!="" || $idKategori!=null){
            $baseQuery->WHERE("b.id_kategori", $idKategori);
        }

        // Cari
		if($q!="" || $q!=null){
            $baseQuery->LIKE("b.nama", $q)->orLike("c.nama_kategori", $q);
        }

        // Pagination
        $data['restock']= $baseQuery->paginate($paginate, "restock");
        $data['pager']= $baseQuery->pager;
        $data['nomor'] = nomor($this->request->getVar('page_restock'), $paginate);

        // Load View
        return view("admin/restock", $data);
    }
}
