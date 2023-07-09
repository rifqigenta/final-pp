<?= $this->extend('admin/main/bodyContent') ?>
<?= $this->section('content') ?>

<?php 
  $cari = explode("=", service('uri')->getQuery(['only' => ['q']]));
  if(isset($cari[1])){
    $cari = $cari[1];
  }else{
    $cari	= null;
  }

  // Filter Kategori
  $tglAwal = explode("=", service('uri')->getQuery(['only' => ['tglAwal']]));
  if(isset($tglAwal[1])){
    $tglAwal = $tglAwal[1];
  }else{
    $tglAwal	= null;
  }

  // Filter Kategori
  $tglAkhir = explode("=", service('uri')->getQuery(['only' => ['tglAkhir']]));
  if(isset($tglAkhir[1])){
    $tglAkhir = $tglAkhir[1];
  }else{
    $tglAkhir	= null;
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
      <label style="font-size:18px; font-weight:600">Laporan Penjualan</label>
    </div>
  </div>
  <form action="/admin/laporan/penjualan" method="GET">
    <div class="row">
      <div class="col-md-12">
        <label for="basic-url" class="form-label">Filter</label>
      </div>
      <div class="col-md-3 col-xs-12 mb-3">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari..." name="q" id="q" value="<?= $cari;?>">
        </div>
      </div>
      <div class="col-md-4 col-xs-12 mb-3">
        <div class="input-group">
          <span class="input-group-text">Tanggal Awal</span>
          <input type="date" class="form-control" id="tglAwal" name="tglAwal" value="<?= $tglAwal;?>">
        </div>
      </div>
      <div class="col-md-4 col-xs-12 mb-3">
        <div class="input-group">
          <span class="input-group-text">Tanggal Akhir</span>
          <input type="date" class="form-control" id="tglAkhir" name="tglAkhir" value="<?= $tglAkhir;?>">
        </div>
      </div>
      <div class="col-md-1">
        <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
    </div>
  </form>
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
                  <td><button type="button" class="btn btn-sm btn-primary" onclick="lihatDetail(<?= $row['id_transaksi'];?>)"><i class="fa-solid fa-eye"></i> Lihat</button></td>
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
      <button type="button" class="btn btn-sm btn-success" title="Ekspor Excel" onclick="eksporExcel()"><i class="fa-solid fa-file-export"></i> Ekspor</button>
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
          <table class="table" id="detailTable">
            <thead>
              <tr>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">QTY</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>

  function eksporExcel() {
    window.location.href= "/admin/download/laporan-penjualan?q=<?= $cari;?>&tglAwal=<?= $tglAwal;?>&tglAkhir=<?= $tglAkhir;?>";
  }

  function lihatDetail(invoice) {
    
    // Get Detail Transaksi
    const url = `<?= base_url();?>/admin/proses/detail-transaksi/${invoice}`;
    var tbody = document.querySelector('#detailTable tbody');

    fetch(url)
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        // Iterasi melalui data JSON
        data.forEach(function(item) {
          // Membuat sebuah baris <tr> untuk setiap item
          var row = document.createElement('tr');

          // Membuat sel <td> untuk setiap properti dalam item
          var nama = document.createElement('td');
          nama.textContent = item.nama;

          var harga = document.createElement('td');
          harga.textContent = item.harga;

          var qty = document.createElement('td');
          qty.textContent = item.qty;

          var subtotal = document.createElement('td');
          subtotal.textContent = item.subtotal;

          // Menambahkan sel ke dalam baris
          row.appendChild(nama);
          row.appendChild(harga);
          row.appendChild(qty);
          row.appendChild(subtotal);


          // Menambahkan baris ke dalam tbody
          tbody.appendChild(row);
        });
      });

    // END Get Detail Transaksi

    $('#titleDetailPembelian').html(`#${invoice}`);
    $('#modalDetail').modal('show');
  }
  $(document).ready(function() {
    $('#linkLaporan').addClass("active");
  });
</script>
<?= $this->endSection() ?>