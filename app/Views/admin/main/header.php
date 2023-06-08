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
		<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

		<!-- Datatable -->
		<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>

		<!-- SWAL -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>
	<body>
		<header>
			<nav class="navbar fixed-top" style="background-color: #98fb98;">
				<div class="container-fluid">
          <button class="navbar-toggler" style="border: unset;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: #FFFFFF;"></span>
          </button>
					<a class="navbar-brand" style="color: black; font-weight: bold;" href="<?= base_url();?>">Sayur Kuy</a>
					<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color: #98fb98;">
						<div class="offcanvas-header">
							<h5 class="offcanvas-title" style="font-weight: bold;" id="offcanvasNavbarLabel">USER #</h5>
							<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body">
							<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
									<a class="nav-link" id="linkLaporan" href="/admin/laporan"><i class="fa-solid fa-book"></i> Laporan</a>
								</li>
                                <li class="nav-item">
									<a class="nav-link" id="linkProduk" href="/admin/produk"><i class="fa-sharp fa-solid fa-leaf"></i> Produk</a>
								</li>
                                <li class="nav-item">
									<a class="nav-link" id="linkKaryawan" href="/admin/karyawan"><i class="fa-solid fa-users"></i> Karyawan</a>
								</li>
                                <li class="nav-item">
									<a class="nav-link" id="linkToko" href="/admin/info-toko"><i class="fa-solid fa-store"></i> Info Toko</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</header>
