<?= $this->extend('kasir/main/bodyContent') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row mt-5">
    <div class="col-md-12">
      <h5>Tambah Komplain</h5>
    </div>
  </div>
  <?= form_open('kasir/proses/tambah-komplain') ?>
      <?= csrf_field(); ?>
    <div class="row mt-2">
      <div class="col-md-12">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Pembeli</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>" placeholder="Nama Pembeli" required style="border-color:<?= (validation_show_error('nama')!=null)?'red':'';?>">
          <span style="font-size:small; color:red;"><?= validation_show_error('nama');?></span>
        </div>
      </div>
      <div class="col-md-12">
        <div class="mb-3">
          <label for="nama" class="form-label">Komplain</label>
          <textarea class="form-control" id="komplain" name="komplain" rows="3" placeholder="Komplain" style="border-color:<?= (validation_show_error('komplain'))?'red':'';?>" required><?= (old('komplain')) ? old('komplain'):"";?></textarea>
          <span style="font-size:small; color:red;"><?= validation_show_error('komplain');?></span>
        </div>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-success text-white"> Tambah</button>
      </div>
    </div>
  </form>
</div>
<script>
  $(document).ready(function() {
    $('#linkKomplain').addClass("active");
  });
</script>
<?= $this->endSection() ?>
