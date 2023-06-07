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
}
