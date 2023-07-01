<?= $this->extend('admin/main/bodyContent'); ?>
<?= $this->section('content'); ?>

<?php
  $cari = explode("=", service('uri')->getQuery(['only' => ['q']]));
  if(isset($cari[1])){
    $cari = $cari[1];
  }else{
    $cari	= null;
  }

  // Filter Kategori
  $idKategori = explode("=", service('uri')->getQuery(['only' => ['idKategori']]));
  if(isset($idKategori[1])){
    $idKategori = $idKategori[1];
  }else{
    $idKategori	= null;
  }

  // Filter Kategori
  $terlaris = explode("=", service('uri')->getQuery(['only' => ['terlaris']]));
  if(isset($terlaris[1])){
    $terlaris = $terlaris[1];
  }else{
    $terlaris	= null;
  }
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-5 fw-semibold invisible">
      <form class="d-flex p-3" role="search">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-success ms-5" type="submit"></button>
      </form>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-12">
      <label style="font-size:18px; font-weight:600">Daftar Restock</label>
      <button type="button" class="btn btn-sm btn-info text-white" id="tambahRestock" style="float:right;"><i class="fa-solid fa-plus"></i> Restock</button>
    </div>
  </div>

  <form action="/admin/restock" method="GET">
    <div class="row">
      <div class="col-md-12">
        <label for="basic-url" class="form-label">Filter</label>
      </div>
      <div class="col-md-4 col-xs-12 mb-3">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari..." name="q" id="q" value="<?= $cari;?>">
        </div>
      </div>
      <div class="col-md-3 col-xs-12 mb-3">
        <select class="form-select" name="idKategori" id="idKategori">
          <option value="">Pilih Kategori</option>
          <?php foreach ($kategori as $row) {?>
            <option <?= ($idKategori==$row['id_kategori'])?"selected": "";?> value="<?= $row['id_kategori'];?>"><?= $row['nama_kategori'];?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-md-5">
        <button type="submit" class="btn btn-outline-success" style="float:right;"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
      </div>
    </div>
  </form>

  <div class="row">
    <div class="col-md-12">
      <div style="overflow-x:auto;">
        <table class="table bg-white rounded-3">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Produk</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Kategori</th>
              <th scope="col">Kuantitas</th>
              <th scope="col">Harga</th>
              <th scope="col">Tanggal</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if ($restock){
              foreach ($restock as $row) {?>
              <tr>
                <td><?= $nomor++;?></td>
                <td scope="row">KD-BRG<?= $row['id_produk'];?></td>
                <td><?= $row['nama'];?></td>
                <td><?= $row['nama_kategori'];?></td>
                <td><?= $row['kuantitas'];?></td>
                <td>Rp. <?= number_format($row['harga']);?></td>
                <td><?= $row['tgl_tambah'];?></td>
                <td>
                  <button type="button" class="btn btn-sm btn-outline-danger mt-1" onclick="deleteProduk(<?= $row['id_restock'];?>, '<?= $row['nama'];?>')"><i class="fa-solid fa-trash"></i></button>
                </td>
              </tr>
            <?php } }else{ ?>
              <tr>
                <td colspan="8" class="text-center">Data Tidak Ditemukan</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-12 col-xs-12">
      <?= $pager->links("restock", "custom_pagination"); ?>
    </div>
  </div>

</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Restock</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open_multipart('admin/proses/restock/tambah') ?>
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="mb-3">
            <label for="produk" class="form-label">Produk</label>
            <br>
            <select class="form-select js-example-basic-single js-states" aria-label=".form-select-sm example" name="id_produk" id="id_produk" required style="border-color:<?= (validation_show_error('id_produk')!=null)?'red':'';?>">
              <option selected>Pilih Produk</option>
              <?php foreach($produk as $row){?>
                <option value="<?= $row['id_produk'];?>">KD-BRG<?= $row['id_produk'];?> | <?= $row['nama'];?></option>
              <?php } ?>
            </select>
            <span style="font-size:small; color:red;"><?= validation_show_error('id_produk');?></span>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Kuantitas</label>
            <input type="number" min="1" onkeypress="validasiAngka(event)" class="form-control" id="kuantitas" name="kuantitas" value="<?= old('kuantitas'); ?>" required style="border-color:<?= (validation_show_error('kuantitas')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('kuantitas');?></span>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga Beli</label>
            <input type="number" min="1" onkeypress="validasiAngka(event)" class="form-control" id="harga" name="harga" value="<?= old('harga'); ?>" required style="border-color:<?= (validation_show_error('harga')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('harga');?></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Tambah</button>
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#linkRestock').addClass("active");
    <?php if(validation_errors()!=null){?>
      $('#modalTambah').modal('show');
    <?php }?>
    $('#id_produk').select2({
      width: "100%",
      dropdownParent: $("#modalTambah")
    });
  });

  $('#tambahRestock').click(function(){
    $('#modalTambah').modal('show');
  });
</script>
<?= $this->endSection(); ?>