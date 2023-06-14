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
    <div class="col-md-12 col-xs-12">
      <label style="font-size:18px; font-weight:600">Daftar Produk</label>
      <button type="button" class="btn btn-primary" style="float: right;" onclick="tambahProduk()"><i class="fa-solid fa-plus"></i> Tambah</button>
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
      <select class="form-select" name="filterKategori" id="filterKategori">
        <option selected>Pilih Kategori</option>
        <option value="1">Sayuran</option>
        <option value="2">Umbi</option>
      </select>
    </div>
    <div class="col-md-3 col-xs-12 mb-3">
      <select class="form-select" name="filterTerlaris" id="filterTerlaris">
        <option selected>Sort By</option>
        <option value="1">Terlaris</option>
        <option value="2">Sedikit</option>
      </select>
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
              <th scope="col">Kode Produk</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Kuantitas</th>
              <th scope="col">Harga</th>
              <th scope="col">Gambar</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">KD-BRG1</td>
              <td>Bayam</td>
              <td>10</td>
              <td>Rp. 10.000</td>
              <td>
                <button type="button" class="btn btn-success" onclick="lihatGambar('Nama Gambar', 'url')"><i class="fa-solid fa-eye"></i> Gambar</button>
              </td>
              <td>
                <button type="button" class="btn btn-outline-warning mt-1" onclick="editProduk(123456, 'Sayuran')"><i class="fa-solid fa-pencil"></i></button>
                <button type="button" class="btn btn-outline-danger mt-1" onclick="deleteProduk(123456)"><i class="fa-solid fa-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-12 col-xs-12">
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

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" min="1" class="form-control" id="harga" name="harga" required>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg, .jpeg, .png" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Tambah</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditProduk"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <div class="modal-body">
          <div class="mb-3">
            <label for="editNama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="editNama" name="editNama" required>
          </div>
          <div class="mb-3">
            <label for="editHarga" class="form-label">Harga</label>
            <input type="number" min="1" class="form-control" id="editHarga" name="editHarga" required>
          </div>
          <div class="mb-3">
            <label for="editGambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="editGambar" name="editGambar" accept=".jpg, .jpeg, .png" required>
            <div class="form-text" style="font-size:10px;">*Upload gambar untuk update.</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning text-white" data-bs-dismiss="modal"><i class="fa-solid fa-pencil"></i> Edit</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Gambar -->
<div class="modal fade" id="modalGambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="titleModalGambar"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>

<script>
  // Lihat Gambar
  function lihatGambar(nama, gambar) {
    $('#titleModalGambar').html(`Gambar ${nama}`);
    $('#modalGambar').modal('show');
  }

  // Model Edit
  function editProduk(id, nama) {
    // AJAX

    // END AJAX

    $('#modalEditProduk').html(`Edit Produk ${nama}`)
    $('#modalEdit').modal('show');
  }

  // Model Tambah
  function tambahProduk() {
    $('#modalTambah').modal('show');
  }

  // Delete Produk
  function deleteProduk(id) {
    Swal.fire({
      title: 'Yakin?',
      text: "Data tidak bisa dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    });
  }

  $(document).ready(function() {
    $('#linkProduk').addClass("active");
  });
</script>
<?= $this->endSection() ?>