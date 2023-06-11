<div class="container" style="margin-top: 5rem;">
  <div class="row">
    <div class="col-md-12">
      <div class="px-3 py-3 rounded-3 fw-semibold" style="background-color: #98fb98;">Profil Toko</div>
    </div>
  </div>
  <div class="row bg-white px-3 rounded-3" style="padding-top: 15px;">
    <div class="col-md-6 col-xs-12">
      <div class="col-md-12">
        <div style="text-align:center">
          <img src="<?= base_url();?>/assets/img/cabai/cabaihijaubesar.jpg" class="m-3" width="200">
        </div>
      </div>
      <div class="col-md-12">
        <div style="text-align:center">
          <input type="file" id="myFile" name="filename"><br>
          <div class="text-muted" style="font-size:12px;">*Input gambar untuk mengubah gambar utama</div>
        </div>
      </div>
      <div class="col-md-12">
        <table class="table h-3">
          <tbody>
            <tr>
              <td>Selamat datang di "SayurKuy"!, Kami adalah toko yang berdedikasi untuk menyediakan sayuran segar dan sehat untuk memenuhi kebutuhan gizi harian Anda. Dengan komitmen kami terhadap kualitas dan kebersihan, kami menjadi destinasi terpercaya bagi para pecinta sayuran di seluruh kota.</td>
            </tr>
            <tr>
              <td>Jl. Ring Road Utara, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6 col-xs-12">
			<div class="mb-3">
				<label for="namaToko" class="form-label">Nama Toko</label>
				<input type="text" class="form-control" id="namaToko" name="namaToko" placeholder="Nama Toko" required>
			</div>
			<div class="mb-3">
				<label for="alamat" class="form-label">Alamat</label>
				<textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
			</div>
			<div class="mb-3">
				<label for="noWA" class="form-label">Nomor WhatsApp</label>
				<input type="text" class="form-control" id="noWA" name="noWA" required>
			</div>
			<div class="mb-3">
				<label for="deskripsi" class="form-label">Deskripsi Toko</label>
				<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
			</div>
			<div class="mb-3">
				<label for="namaToko" class="form-label">Nama Toko</label>
				<input type="text" class="form-control" id="namaToko" name="namaToko" placeholder="Nama Toko" required>
			</div>
			<button type="submit" class="btn btn-success text-white"><i class="fa-sharp fa-solid fa-pen"></i> Update</button>
    </div>
    <div class="row py-5"></div>
  </div>
</div>

<script>
	$(document).ready(function(){
		$('#linkToko').addClass("active");
	});
</script>
