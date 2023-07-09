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
            <?php foreach($detail as $row){?>
              <tr>
                <td scope="row"><?= $row['nama_kategori'];?></td>
                <td><?= $row['tgl_tambah'];?></td>
                <td>
                  <button type="button" class="btn btn-outline-warning mt-1" onclick="editKategori(<?= $row['id_kategori'];?>, '<?= $row['nama_kategori'];?>')"><i class="fa-solid fa-pencil"></i></button>
                  <button type="button" class="btn btn-outline-danger mt-1" onclick="deleteKategori(<?= $row['id_kategori'];?>, '<?= $row['nama_kategori'];?>')"><i class="fa-solid fa-trash"></i></button>
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
<div class="modal" id="modalTambahKategori" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kategori </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('admin/proses/kategori/tambah') ?>
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="<?= old('kategori'); ?>" style="border-color:<?= (validation_show_error('kategori')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('kategori');?></span>
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
        <h5 class="modal-title" id="titleEditModal"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('admin/proses/kategori/update') ?>
        <?= csrf_field() ?>
        <input type="hidden" name="idUpdate" id="idUpdate"/>
        <div class="modal-body">
          <div class="mb-3">
            <label for="kategoriEdit" class="form-label">Nama</label>
            <input type="text" class="form-control" id="kategoriEdit" name="kategoriEdit" value="<?= old('kategoriEdit');?>" style="border-color:<?= (validation_show_error('kategoriEdit')!=null)?'red':'';?>" required>
            <span style="font-size:small; color:red;"><?= validation_show_error('kategoriEdit');?></span>
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
  var csrfName = "<?= csrf_token(); ?>";
	var csrfHash = "<?= csrf_hash(); ?>";

  $(document).ready(function() {
    $('#linkKategori').addClass("active");
    $('#tableKaryawan').DataTable();
    <?php if(validation_show_error('kategori')!=null){?>
      $('#modalTambahKategori').modal('show');
    <?php }?>
    <?php if(validation_show_error('kategoriEdit')!=null){?>
      $('#modalEditKategori').modal('show');
    <?php }?>
  });

  function deleteKategori(id, nama) {
    Swal.fire({
      title: 'Yakin?',
      text: `Kategori ${nama} tidak bisa dikembalikan!`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
					url: '/admin/proses/kategori/update',
					dataType: 'json',
					type: 'POST',
					data: {
						idUpdate: id,
            status: '0',
						[csrfName]: csrfHash,
					},
					success: function(data){
						if(data==1){
							Swal.fire(
								'Berhasil',
								'Kategori Berhasil Dihapus',
								'success',
							);
						}else{
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

  function editKategori(id, nama) {
    $('#titleEditModal').html(`Edit Kategori <i>${nama}</i>`)
    $('#kategoriEdit').val(nama);
    $('#idUpdate').val(id);
    $('#modalEditKategori').modal('show');
  };

  $('#daftarKategori').click(function() {
    $('#modalTambahKategori').modal('show');
  });
</script>
<?= $this->endSection() ?>