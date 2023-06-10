<div class="container" style="margin-top: 5rem;">
  <div class="row mb-3">
    <div class="col-md-12">
      <label style="font-size:18px; font-weight:600">Laporan Stok</label>
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
      <table class="table bg-white rounded-3">
        <thead>
          <tr>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Kategori</th>
            <th scope="col">Stok</th>
            <th scope="col">Nilai</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="row">BRG-001</td>
            <td>Sayuran Daun Hijau</td>
            <td>Sayur</td>
            <td>20</td>
            <td>Rp. 20.000</td>
          </tr>
        </tbody>
      </table>
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

<script>
  $(document).ready(function(){
    $('#linkLaporan').addClass("active");
  });
</script>