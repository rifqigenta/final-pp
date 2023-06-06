<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $title;?></title>
		<!-- CSS & JS -->
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="/assets/js/bootstrap.bundle.min.js"></script>
  </head>
  <!-- <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    @media (prefers-reduced-motion: no-preference) {
      :root {
        scroll-behavior: smooth;
      }
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;;
      text-align: inherit;
      background-color: #fff;
      -webkit-text-size-adjust: 100%;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }


    #wrapper {
      overflow-x: hidden;
    }
    #sidebar-wrapper {
      min-height: 100vh;
      margin-left: -15rem;
      transition: margin 0.25s ease-out;
    }

    #sidebar-wrapper .sidebar-heading {
      padding: 0.875rem 1.25rem;
      font-size: 1.2rem;
    }

    #sidebar-wrapper .list-group {
      width: 15rem;
    }

    #page-content-wrapper {
      min-width: 100vw;
    }

    body.sb-sidenav-toggled #wrapper #sidebar-wrapper {
      margin-left: 0;
    }

    @media (min-width: 768px) {
      #sidebar-wrapper {
        margin-left: 0;
      }
      #page-content-wrapper {
        min-width: 0;
        width: 100%;
      }
      body.sb-sidenav-toggled #wrapper #sidebar-wrapper {
        margin-left: -15rem;
      }
    }
  </style> -->
</head>
<body>
  <div style="margin-top: 20px;">
    <div class="container-fluid p-5" style="background-color:#F0F0F0; margin:auto;">
        <div class="row">
            <div class="col-5 fw-semibold mt-3" style="line-height: 4; ">
                <form class="d-flex" role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"/>
                    <button class="btn btn-outline-success ms-5" type="submit">Search</button>
                </form>
            </div>
        </div> 
        <div class="row">
          <div class="col-2 mt-4">Tanggal 
            <input type="date" name="tanggal" class="mt-2" style="width: 15rem;">
         </div>
         
         <div class="table-responsive"> 
          <table class="table table-bordered col-2 mt-2 bg-light">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Diskon</th>
                  <th>Harga</th>
              </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>Brokoli</td>
                      <td>100 gr</td>
                      <td>-</td>
                      <td>3000</td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>Kangkung</td>
                      <td>2</td>
                      <td>-</td>
                      <td>6000</td>
                  </tr>       
                  <tr>
                      <td>2</td>
                      <td>Kangkung</td>
                      <td>2</td>
                      <td>-</td>
                      <td>6000</td>
                  </tr>       
                  <tr>
                      <td>2</td>
                      <td>Kangkung</td>
                      <td>2</td>
                      <td>-</td>
                      <td>6000</td>
                  </tr>       
                  <tr>
                      <td>2</td>
                      <td>Kangkung</td>
                      <td>2</td>
                      <td>-</td>
                      <td>6000</td>
                  </tr>       
              </tbody>
          </table>
        </div>
        <div class="row">
            <div class="input-group m-2" style="width: 20rem;">
              <span class="input-group-text" id="floatingInputGroup1">Total</span>
              <input type="text" class="form-control" id="floatingInputGroup1"/>
            </div>
            <tr>
              <div class="input-group m-2" style="width: 20rem;">
                <span class="input-group-text" id="floatingInputGroup1">Bayar</span>
                <input type="text" class="form-control" id="floatingInputGroup1"/>
              </div>
            </tr>
            <tr>
              <button type="button" class="btn btn-primary btn-lg m-2" style="width: 8rem;">
                 Bayar
              </button>
            </tr>
        </div>
        <div class="row">
          <div class="input-group m-2 " style="width: 20rem;">
            <span class="input-group-text" id="floatingInputGroup1">Kembalian</span>
            <input type="text" class="form-control" id="floatingInputGroup1"/>
          </div>
          <tr>
            <button type="button" class="btn btn-success btn-lg mb-3" style="width: 12rem; margin-left: 345px;">
               Cetak Laporan
            </button>
          </tr>
        </div>
        </div>
      </div>
    </div>
</body>
</html> 