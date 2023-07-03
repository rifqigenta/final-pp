<?= $this->extend('kasir/main/bodyContent') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row mt-5">
    <div class="col table-responsive">
      <table class="table table-bordered mt-2 bg-white">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php $cart = $keranjang; 
          $nomor = 1;?>
          <?php 
          if($cart){
          foreach($cart as $row) {?>
          <tr>
            <td><?= $nomor++;?></td>
            <td scope="row"><?= $row['name']; ?></td>
            <td><?= $row['qty']; ?></td>
            <td>Rp. <?= number_format($row['price']); ?></td>
          </tr>
          <?php } } else{?>
            <tr>
              <td colspan="5" class="text-center">Kosong</td>
            </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3 col-xs-6 mt-2">
      <label for="exampleInputEmail1">Total Bayar</label>
      <input type="text" class="form-control" id="total" value="Rp. <?= number_format($total); ?>" readonly>
    </div>
    <div class="form-group col-md-3 col-xs-6 mt-2">
      <label for="exampleInputEmail1">Bayar</label>
      <input type="number" class="form-control" id="bayar" onkeypress="validasiAngka(event)">
    </div>
    <div class="form-group col-md-3 col-xs-6 mt-2">
      <label for="exampleInputEmail1">Promo</label>
      <input type="text" name="promo" id="promo" class="form-control">
    </div>
    <div class="form-group col-md-3 col-xs-6 mt-2">
      <label for="exampleInputEmail1">Kembalian</label>
      <input type="text" class="form-control" id="kembalian" readonly>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mt-2">
      <button type="button" id="buttonBayar" onclick="buttonPembayaran()" class="btn btn-primary btn-md mb-3" disabled>
        Bayar
      </button>
    </div>
  </div>
</div>
<script>
  var csrfName = "<?= csrf_token(); ?>";
	var csrfHash = "<?= csrf_hash(); ?>";
  $(document).ready(function(){
    $('#linkPembayaran').addClass("active");

    $('#bayar').on('input', function() {
      var total = $('#total').val()
      total = total.replace(/\D/g, '');
      var bayar = parseFloat($(this).val());
      if (!isNaN(total) && !isNaN(bayar)) {
        var kembalian = bayar - total;
        $('#kembalian').val(kembalian.toFixed(2));
      }
      if(bayar>=total){
        $('#buttonBayar').attr("disabled",false);
      }else{
        $('#buttonBayar').attr("disabled",true);
      }
    });
  });

  function buttonPembayaran() {
    Swal.fire({
      title: 'Yakin ingin melakukan transaksi ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
					url: '/kasir/checkout',
					dataType: 'json',
					type: 'POST',
					data: {
						[csrfName]: csrfHash,
					},
					success: function(data){
						if(data==1){
							Swal.fire(
								'Berhasil',
								'Transaksi Berhasil',
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
    })
  }
  </script>
<?= $this->endSection() ?>
