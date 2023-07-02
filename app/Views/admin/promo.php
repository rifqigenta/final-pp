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
            <?php foreach ($detail as $row) {?>
              <tr>
                <td scope="row"><?= $row['nama'];?></td>
                <td><?= $row['kode_promo'];?></td>
                <td><?= $row['tgl_dibuat'];?></td>
                <td><?= $row['tgl_berakhir'];?></td>
                <td><?= $row['potongan_persen'];?>%</td>
                <td><?= $row['minimum_pembelian'];?></td>
                <td><?= $row['kuota'];?></td>
                <td>[20]</td>
                <td>
                  <!-- <button title="Lihat Transaksi yang Menggunakan Promo" type="button" class="btn btn-outline-success mt-1" onclick="lihatTransaksi('<?= $row['kode_promo'];?>')"><i class="fa-solid fa-eye"></i></button> -->
                  <button title="Hapus Promo" type="button" class="btn btn-outline-danger mt-1" onclick="deletePromo(<?= $row['id_promo'];?>, '<?= $row['kode_promo'];?>')"><i class="fa-solid fa-trash"></i></button>
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
<div class="modal" id="modalTambahPromo" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Promo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('admin/proses/promo/tambah') ?>
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>" required style="border-color:<?= (validation_show_error('nama')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('nama');?></span>
          </div>
          <div class="mb-3">
            <label for="kodePromo" class="form-label">Kode Promo</label>
            <input type="text" class="form-control" id="kodePromo" name="kodePromo" value="<?= old('kodePromo'); ?>" onkeydown="return validatePromo(event)" required style="border-color:<?= (validation_show_error('kodePromo')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('kodePromo');?></span>
            <div id="kodePromo" class="form-text">*Hanya huruf dan angka (min 8 karakter).</div>
          </div>
          <div class="mb-3">
            <label for="tanggalBerakhir" class="form-label">Tanggal Berakhir</label>
            <input type="date" class="form-control" id="tanggalBerakhir" name="tanggalBerakhir" value="<?= old('tanggalBerakhir'); ?>" required style="border-color:<?= (validation_show_error('tanggalBerakhir')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('tanggalBerakhir');?></span>
          </div>
          <div class="mb-3">
            <label for="potongan" class="form-label">Potongan (Dalam Persen)</label>
            <input type="number" min="1" max="100" class="form-control" id="potongan" name="potongan" value="<?= old('potongan'); ?>" required style="border-color:<?= (validation_show_error('potongan')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('potongan');?></span>
          </div>
          <div class="mb-3">
            <label for="minimalPembelian" class="form-label">Minimal Pembelian</label>
            <input type="number" min="0" class="form-control" id="minimalPembelian" name="minimalPembelian" value="<?= old('minimalPembelian'); ?>" required style="border-color:<?= (validation_show_error('minimalPembelian')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('minimalPembelian');?></span>
          </div>
          <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="number" min="1" class="form-control" id="kuota" name="kuota" value="<?= old('kuota'); ?>" required style="border-color:<?= (validation_show_error('kuota')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('kuota');?></span>
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
  var csrfName = "<?= csrf_token(); ?>";
	var csrfHash = "<?= csrf_hash(); ?>";

  $(document).ready(function() {
    $('#tablePromo').DataTable();
    $('#linkPromo').addClass("active");
    <?php if(validation_errors()!=null){?>
      $('#modalTambahPromo').modal('show');
    <?php }?>
  });

  function deletePromo(id, kode) {
    Swal.fire({
      title: 'Yakin Hapus?',
      text: `Promo ${kode} tidak bisa dikembalikan!`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
					url: '/admin/proses/promo/update',
					dataType: 'json',
					type: 'POST',
					data: {
						idUpdate: id,
            status: '2',
						[csrfName]: csrfHash,
					},
					success: function(data){
						if(data==1){
							Swal.fire(
								'Berhasil',
								'Promo Berhasil Dihapus',
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