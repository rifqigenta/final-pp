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
    <div class="row">
        <div class="col-5 fw-semibold " style="line-height: 4; ">
            <form class="d-flex p-3" style="margin-left: 0.7rem;" role="search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success ms-5" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayur Hijau/Bayam.jpg" class="card-img-top" alt="bayam">
                <div class="card-body">
                    <h5 class="card-title">Bayam</h5>
                    <p class="card-text">Rp 3000 / ikat</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayur Hijau/brokoli.jpg" class="card-img-top" alt="brokoli">
                <div class="card-body">
                    <h5 class="card-title">Brokoli</h5>
                    <p class="card-text">Rp 3000 / 100 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayur Hijau/buncis.jpg" class="card-img-top" alt="buncis">
                <div class="card-body">
                    <h5 class="card-title">Buncis</h5>
                    <p class="card-text">Rp 2000 / 100gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayur Hijau/kemangi.png" class="card-img-top" alt="daun_kemangi">
                <div class="card-body">
                    <h5 class="card-title">Daun Kemangi</h5>
                    <p class="card-text">Rp 2000 / 100gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayur Hijau/daunbawang.jpg" class="card-img-top" alt="daunbawang">
                <div class="card-body">
                    <h5 class="card-title">Daun Bawang</h5>
                    <p class="card-text">Rp 3000 / ikat</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayur Hijau/kangkung.jpg" class="card-img-top" alt="kangkung">
                <div class="card-body">
                    <h5 class="card-title">kangkung</h5>
                    <p class="card-text">Rp 3000 / ikat</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayur Hijau/kubis.jpg" class="card-img-top" alt="kubis">
                <div class="card-body">
                    <h5 class="card-title">Kubis</h5>
                    <p class="card-text">Rp 5000 / 500 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayur Hijau/Pakcoy.jpg" class="card-img-top" alt="pakcoy">
                <div class="card-body">
                    <h5 class="card-title">Pakcoy</h5>
                    <p class="card-text">Rp 2000 / ikat</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayuran Keras/wortel.jpg" class="card-img-top" alt="wortel">
                <div class="card-body">
                    <h5 class="card-title">Wortel</h5>
                    <p class="card-text">Rp 3000 / 200 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayuran Keras/terongungu.webp" class="card-img-top" alt="terongungu">
                <div class="card-body">
                    <h5 class="card-title">Terong Ungu</h5>
                    <p class="card-text">Rp 10.000 / 500 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayuran Keras/pare.webp" class="card-img-top" alt="pare">
                <div class="card-body">
                    <h5 class="card-title">Pare</h5>
                    <p class="card-text">Rp 8000 / 400 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayuran Keras/timun.jpg" class="card-img-top" alt="timun">
                <div class="card-body">
                    <h5 class="card-title">Timun</h5>
                    <p class="card-text">Rp 6000 / 500 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayuran Keras/tomato red 2.png" class="card-img-top" alt="tomat_merah">
                <div class="card-body">
                    <h5 class="card-title">Tomat Merah</h5>
                    <p class="card-text">Rp 12.000 / 500 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayuran Keras/kacangpanjang.webp" class="card-img-top" alt="kacang_panjang">
                <div class="card-body">
                    <h5 class="card-title">Kacang Panjang</h5>
                    <p class="card-text">Rp 5000 / 250 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayuran Keras/kentang.webp" class="card-img-top" alt="kentang">
                <div class="card-body">
                    <h5 class="card-title">Kentang</h5>
                    <p class="card-text">Rp 4000 / 200 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Sayuran Keras/jagungmanis.jpg" class="card-img-top" alt="jagungmanis">
                <div class="card-body">
                    <h5 class="card-title">Jagung Manis</h5>
                    <p class="card-text">Rp 7000 / 500 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Bawang/garlic 1.png" class="card-img-top" alt="bawangputih">
                <div class="card-body">
                    <h5 class="card-title">Bawang Putih</h5>
                    <p class="card-text">Rp 7.500 / 200gr </p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/Bawang/onion.png" class="card-img-top" alt="bawangmerah">
                <div class="card-body">
                    <h5 class="card-title">Bawang Merah</h5>
                    <p class="card-text">Rp 8000 / 1/2 kg</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/cabai/cabairawitmerah.jpg" class="card-img-top" alt="rawitmerah">
                <div class="card-body">
                    <h5 class="card-title">Cabai Rawit Merah</h5>
                    <p class="card-text">Rp 5000 / 100 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-3 justify-content-center">
            <div class="card" style="width: 15rem; float: left; margin: 5px;">
                <img src="assets/img/cabai/cabaimerahbesar.jpg" class="card-img-top" alt="cabaimerahbesar">
                <div class="card-body">
                    <h5 class="card-title">Cabai Merah Besar</h5>
                    <p class="card-text">Rp 7000 / 100 gr</p>
                    <a href="#" class="btn btn-outline-primary">
                        Tambah Keranjang
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#linkMenuUtama').addClass("active");
        // $('#tableKaryawan').DataTable();
    });
</script>
<?= $this->endSection() ?>