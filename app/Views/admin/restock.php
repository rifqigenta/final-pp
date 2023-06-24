<?= $this->extend('admin/main/bodyContent'); ?>
<?= $this->section('content'); ?>

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