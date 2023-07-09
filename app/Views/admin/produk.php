<?= $this->extend('admin/main/bodyContent') ?>
<?= $this->section('content') ?>
<?php 

  // Filter Cari
	$cari = explode("=", service('uri')->getQuery(['only' => ['q']]));
	if(isset($cari[1])){
		$cari = $cari[1];
	}else{
		$cari	= null;
	}

  // Filter Kategori
	$idKategori = explode("=", service('uri')->getQuery(['only' => ['idKategori']]));
  if(isset($idKategori[1])){
		$idKategori = $idKategori[1];
	}else{
		$idKategori	= null;
	}

  // Filter Kategori
  $terlaris = explode("=", service('uri')->getQuery(['only' => ['terlaris']]));
  if(isset($terlaris[1])){
		$terlaris = $terlaris[1];
	}else{
		$terlaris	= null;
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
    <div class="col-md-12 col-xs-12">
      <label style="font-size:18px; font-weight:600">Daftar Produk</label>
      <button type="button" class="btn btn-primary" style="float: right;" onclick="tambahProduk()"><i class="fa-solid fa-plus"></i> Tambah</button>
    </div>
  </div>
  <form action="/admin/produk" method="GET">
  <div class="row">
    <div class="col-md-12">
      <label for="basic-url" class="form-label">Filter</label>
    </div>
      <div class="col-md-4 col-xs-12 mb-3">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari..." name="q" id="q" value="<?= $cari;?>">
        </div>
      </div>
      <div class="col-md-3 col-xs-12 mb-3">
        <select class="form-select" name="idKategori" id="idKategori">
          <option value="">Pilih Kategori</option>
          <?php foreach ($kategori as $row) {?>
            <option <?= ($idKategori==$row['id_kategori'])?"selected": "";?> value="<?= $row['id_kategori'];?>"><?= $row['nama_kategori'];?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-md-3 col-xs-12 mb-3">
        <select class="form-select" name="terlaris" id="terlaris">
          <option selected value="">Sort By</option>
          <option <?= ($terlaris=="0")?"selected": "";?> value="0">Sedikit</option>
          <option <?= ($terlaris=="1")?"selected": "";?> value="1">Terlaris</option>
        </select>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
      </div>
  </div>
  </form>

  <br>
  <div class="row">
    <div class="col-md-12">
      <div style="overflow-x:auto;">
        <table class="table bg-white rounded-3">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Produk</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Kuantitas</th>
              <th scope="col">Harga</th>
              <th scope="col">Gambar</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($produk as $row) {?>
              <tr>
                <td><?= $nomor++;?></td>
                <td scope="row">KD-BRG<?= $row['id_produk'];?></td>
                <td><?= $row['nama'];?></td>
                <td><?= $row['kuantitas'];?></td>
                <td>Rp. <?= number_format($row['harga']);?></td>
                <td>
                  <button type="button" class="btn btn-sm btn-success" onclick="lihatGambar('<?= $row['nama'];?>', '<?= $row['gambar'];?>')"><i class="fa-solid fa-eye"></i> Gambar</button>
                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-outline-warning mt-1" onclick="editProduk(<?= $row['id_produk'];?>, '<?= $row['nama'];?>', '<?= $row['id_kategori'];?>', '<?= $row['harga'];?>')"><i class="fa-solid fa-pencil"></i></button>
                  <button type="button" class="btn btn-sm btn-outline-danger mt-1" onclick="deleteProduk(<?= $row['id_produk'];?>, '<?= $row['nama'];?>')"><i class="fa-solid fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-12 col-xs-12">
      <?= $pager->links("produk", "custom_pagination"); ?>
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
      <?= form_open_multipart('admin/proses/produk/tambah') ?>
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>" required style="border-color:<?= (validation_show_error('nama')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('nama');?></span>
          </div>
          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select form-select" aria-label=".form-select-sm example" name="kategori" id="kategori" required style="border-color:<?= (validation_show_error('kategori')!=null)?'red':'';?>">
              <option selected>Pilih Kategori</option>
              <?php foreach($kategori as $row){?>
                <option value="<?= $row['id_kategori'];?>"><?= $row['nama_kategori'];?></option>
              <?php } ?>
            </select>
            <span style="font-size:small; color:red;"><?= validation_show_error('kategori');?></span>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" min="1" onkeypress="validasiAngka(event)" class="form-control" id="harga" name="harga" value="<?= old('harga'); ?>" required style="border-color:<?= (validation_show_error('harga')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('harga');?></span>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg, .jpeg, .png" required style="border-color:<?= (validation_show_error('gambar')!=null)?'red':'';?>">
            <span style="font-size:small; color:red;"><?= validation_show_error('gambar');?></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</button>
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
      <?= form_open_multipart('admin/proses/produk/update') ?>
        <?= csrf_field() ?>
        <input type="hidden" id="idUpdate" name="idUpdate" required/>
        <div class="modal-body">
          <div class="mb-3">
            <label for="editNama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="editNama" name="editNama" required>
            <span style="font-size:small; color:red;"><?= validation_show_error('editNama');?></span>
          </div>
          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select form-select" aria-label=".form-select-sm example" name="editKategori" id="editKategori" required style="border-color:<?= (validation_show_error('editKategori')!=null)?'red':'';?>">
              <option selected>Pilih Kategori</option>
              <?php foreach($kategori as $row){?>
                <option value="<?= $row['id_kategori'];?>"><?= $row['nama_kategori'];?></option>
              <?php } ?>
            </select>
            <span style="font-size:small; color:red;"><?= validation_show_error('editKategori');?></span>
          </div>
          <div class="mb-3">
            <label for="editHarga" class="form-label">Harga</label>
            <input type="number" min="1" class="form-control" id="editHarga" name="editHarga" onkeypress="validasiAngka(event)" required>
            <span style="font-size:small; color:red;"><?= validation_show_error('editHarga');?></span>
          </div>
          <div class="mb-3">
            <label for="editGambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="editGambar" name="editGambar" accept=".jpg, .jpeg, .png">
            <span style="font-size:small; color:red;"><?= validation_show_error('editGambar');?></span>
            <div class="form-text" style="font-size:10px;">*Upload gambar untuk update.</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning text-white"><i class="fa-solid fa-pencil"></i> Edit</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  var csrfName = "<?= csrf_token(); ?>";
	var csrfHash = "<?= csrf_hash(); ?>";

  // Lihat Gambar
  function lihatGambar(nama, gambar) {
    Swal.fire({
      title: `Gambar ${nama}`,
      imageUrl: `<?= base_url();?>gambar/produk/${gambar}`,
      imageWidth: 400,
      imageHeight: 200,
      imageAlt: `${nama}`,
    })
  }

  // Model Edit
  function editProduk(id, nama, kategori, harga) {
    $('#idUpdate').val(id);
    $('#editNama').val(nama);
    $('#editKategori').val(kategori);
    $('#editHarga').val(harga);
    $('#modalEditProduk').html(`Edit Barang KDG-BRG${id}`)
    $('#modalEdit').modal('show');
  }

  // Model Tambah
  function tambahProduk() {
    $('#modalTambah').modal('show');
  }

  // Delete Produk
  function deleteProduk(id, nama) {
    Swal.fire({
      title: `Yakin Hapus KD-BRG${id}?`,
      text: `Produk ${nama} tidak bisa dikembalikan!`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {

        $.ajax({
					url: '/admin/proses/produk/update',
					dataType: 'json',
					type: 'POST',
					data: {
						idUpdate: id,
            status: "0",
						[csrfName]: csrfHash,
					},
					success: function(data){
						if(data==1){
							Swal.fire(
								'Berhasil',
								'Produk Berhasil Dihapus',
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
				})
      }
    })
  }

  $(document).ready(function() {
    $('#linkProduk').addClass("active");
  });
</script>
<?= $this->endSection() ?>