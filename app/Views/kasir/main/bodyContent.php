<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?= $title;?></title>
        <!-- Custom fonts for this template-->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <link href="<?= base_url() ?>/newAssets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->

        <!-- SWAL -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        

        <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-8d95b745961f6b33ab3aa1b98a45291a.css?vsn=d" >

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css" >

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css" >

        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">

        <link href="<?= base_url('/newAssets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

        <?= $this->renderSection('styles') ?>
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <?= $this->include('kasir/main/header') ?>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Begin Page Content -->
                    <?= $this->renderSection('content') ?>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('/newAssets/vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('/newAssets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('/newAssets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('/newAssets/js/sb-admin-2.min.js') ?>"></script>
        <script>
          $("#logout").click(function(){
            Swal.fire({
              title: 'Yakin Logout?',
              icon: 'warning',
              confirmButtonColor: "#e74c3c",
              showCancelButton: true,
              confirmButtonText: 'Iya',
              cancelButtonText: 'Tidak'
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                window.location = "/login/logout";
              }
            });
          });
        </script>

        <?= $this->renderSection('scripts') ?>
    </body>
</html>