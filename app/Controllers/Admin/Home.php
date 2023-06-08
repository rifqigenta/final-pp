<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController{

    public function index(){
        $data['title'] = "Dashboard Admin";
        return view("admin/main/header", $data)
        . view("admin/home")
        . view("admin/main/footer");
    }

    public function karyawan(){
        $data['title'] = "Daftar Karyawan";
        return view("admin/main/header", $data)
        . view("admin/karyawan")
        . view("admin/main/footer");
    }

    public function infoToko(){
        $data['title'] = "Info Toko";
        return view("admin/main/header", $data)
        . view("admin/info-toko")
        . view("admin/main/footer");
    }
}
