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
									<a class="nav-link active" aria-current="page" href="/kasir/menu_utama">Menu Utama</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="kasir/pembayaran">Pembayaran</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</header>
