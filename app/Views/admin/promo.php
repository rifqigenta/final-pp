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
      <label style="font-size:18px; font-weight:600">Daftar Promo</label>
      <button type="button" class="btn btn-info text-white" id="tambahPromo" style="float:right;"><i class="fa-solid fa-plus"></i> Promo</button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div style="overflow-x:auto;">
        <table class="table bg-white rounded-3 border-light-subtle" id="tablePromo">
          <thead>
            <tr class="text-white" style="background-color:#04BEB3">
              <th scope="col">Nama Promo</th>
              <th scope="col">Kode</th>
              <th scope="col">Tanggal Dibuat</th>
              <th scope="col">Tanggal Berakhir</th>
              <th scope="col">Potongan</th>
              <th scope="col">Minimal Pembelian</th>
              <th scope="col">Kuota</th>
              <th scope="col">Digunakan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <tD scope="row">Ramadhan Sales</tD>
              <td>RAMADHAN23</td>
              <td>20/08/2022</td>
              <td>25/08/2022</td>
              <td>5%</td>
              <td>Rp. 50,000</td>
              <td>2000</td>
              <td>20</td>
              <td>
                <button type="button" class="btn btn-outline-success" onclick="lihatTransaksi('FGHJ223')"><i class="fa-solid fa-eye"></i> Transaksi</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal" id="modalTambahPromo" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Promo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="mb-3">
            <label for="kodePromo" class="form-label">Kode Promo</label>
            <input type="text" class="form-control" id="kodePromo" name="kodePromo" onkeydown="return validatePromo(event)" required>
            <div id="kodePromo" class="form-text">*Hanya huruf dan angka (min 8 karakter).</div>
          </div>
          <div class="mb-3">
            <label for="tanggalBerakhir" class="form-label">Tanggal Berakhir</label>
            <input type="date" class="form-control" id="tanggalBerakhir" name="tanggalBerakhir" required>
          </div>
          <div class="mb-3">
            <label for="potongan" class="form-label">Potongan (Dalam Persen)</label>
            <input type="number" min="1" max="100" class="form-control" id="potongan" name="potongan" required>
          </div>
          <div class="mb-3">
            <label for="minimalPembelian" class="form-label">Minimal Pembelian</label>
            <input type="number" min="0" class="form-control" id="minimalPembelian" name="minimalPembelian" required>
          </div>
          <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="number" min="1" class="form-control" id="kuota" name="kuota" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Promo</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#tablePromo').DataTable();
    $('#linkPromo').addClass("active");
  });

  function lihatTransaksi(invoice) {
    window.location.href = `<?= base_url();?>/riwayat/transaksi/${invoice}`;
  }

  function validatePromo(event) {
    var key = event.key;

    if ((key >= 'a' && key <= 'z') || (key >= 'A' && key <= 'Z') || (key >= '0' && key <= '9')) {
      return true;
    } else {
      return false;
    }
  }

  $('#tambahPromo').click(function() {
    $('#modalTambahPromo').modal('show');
  });
</script>
<?= $this->endSection() ?>