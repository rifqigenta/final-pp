<?= $this->extend('admin/main/bodyContent') ?>
<?= $this->section('content') ?>
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
      <label style="font-size:18px; font-weight:600">Daftar Komplain</label>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div style="overflow-x:auto;">
        <table class="table bg-white rounded-3 border-light-subtle" id="tablePromo">
          <thead>
            <tr class="text-white" style="background-color:#04BEB3">
              <th scope="col">Nama Kasir</th>
              <th scope="col">Nama Pembeli</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Komplain</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($detail as $row) {?>
              <tr>
                <td scope="row"><?= $row['nama_kasir'];?></tD>
                <td><?= $row['nama'];?></td>
                <td><?= $row['tanggal'];?></td>
                <td><?= $row['teks_komplain'];?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#tablePromo').DataTable();
    $('#linkKomplain').addClass("active");
  });
</script>
<?= $this->endSection() ?>