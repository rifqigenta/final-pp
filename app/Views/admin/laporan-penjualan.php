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
    <div class="col-md-3 col-xs-12 mb-3">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Cari..." name="filterNama" id="filterNama" aria-label="Recipient's username">
      </div>
    </div>
    <div class="col-md-4 col-xs-12 mb-3">
      <div class="input-group">
        <span class="input-group-text">Tanggal Awal</span>
        <input type="date" class="form-control" id="tglAwal" name="tglAwal">
      </div>
    </div>
    <div class="col-md-4 col-xs-12 mb-3">
      <div class="input-group">
        <span class="input-group-text">Tanggal Akhir</span>
        <input type="date" class="form-control" id="tglAkhir" name="tglAkhir">
      </div>
    </div>
    <div class="col-md-1">
      <button type="button" class="btn btn-outline-success"><i class="fa-solid fa-magnifying-glass"></i></button>
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
              <th scope="col">Kasir</th>
              <th scope="col">Total</th>
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($detail){
              foreach($detail as $row){?>
                <tr>
                  <td scope="row">#<?= $row['id_transaksi'];?></td>
                  <td><?= $row['tgl_pembelian'];?></td>
                  <td><?= $row['nama'];?></td>
                  <td>Rp. <?= number_format($row['total_bayar']);?></td>
                  <td><button type="button" class="btn btn-primary" onclick="lihatDetail(<?= $row['id_transaksi'];?>)"><i class="fa-solid fa-eye"></i> Lihat</button></td>
                </tr>
            <?php }}else{ ?>
              <tr>
                <td colspan="5" class="text-center">Data Tidak Ada</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-6 col-xs-6">
      <button type="button" class="btn btn-success" title="Ekspor Excel"><i class="fa-solid fa-file-export"></i> Ekspor</button>
    </div>

    <div class="col-md-6 col-xs-6">
      <?= $pager->links("penjualan", "custom_pagination"); ?>
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