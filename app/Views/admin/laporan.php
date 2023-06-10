<div class="container" style="margin-top: 5rem;">
  <div class="row">
    <div class="col-md-12">
      <label style="font-size:18px; font-weight:600">Daftar Laporan</label>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-xs-6 btn-group mt-4">
      <button onclick="pindahLaman('penjualan')" type="button" class="btn text-white" style="height:150px; padding:20px; background-color:#bdc3c7; opacity:0.7;" title="Laporan Penjualan">
        <i class="fa-solid fa-chart-pie fa-2xl"></i><br><label>Laporan Penjualan</label>
      </button>
    </div>
    <div class="col-md-6 col-xs-6 btn-group mt-4">
      <button onclick="pindahLaman('stok')" type="button" class="btn text-white" style="height:150px; padding:20px; background-color:#bdc3c7; opacity:0.7;" title="Laporan Stock">
      <i class="fa-solid fa-warehouse fa-2xl"></i></i><br><label>Laporan Stock</label>
      </button>
    </div>
  </div>
</div>

<script>
  // Pindah Stock
  function pindahLaman(pindah) {
    window.location.href = `<?= base_url();?>admin/laporan/${pindah}`;
  }


  $(document).ready(function(){
	  $('#linkLaporan').addClass("active");
  });
</script>