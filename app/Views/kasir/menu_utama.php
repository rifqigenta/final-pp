<?= $this->extend('kasir/main/bodyContent') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Sidebar-->
    <!-- <div class="border-end " id="sidebar-wrapper" style="background-color: #19dbcf;">
        <div class="sidebar-heading border-bottom text-white fw-semibold">
          <a href="#!"> <img src="assets/img/sidebar.svg" alt="home" width="20" class="m-2"> </a> SayurKuy</img>
        </div>
        <div class="list-group list-group-flush" style="background-color: #19dbcf;">
            <a class="list-group-item list-group-item-action list-group-item-info p-3" href="#!">Menu Utama</a>
            <a class="list-group-item list-group-item-action list-group-item-info p-3" href="../laporan/index.html">Laporan</a>
            <a class="list-group-item list-group-item-action list-group-item-info p-3"  href="../Produk/index.html">Produk</a>
            <p class="m-3 fw-semibold text-white fs-6">Bisnis</p>
            <a class="list-group-item list-group-item-action list-group-item-info p-3" href="../Karyawan/index.html">Karyawan</a>
            <a class="list-group-item list-group-item-action list-group-item-info p-3" href="../Info Toko/index.html">Info Toko</a>
        </div>
    </div> -->

    <!-- <div class="container-fluid" >
        
    </div> -->
    <!-- <div class="row">
        <div class="col-5 fw-semibold " style="line-height: 4; ">
            <form class="d-flex p-3" style="margin-left: 0.7rem;" role="search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success ms-5" type="submit">Search</button>
            </form>
        </div>
    </div> -->
    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top ">

        <!-- Sidebar Toggle (Topbar)
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button> -->

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-1 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-1 small" placeholder="Search ..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-dark" style="background: #00CC88;" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <!-- <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a> -->


            <!-- Nav Item - Messages -->
            <?php
            $keranjang = $cart->contents();
            $jml_item = 0;
            foreach ($keranjang as $key => $value) {
                $jml_item = $jml_item + $value['qty'];
            }
            ?>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" id="messagesDropdown" role="button" 
                aria-haspopup="true" aria-expanded="false" href="#" data-toggle="dropdown">
                    <i class="fa-sharp fa-solid fa-cart-shopping fa-xl"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter"><?= $jml_item ?></span>
                </a>
                <!-- Dropdown - Messages -->

                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                        Keranjang
                    </h6>
                    
                    <?php if (empty($keranjang)) { ?>
                        <a href="#" class="dropdown-item">
                            <p>Keranjang Kosong</p>
                        </a>
                    <?php } else { ?>
                        <a class="d-flex" href="#">
                            <?php foreach ($keranjang as $key => $value) { ?>
                                <a class="dropdown-item d-flex align-items-center">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle img-size-50" src="<?= base_url('assets/gambar/' . $value['options']['gambar']) ?>"
                                            alt="...">
                                        <!-- <div class="status-indicator bg-success"></div> -->
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?= $value['name'] ?></div>
                                        <div class="small text-gray-500"><?= $value['qty'] ?>*<?= number_to_currency($value['price'], 'IDR') ?>=<?= number_to_currency($value['subtotal'], 'IDR')?></div>
                                    </div>
                                </a>
                            <?php } ?>
                        </a>
                        
                        <a class="dropdown-item text-center" href="#">Total : <?= number_to_currency($cart->total(), 'IDR') ?></a>
                        
                        <a class="dropdown-item text-center" href="#">Checkout</a>
                        <a href="<?= base_url('kasir/keranjang/clear'); ?>"  class="dropdown-item text-center small text-gray-500">Clear</a>
                        <!-- <div class="dropdown-divider"></div> -->
                        <!-- <a href="#" class="dropdown_item dropdown-footer">Lihat Keranjang</a>
                        <a href="#" class="dropdown_item dropdown-footer">Checkout</a> -->
                    <?php } ?>
                </div>
            </li>
        </ul>
    </nav>
    <div class="row">
        <?php foreach ($produk as $key => $value) { ?>
            <div class="d-flex col-sm-3 justify-content-center">
                <?php
                echo form_open('kasir/keranjang/tambah');
                echo form_hidden('id', $value['id_produk']);
                echo form_hidden('price', $value['harga']);
                echo form_hidden('name', $value['nama']);
                //option 
                echo form_hidden('gambar', $value['gambar']);
                // echo form_hidden('kuantitas', $value['kuantitas']); 
                ?>
                <div class="card" style="width: 15rem; float: left; margin: 5px;">
                    <img src="<?= base_url('assets/gambar/' . $value['gambar']) ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $value['nama'] ?></h5>
                        <p class="card-text"><?= number_to_currency($value['harga'], 'IDR'); ?></p>
                        <!-- <p class="card-text"><?= $value['kuantitas'] ?>gr</p> -->
                        <!-- ra ruh carane gae perbedaan antara gram / ikat -->
                        <button class="btn btn-outline-primary" type="submit">
                            Tambah Keranjang
                        </button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#linkMenuUtama').addClass("active");
        // $('#tableKaryawan').DataTable();
    });
</script>
<?= $this->endSection() ?>