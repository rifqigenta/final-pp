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
  <div class="row mb-3">
    <div class="input-group col-5">
      <span class="input-group-text" id="inputGroup-sizing-lg">Total</span>
      <input type="text" class="form-control" aria-describedby="inputGroup-sizing-lg" id="total" value="<?= $total; ?>" readonly>
    </div>
    <div class="input-group col-5">
      <span class="input-group-text" id="inputGroup-sizing-lg">Bayar</span>
      <input type="text" class="form-control" aria-describedby="inputGroup-sizing-lg" id="bayar">
    </div>
  </div>
  <div class="row mb-3">
    <div class="input-group col-5">
      <span class="input-group-text" id="inputGroup-sizing-lg">Kembalian</span>
      <input type="text" class="form-control" aria-describedby="inputGroup-sizing-lg" id="kembalian" readonly>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <button type="button" onclick="buttonPembayaran()" class="btn btn-primary btn-md mb-3">
        Bayar
      </button>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('#linkPembayaran').addClass("active");

    $('#bayar').on('input', function() {
      var total = parseFloat($('#total').val());
      var bayar = parseFloat($(this).val());

      if (!isNaN(total) && !isNaN(bayar)) {
        var kembalian = bayar - total;
        $('#kembalian').val(kembalian.toFixed(2));
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
        url: '/kasir/pembayaran/bayar',
        location.reload(); 
        // $.ajax({
          // dataType: 'json',
          // type: 'POST',
          // location.reload();
          // data: {
          //   idUpdate: id,
          //   status: '0',
          //   [csrfName]: csrfHash,
          // },
          // success: function(data) {
          //   if (data == 1) {
          //     Swal.fire(
          //       'Berhasil',
          //       'Kategori Berhasil Dihapus',
          //       'success',
          //     );
          //   } else {
          //     Swal.fire(
          //       'Gagal',
          //       'Silahkan coba lagi',
          //       'error',
          //     );
          //   }
          
          }
        });
      }
</script>
<?= $this->endSection() ?>
