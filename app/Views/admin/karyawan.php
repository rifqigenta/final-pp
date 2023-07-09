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
      <label style="font-size:18px; font-weight:600">Daftar Karyawan</label>
      <button type="button" class="btn btn-info text-white" id="tambahKaryawan" style="float:right;"><i class="fa-solid fa-plus"></i> Tambah</button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div style="overflow-x:auto;">
        <table class="table bg-white rounded-3 border-light-subtle" id="tableKaryawan">
          <thead>
            <tr class="text-white" style="background-color:#04BEB3">
              <th scope="col">Role Kode</th>
              <th scope="col">Username</th>
              <th scope="col">Alamat</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($detail as $row) { ?>
              <tr>
                <td scope="row"><?= $row['role_kode']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['email']; ?></td>
                <td>
                  <button type="button" class="btn btn-outline-warning" onclick="editKaryawan(<?= $row['id_kasir']; ?>, '<?= $row['nama']; ?>')"><i class="fa-solid fa-pencil"></i></button>
                  <button type="button" class="btn btn-outline-danger" onclick="deleteKaryawan(<?= $row['id_kasir']; ?>)"><i class="fa-solid fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal" id="modalTambahKaryawan" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('admin/proses/karyawan/tambah') ?>
      <?= csrf_field() ?>
      <div class="modal-body">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Karyawan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal" id="modalEditKaryawan" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleEditModal"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('admin/proses/karyawan/update') ?>
      <?= csrf_field() ?>
      <input type="hidden" name="idUpdate" id="idUpdate" />
      <div class="modal-body">
        <div class="mb-3">
          <label for="namaEditKaryawan" class="form-label">Nama</label>
          <input type="text" class="form-control" id="namaEdit" name="namaEdit" value="<?= old('namaEdit'); ?>" style="border-color:<?= (validation_show_error('namaEdit') != null) ? 'red' : ''; ?>" required>
          <span style="font-size:small; color:red;"><?= validation_show_error('namaEdit'); ?></span>
        </div>
        <div class="mb-3">
          <label for="alamatEditKaryawan" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="alamatEdit" name="alamatEdit" value="<?= old('alamatEdit'); ?>" style="border-color:<?= (validation_show_error('alamatEdit') != null) ? 'red' : ''; ?>" required>
          <span style="font-size:small; color:red;"><?= validation_show_error('alamatEdit'); ?></span>
        </div>
        <div class="mb-3">
          <label for="emailEditKaryawan" class="form-label">Email</label>
          <input type="text" readonly class="form-control" id="emailEdit" name="emailEdit" value="<?= old('emailEdit'); ?>" style="border-color:<?= (validation_show_error('emailEdit') != null) ? 'red' : ''; ?>" required>
        </div>
        <div class="mb-3">
          <label for="passwordEdit" class="form-label">Password</label>
          <input type="password" readonly class="form-control" id="passwordEdit" name="passwordEdit" value="<?= old('passwordEdit'); ?>" required>
          <!-- <div class="form-text">* Isi untuk update password.</div> -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mt-1" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning mt-1"><i class="fa-solid fa-pencil"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>



<script>
  var csrfName = "<?= csrf_token(); ?>";
  var csrfHash = "<?= csrf_hash(); ?>";

  $(document).ready(function() {
    $('#linkKaryawan').addClass("active");
    $('#tableKaryawan').DataTable();
    <?php if (validation_errors() != null) { ?>
      $('#modalTambahKaryawan').modal('show');
    <?php } ?>
    <?php if (validation_errors() != null) { ?>
      $('#modalEditKaryawan').modal('show');
    <?php } ?>
  });

  function deleteKaryawan(id, nama) {
    Swal.fire({
      title: 'Yakin?',
      text: `Data Karyawan ${nama} tidak bisa dikembalikan!`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '/admin/proses/karyawan/update',
          dataType: 'json',
          type: 'POST',
          data: {
            idUpdate: id,
            status: '0',
            [csrfName]: csrfHash,
          },
          success: function(data) {
            if (data == 1) {
              Swal.fire(
                'Berhasil',
                'Kategori Berhasil Dihapus',
                'success',
              );
            } else {
              Swal.fire(
                'Gagal',
                'Silahkan coba lagi',
                'error',
              );
            }
            location.reload();
          },
        });
      }
    });
  } 



  function editKaryawan(id, nama) {
    $('#titleEditModal').html(`Edit Karyawan <i>${nama}</i>`);
    $('#namaEdit').val(nama);
    $('#idUpdate').val(id);
    $('#modalEditKaryawan').modal('show');
  };

  $('#tambahKaryawan').click(function() {
    $('#modalTambahKaryawan').modal('show');
  });
</script>
<?= $this->endSection() ?>