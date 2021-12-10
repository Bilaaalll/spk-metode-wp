<?php 

// session_start();
// if( !isset($_SESSION["login"])){ // jika tidak ada session login, maka kembalikan ke halaman login
//   header("Location: auth/login.php");
//   exit;
// }
include_once 'apps/config/config.php';


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
    <!-- Page level plugin CSS-->
    <!-- <link href="dashboard/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->
    <!-- Custom styles for this template-->
    <link href="dashboard/css/sb-admin.min.css" rel="stylesheet">
    <!-- css eksternal -->
    <link rel="stylesheet" href="dashboard/css/style.css">
    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- cdn font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sistem Pendukung Keputusan</title>
  </head>
  <body>

  <body class="fixed-nav sticky-footer bg-dark " id="page-top" >
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" id="judul" href="dashboard/index.html">SPK</a>
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
                <!-- <i class="fa fa-fw fa-dekstop"></i> -->
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
        <!-- <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Laporan">
          <a class="nav-link nav-link-collapse collapsed" data-bs-toggle="collapse" href="#collapseLaporan" data-bs-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
          <ul class="sidenav-second-level collapse bg-dark" id="collapseLaporan">
            <li>
              <a href="#" class="text-decoration-none">Laporan Penilaian</a>
            </li>
          </ul>
        </li> -->
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
        
        <li class="nav-item me-3  ">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#logout">
            <i class="fa fa-fw fa-sign-out-alt"></i>Keluar</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper " style="background-color: #f2f7ff;">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Perhitungan</li>
            </ol>
        </nav>
        
                
        <div class="card" style="border-radius: 20px; border:none; padding-bottom:20px;">
            <!-- <h6 class="card-header bg-primary text-white">Perhitungan</h6> -->
            <div class="row ms-3 mt-3" style="color:#525252;">
              <h4>Perhitungan</h4>      
            </div>
          <div class="card-body mt-3">
                

            <!-- function -->

            <?php 

                function jml_kriteria(){
                    include_once 'apps/config/config.php';
                    global $conn;
                    $kriteria = $conn->query("SELECT * FROM tbl_kriteria ");
                    return $kriteria->num_rows;
                }
                function jml_alternatif(){
                    include_once 'apps/config/config.php';
                    global $conn;
                    $alternatif = $conn->query("SELECT * FROM tbl_alternatif ");
                    return $alternatif->num_rows;
                }
                function getBobot(){
                    include_once 'apps/config/config.php';
                    global $conn;
                    $bobot = $conn->query("SELECT * FROM tbl_kriteria ");
                    if(!$bobot){
                        echo $conn->connect_errno." - ".$conn->connect_error;
					        	exit();
                    }
                    $i=0;
                    while ($row = $bobot->fetch_assoc()) {
                        @$bbt[$i] = $row["bobot"];
                        $i++;
                    }
                    return $bbt;
                }

                function getStatus(){
                    include_once 'apps/config/config.php';
                    global $conn;
                    $status = $conn->query("SELECT * FROM tbl_kriteria ");
                    if(!$status){
                        echo $conn->connect_errno." - ".$conn->connect_error;
                        exit();
                    }
                    $i=0;
                    while ($row = $status->fetch_assoc()) {
                        @$stts[$i] = $row["stts"];
                        $i++;
                    }
                    return $stts;
                }

                function getNamaAlternatif(){
                    include_once 'apps/config/config.php';
                    global $conn;
                    $alternatif = $conn->query("SELECT * FROM tbl_alternatif ");
                    if(!$alternatif){
                        echo $conn->connect_errno." - ".$conn->connect_error;
                        exit();
                    }
                    $i=0;
                    while ($row = $alternatif->fetch_assoc()) {
                        @$alt[$i] = $row["alternatif"];
                        $i++;
                    }
                    return $alt; //perubahan 2
                }

                function getAlternatif(){
                    include_once 'apps/config/config.php';
                    global $conn;
                    $alternatif = $conn->query("SELECT * FROM tbl_alternatif ");
                    if(!$alternatif){
                        echo $conn->connect_errno." - ".$conn->connect_error;
                        exit();
                    }
                    $i=0;
                    while ($row = $alternatif->fetch_assoc()) {
                        @$alt[$i][0] = $row["k1"];
                        @$alt[$i][1] = $row["k2"];
                        @$alt[$i][2] = $row["k3"];
                        @$alt[$i][3] = $row["k4"];
                        @$alt[$i][4] = $row["k5"];
                        $i++;
                    }
                    return $alt;  // perubahan 1
                }

                function cmp($a, $b){
                    if ($a == $b) {
                        return 0;
                    }
                    return ($a < $b) ? -1 : 1;
                }

                function print_ar(array $x){	//just for print array
                    echo "<pre>";
                    print_r($x);
                    echo "</pre></br>";
                }
            ?>

            <?php 
                $alt = getAlternatif();
                $namaAlternatif = getNamaAlternatif();
                end($namaAlternatif);
                $arl2 = key($namaAlternatif)+1;
                $bobot = getBobot();
                $status = getStatus();
                $jmlh_krit = jml_kriteria();
                $jmlh_alt = jml_alternatif();
                $nbbt = 0;
                $nbkep = 0;
            
            

            // Awal Matriks Alternatif - Kriteria
                echo '<h6 class="text-center fw-bold">Matriks Alternatif - Kriteria</h6>';
                echo "<table class='table table-striped table-bordered table-hover'>";
                    echo "<thead><tr><th> Alternatif / Kriteria</th> <th>C1</th> <th>C2</th> <th>C3</th> <th>C4</th> <th>C5</th> </tr> </thead>";
                    for($i=0;$i<$jmlh_alt;$i++){

                        echo "<tr><td><b>A".($i+1)."</b></td>";

                        for($j=0;$j<$jmlh_krit;$j++){

                            echo "<td>".$alt[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                echo "</table><hr>";
            // Akhir Matriks Alternatif - Kriteria


            // Awal Perhitungan bobot
              echo '<h6 class="text-center fw-bold mt-5">Perhitungan Bobot Kepentingan</h6>';
              echo "<table class='table table-striped table-bordered table-hover'>";
              echo "<thead><tr><th></th><th>C1</th><th>C2</th><th>C3</th><th>C4</th><th>C5</th><th>Jumlah</th></tr></thead>";
              echo "<tr><td><b>Kepentingan</b></td>";
              for($i=0;$i<$jmlh_krit;$i++){
                $nbbt = $nbbt + $bobot[$i];
                echo "<td>".$bobot[$i]."</td>";
              }
              echo "<td>".$nbbt."</td></tr>";
              echo "<tr><td><b>Bobot Kepentingan</b></td>";
              for($i=0;$i<$jmlh_krit;$i++){
                $bobot_kep[$i] = ($bobot[$i]/$nbbt);
                $nbkep = $nbkep + $bobot_kep[$i];
                echo "<td>".round($bobot_kep[$i],4)."</td>";
              }
              echo "<td>".$nbkep."</td></tr>";
              echo "</table><hr>";
            // akhir Perhitungan bobot


            // Awal Perhitungan Wj / hitung pangkat
            echo '<h6 class="text-center fw-bold mt-5">Perhitungan Pangkat (W)</h6>';
            echo "<table class='table table-striped table-bordered table-hover'>";
            echo "<thead><tr><th></th><th>C1</th><th>C2</th><th>C3</th><th>C4</th><th>C5</th></tr></thead>";
              echo "<tr><td><b>Status</b></td>";
              for($i=0;$i<$jmlh_krit;$i++){
                echo "<td>".($status[$i])."</td>";
              }
              echo "</tr>";
              echo "<tr><td><b>Pangkat</b></td>";
              for($i=0;$i<$jmlh_krit;$i++){
                if($status[$i]=="Cost"){
                  $pangkat[$i] = (-1) * $bobot_kep[$i];
                  echo "<td>".round($pangkat[$i],4)."</td>";
                }
                else{
                  $pangkat[$i] = $bobot_kep[$i];
                  echo "<td>".round($pangkat[$i],4)."</td>";
                }
              }
              echo "</tr>";
            echo "</table><hr>";



            // Perhitungan vektor S
            echo '<h6 class="text-center fw-bold mt-5">Perhitungan Vektor S </h6>';
            echo "<table class='table table-striped table-bordered table-hover'>";
            echo "<thead><tr><th>Alternatif</th><th>S</th></tr></thead>";
            
            for($i=0;$i<$jmlh_alt;$i++){
              echo "<tr><td><b>A".($i+1)."</b></td>";
              for($j=0;$j<$jmlh_krit;$j++){
                $s[$i][$j] = pow(($alt[$i][$j]),$pangkat[$j]);
              }
              $ss[$i] = $s[$i][0] * $s[$i][1] * $s[$i][2] * $s[$i][3]*$s[$i][4];
              // rsort($ss);
              echo "<td>".round($ss[$i],4)."</td></tr>";
            }
            echo "</table><hr>";
            // akhir perhitungan vektor s



            // Awal perhitungan V
            echo '<h6 class="text-center fw-bold mt-5">Perhitungan V </h6>';
            echo "<table class='table table-striped table-bordered table-hover'>";
            echo "<thead><tr><th>Alternatif</th><th>V</th></tr></thead>";
            $total = 0;
            for($i=0;$i<$jmlh_alt;$i++){
              $total = $total + $ss[$i];
            }
            for($i=0;$i<$jmlh_alt;$i++){
              echo "<tr><td><b>".$namaAlternatif[$i]."</b></td>";
              $v[$i] = round($ss[$i]/$total,4);
              echo "<td>".$v[$i]."</td></tr>";
            }
            echo "</table><hr>";
            uasort($v,'cmp');
            // Akhir perhitungan V


            
            ?>

        
              <?php 
              
              for($i=0;$i<$arl2;$i++){ //new for 8 lines below
                if($i==0)
                  echo "<div class='alert alert-dismissible alert-success'><b><i>Dari tabel tersebut dapat disimpulkan bahwa ".$namaAlternatif[array_search((end($v)), $v)]." mempunyai hasil paling tinggi, yaitu ".current($v);
                elseif($i==($arl2-1))
                  echo "</br>Dan terakhir ".$namaAlternatif[array_search((prev($v)), $v)]." dengan nilai ".current($v).".</i></b></div>";
                else
                  echo "</br>Lalu diikuti dengan ".$namaAlternatif[array_search((prev($v)), $v)]." dengan nilai ".current($v);
              }
            ?>
            </div>        
        </div>
    </div>     
    <!-- akhir container -->
  </div>
 <!-- ########################## AKHIR content wrapper ################################                      --> 
</div>  
<!-- ########################## AKHIR Navigasi################################                      -->

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
                        <a class="btn btn-danger" href="auth/logout.php">Logout</a>
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
      <script src="dashboard/vendor/chart.js/Chart.min.js"></script>
      <script src="dashboard/vendor/datatables/jquery.dataTables.js"></script>
      <script src="dashboard/vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="dashboard/js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="dashboard/js/sb-admin-datatables.min.js"></script>
      <script src="dashboard/js/sb-admin-charts.min.js"></script>
    <!-- <script src="dashboard/js/sb-admin.min.js"></script> -->

    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- vanilla js eksternal -->
    <script src="assets/js/script.js"></script>
  </body>
</html>
