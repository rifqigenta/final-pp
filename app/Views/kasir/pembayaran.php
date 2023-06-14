<?= $this->extend('kasir/main/bodyContent') ?>
<?= $this->section('content') ?>
<!-- <div class="container-fluid">
  

</div> -->
<!-- <div class="container-fluid">
  
</div> -->
<div class="container-fluid">
  <div class="row">
    <div class="col-5 fw-semibold mt-3" style="line-height: 4; ">
      <form class="d-flex" role="search">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-success ms-5" type="submit">Search</button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-2 mt-4">Tanggal
      <input type="date" name="tanggal" class="mt-2" style="width: 15rem;">
    </div>
  </div>
  <div class="row">
    <div class="col table-responsive">
      <table class="table table-bordered mt-2 bg-white">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Diskon</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Brokoli</td>
            <td>100 gr</td>
            <td>-</td>
            <td>3000</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Kangkung</td>
            <td>2</td>
            <td>-</td>
            <td>6000</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Kangkung</td>
            <td>2</td>
            <td>-</td>
            <td>6000</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Kangkung</td>
            <td>2</td>
            <td>-</td>
            <td>6000</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Kangkung</td>
            <td>2</td>
            <td>-</td>
            <td>6000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row mb-3">
    <div class="input-group col-5">
      <span class="input-group-text" id="inputGroup-sizing-lg">Total</span>
      <input type="text" class="form-control" aria-describedby="inputGroup-sizing-lg" />
    </div>
    <div class="input-group col-5">
      <span class="input-group-text" id="inputGroup-sizing-lg">Bayar</span>
      <input type="text" class="form-control" aria-describedby="inputGroup-sizing-lg" />
    </div>
    <!-- <div class="input-group col-4">
    <button type="button" class="btn btn-primary btn-lg">
      Bayar
    </button>
    </div> -->
    <!-- <tr>
    </tr>
    <tr>
    </tr> -->
  </div>
  <div class="row mb-3">
  <div class="input-group col-5">
      <span class="input-group-text" id="inputGroup-sizing-lg">Kembalian</span>
      <input type="text" class="form-control" aria-describedby="inputGroup-sizing-lg" />
    </div>
  </div>
    <div class="row">
    <div class="col">
    <button type="button" class="btn btn-primary btn-md mb-3">
      Bayar
    </button>
    </div>
    </div>
    <div class="row">
    <div class="col">
    <button type="button" class="btn btn-success btn-md mb-3">
      Cetak Laporan
    </button>
    </div>
    </div>
</div>
<script>
  $(document).ready(function(){
		$('#linkPembayaran').addClass("active");
    // $('#tableKaryawan').DataTable();
  });
</script>
<?= $this->endSection() ?>