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
              <th scope="col">Invoice</th>
              <th scope="col">Komplain</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <tD scope="row">W U M B O</tD>
              <td><a href="#">#1234567890</a></td>
              <td>Sayur Kurang Segar</td>
            </tr>
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