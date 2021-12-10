<?php
session_start();
require_once 'apps/config/config.php';
// include_once 'auth/setting.php'; 

//  if( !isset($_SESSION["login"])){ // jika tidak ada session login, maka kembalikan ke halaman login
//   header("Location: auth/login.php");
//   exit;
// }


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="dashboard/css/sb-admin.min.css" rel="stylesheet">
    <!-- css eksternal -->
    <link rel="stylesheet" href="dashboard/css/style.css">
    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
  </head>
  <body>

  <body class="fixed-nav sticky-footer bg-dark " id="page-top" >
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" id="judul" href="index.php">SPK</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav bg-dark " id="exampleAccordion">
        <li class="nav-item mt-3" data-bs-toggle="tooltip" data-bs-placement="right" title="home">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="home">
          <a class="nav-link" href="data_kriteria.php">
            <i class="fas fa-fw fa-desktop"></i>
            <span class="nav-link-text">Data Kriteria</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="home">
          <a class="nav-link" href="data_alternatif.php">
          <i class="fas fa-fw fa-desktop"></i>
            <span class="nav-link-text">Data Alternatif</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="home">
          <a class="nav-link" href="perhitungan.php">
          <i class="fas fa-fw fa-hourglass-half"></i>
            <span class="nav-link-text">Perhitungan</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Menu Levels">
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler" data-bs-toggle="collapse">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        
        <li class="nav-item me-3">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#logout">
            <i class="fa fa-fw fa-sign-out-alt"></i>Keluar</a>
        </li>
      </ul>
    </div>
  </nav>
    <div class="content-wrapper" style="background-color: #f2f7ff;">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Home</li>
                </ol>
            </nav>
          
          <section class="banner mt-4" style="height: 450px;">
            <div class="row">
              <div class="col-5 mt-5">
                <img src="assets/img/employee.png" alt="employee" width="450px" style="margin-top: 30px;">
              </div>
                <div class="col-6 text-center" style="color: #525252; ">
                  <h4 style="margin-top:200px; font-size:30px;">Sistem Pendukung Keputusan Pemilihan Pegawai Terbaik Metode WP</h4>
                </div>              
            </div>
          </section>



        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
            <small>Copyright © Kelompok 14 All Right Reserved</small>
            </div>
        </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
            </div>
            <div class="modal-body">Apakah anda yakin ingin keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="auth/logout.php">Keluar</a>
            </div>
            </div>
         </div>
        </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="dashboard/vendor/jquery/jquery.min.js"></script>
      <script src="dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <!-- Custom scripts for all pages-->
      <script src="dashboard/js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="dashboard/js/sb-admin-datatables.min.js"></script>
      <script src="dashboard/js/sb-admin-charts.min.js"></script>

    <!-- <script src="dashboard/js/sb-admin.min.js"></script> -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>