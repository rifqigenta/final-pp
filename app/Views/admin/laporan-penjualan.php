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
      <label style="font-size:18px; font-weight:600">Laporan Penjualan</label>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <label for="basic-url" class="form-label">Filter</label>
    </div>
    <div class="col-md-4 col-xs-12 mb-3">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Cari..." name="filterNama" id="filterNama" aria-label="Recipient's username">
      </div>
    </div>
    <div class="col-md-3 col-xs-12 mb-3">
      <div class="input-group">
        <span class="input-group-text">Tanggal Awal</span>
        <input type="date" class="form-control" id="tglAwal" name="tglAwal">
      </div>
    </div>
    <div class="col-md-3 col-xs-12 mb-3">
      <div class="input-group">
        <span class="input-group-text">Tanggal Akhir</span>
        <input type="date" class="form-control" id="tglAkhir" name="tglAkhir">
      </div>
    </div>
    <div class="col-md-2">
      <button type="button" class="btn btn-outline-success"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div style="overflow-x:auto;">
        <table class="table bg-white rounded-3">
          <thead>
            <tr>
              <th scope="col">Invoice</th>
              <th scope="col">Waktu Pembelian</th>
              <th scope="col">Total</th>
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">#123456</td>
              <td>01-05-2023 10:11:03</td>
              <td>Rp.8.000.00</td>
              <td><button type="button" class="btn btn-primary" onclick="lihatDetail(123456)"><i class="fa-solid fa-eye"></i> Lihat</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-6 col-xs-6">
      <button type="button" class="btn btn-success" title="Ekspor Excel"><i class="fa-solid fa-file-export"></i> Ekspor</button>
    </div>

    <div class="col-md-6 col-xs-6">
      <nav aria-label="..." style="float:right;">
        <ul class="pagination">
          <li class="page-item disabled">
            <span class="page-link">Previous</span>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <span class="page-link">2</span>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>

<!-- Modal Lihat Detail -->
<div class="modal fade" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleDetailPembelian"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div style="overflow-x:auto;">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Sawi</th>
                <td>2.000</td>
              </tr>
              <tr>
                <th scope="row">Jagung</th>
                <td>4.000</td>
              </tr>
              <tr>
                <th scope="row">Bayam</th>
                <td>2.000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  function lihatDetail(invoice) {
    $('#titleDetailPembelian').html(`#${invoice}`);
    $('#modalDetail').modal('show');
  }
  $(document).ready(function() {
    $('#linkLaporan').addClass("active");
  });
</script>
<?= $this->endSection() ?>