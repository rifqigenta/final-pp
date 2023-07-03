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
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size:14px">
                Pendapatan Hari ini
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($totalPenjualan['pendapatan']);?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size:14px">
                Total Penjualan (Hari)
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPenjualan['total'];?></div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-chart-simple fa-2x text-grey-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size:14px">
                Total Kasir
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size:14px">
                Total Sayur Tersedia
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sayur;?></div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-leaf fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-sm-12 mt-4">
      <h5 style="padding-left:20px;">Total Transaksi Bulan <?= date('M'); ?></h5>
      <canvas id="myChart" style="width:100%;"></canvas>
    </div>
    <div class="col-md-4 col-sm-12 mt-4">
      <h5>Peringkat Kasir Bulan <?= date('M'); ?></h5>
      <div style="overflow-x:auto;">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama/Id</th>
              <th scope="col">Total Penjualan</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $number=1;
            if ($peringkatKasir){
            foreach ($peringkatKasir as $row) {?>
              <tr>
                <th scope="row"><?= $number++;?></th>
                <td><?= $row["nama"];?></td>
                <td><?= $row["total"];?></td>
              </tr>
            <?php } }else{ ?>
              <tr>
                <td colspan="3" class="text-center">Data Belum Ada</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  const xValues = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30];
  const yValues = [21, 24, 27, 25, 29, 26, 20, 22, 23, 30, 28, 26, 24, 21, 29, 20, 23, 27, 28, 25, 22, 29, 21, 30, 26, 23, 24, 20, 28, 25];

  new Chart("myChart", {
    type: "line",
    data: {
      labels: xValues,
      datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(0,0,255,1.0)",
        borderColor: "rgba(0,0,255,0.1)",
        data: yValues
      }]
    },
    options: {
      legend: {
        display: false
      },
      responsive: true,
      scales: {
        yAxes: [{
          ticks: {
            min: 9,
            max: 40
          }
        }],
      }
    }
  });
</script>
<?= $this->endSection() ?>