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
      <label style="font-size:18px; font-weight:600">Daftar Kategori</label>
      <button type="button" class="btn btn-info text-white" id="daftarKategori" style="float:right;"><i class="fa-solid fa-plus"></i> Tambah</button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div style="overflow-x:auto;">
        <table class="table bg-white rounded-3 border-light-subtle" id="tableKaryawan">
          <thead>
            <tr class="text-white" style="background-color:#04BEB3">
              <th scope="col">Nama</th>
              <th scope="col">Tanggal Tambah</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <tD scope="row">Sayuran</tD>
              <td>20-08-2020</td>
              <td>
                <button type="button" class="btn btn-outline-warning mt-1" onclick="editKategori(1)"><i class="fa-solid fa-pencil"></i></button>
                <button type="button" class="btn btn-outline-danger mt-1" onclick="deleteKategori(1)"><i class="fa-solid fa-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal" id="modalDaftarKategori" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal" id="modalEditKategori" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Kategori [Fetrus]</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="namaEdit" class="form-label">Nama</label>
            <input type="text" class="form-control" id="namaEdit" name="namaEdit" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning"><i class="fa-solid fa-pencil"></i> Update</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {
    $('#linkKategori').addClass("active");
    $('#tableKaryawan').DataTable();
  });

  function deleteKategori(data) {
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

  function editKategori(id) {
    // AJAX

    // END AJAX
    $('#namaEdit').val("Edit Nama");
    $('#modalEditKategori').modal('show');
  };

  $('#daftarKategori').click(function() {
    $('#modalDaftarKategori').modal('show');
  });
</script>
<?= $this->endSection() ?>