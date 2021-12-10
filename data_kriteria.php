<?php 
session_start();

include_once 'apps/config/config.php';
include_once 'kelola/edit_kriteria.php';

  //cek apakah ada login
  // if( !isset($_SESSION["login"])){ // jika tidak ada session login, maka kembalikan ke halaman login
  //   header("Location: auth/login.php");
  //   exit;
  // }


    // read
    $kriteria = tampil("SELECT * FROM tbl_kriteria ORDER BY id ASC");

    // tambah
      if(isset($_POST["submit"])){
        if(tambah($_POST) > 0 ){
          // atur session
          $_SESSION['pesan'] = "Data berhasil ditambahkan!";
          header("Location: data_kriteria.php");
          exit;
          // echo " <script>
          // alert('Data berhasil ditambahakan!');
          //     document.location.href = 'dm-pegawai.php';          
          //       </script>";
        }
        else{
          $_SESSION['pesan'] = "Data gagal ditambahkan!";
          header("Location: data_kriteria.php");
          exit; //percobaan 1
        }
      }


      // ubah
      if( isset($_POST["submit2"])){
        //cek apakah data udah diubah
        if(ubah($_POST) > 0){
  
            // echo "<script>
            //         alert('Data berhasil diperbarui!');
            //         </script>";
          $_SESSION['pesan'] = "Data berhasil diperbarui!";
          header("Location: data_kriteria.php");
          exit;
        }
        else{
          $_SESSION['pesan'] = "Data gagal diperbarui!";
          header("Location: data_kriteria.php");
          exit;
        }
    }
  
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
  <div class="content-wrapper "style="background-color: #f2f7ff;">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="text-dark">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
        </ol>
      </nav>
        
        <!-- Modal tambah-->
    <div class="card mb-3" style="border-radius: 20px; border:none;">
        <div class="row ms-3 mt-3" style="color:#525252;">
          <h4>Data Kriteria</h4>
          
        </div>
        <div class="row ms-3 mt-3" style="color:#7E7474; font-weight:500;">
          <h6>Data kriteria merupakan data ukuran yang dijadikan acuan dalam melakukan penilaian terhadap suatu objek (pegawai toko retail).</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col align-self-start ms-3">
              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#tambah">
              <i class="fa fa-plus"></i>
              Tambah Kriteria
              </button>
                     
              <div class="modal fade" id="tambah"  aria-labelledby="tPegawai" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title" id="tPegawai">FORM TAMBAH KRITERIA</h5>
                  
                    </div>
                  <div class="modal-body ">  
 <!-- ########################## Form tambah data Alternatif ##################### -->
                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">      
                      <div class="mb-3 row">
                          <label for="kriteria" class="col-sm-4 col-form-label ms-3">Kriteria</label>
                          <div class="col-sm">
                          <input type="text" class="form-control" id="kriteria" name="kriteria" required placeholder="Kriteria">
                          </div>
                      </div>
                      <div class="mb-3 row">
                          <label for="bobot" class="col-sm-4 col-form-label ms-3">Bobot</label>
                          <div class="col-sm">
                          <input type="text" class="form-control" id="bobot" name="bobot" required placeholder="Nilai">
                          </div>
                      </div>
                      
                      <div class="mb-3 row">
                          <label for="stts" class="col-sm-4 col-form-label ms-3">Status</label>
                          <div class="col-sm">
                          <select class="form-select" id="stts" name="stts" required>
                                  <option selected disabled>-Pilih-</option>
                                  <option value="Benefit">Benefit</option>
                                  <option value="Cost">Cost</option>
                              </select>
                          </div>
                      </div>
                      <div class="mb-3 row ms-1">
                          <div class="col-sm">
                          <div class="form-text">
                                <span style="font-size: 14px;">Keterangan:</span>
                              <br>           
                                <span class="fw-6 me-2">Status :</span>
                                <span style="margin-right: 15px;">Benefit = Semakin besar semakin baik,</span>                     
                                <span style="margin-right: 15px;">Cost = Semakin kecil semakin baik</span>            
                          </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="submit"><i class="far fa-save"></i> Simpan</button>
                      </div>
                    </form>
 <!-- ########################## FORM TAMBAH DATA ################################  -->
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- ########################## MODAL ALERT  ################  -->
                        <?php if(isset($_SESSION['pesan'])) : ?>
            
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                          <?= $_SESSION['pesan']; ?> 
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      
                        <?php  
                          session_destroy(); //menghilangkan session
                          endif; 
                        ?>
            <!-- ########################## AKHIR MODAL ALERT ####################                  -->
        </div>
      



<!-- ########################## TABEL ################################                      -->
            <div class="table-responsive rounded  ms-4 me-4">
                <table class="table table-bordered table-hover table-striped text-center" cellspacing="0">
                  <tr class="table-success">
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Bobot</th>
                    <th>Status</th>
                    <th>ِAksi</th>
                  </tr>

                  <!-- loop untuk table -->
                  <?php $i = 1; ?>
                        <?php foreach($kriteria as $row): ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["kriteria"]; ?></td>
                            <td><?= $row["bobot"]; ?></td>
                            <td><?= $row["stts"]; ?></td>

                            <td>
                                <button type="button " class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $row["id"]; ?>">
                                Ubah
                                </button>
                                    ||
                                <a href="hapus_kriteria.php?id=<?=$row["id"]; ?>" class="btn btn-danger btn-sm"   >
                                Hapus</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                            <?php endforeach ?>
                </table>
              <!-- akhihr tabel -->
              <!-- <div class="card-footer small text-muted"> Update <?= date("l, d-M-Y H:i:s") ?></div> -->
          </div>
  <!-- ########################## AKHIR TABEL ################################                      -->
      </div>
    </div>
  <!-- ########################## AKHIR CARD TABEL ################################                      -->
  </div>
 <!-- ########################## AKHIR CONTAINER ################################                      --> 
</div>  
<!-- ########################## AKHIR WRAPPER ################################                      -->
       

<!-- awal modal ubah data -->


<?php $i = 0; ?>
<?php foreach($kriteria as $row): $i++; ?>
<div class="modal fade" id="edit<?= $row["id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">FORM UBAH KRITERIA</h5>
      </div>
      <div class="modal-body">
      <form action="" method="post" enctype="multipart/form-data" autocomplete="off">      
        <div class="mb-3">
            <input type="hidden" name="id" id="id" value="<?= $row['id']; ?>">
        </div>   
        <div class="mb-3 row">
            <label for="kriteria" class="col-sm-4 col-form-label ms-3">Kriteria</label>
            <div class="col-sm">
            <input type="text" class="form-control" id="kriteria" name="kriteria" required placeholder="Kriteria" value="<?= $row['kriteria'];?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bobot" class="col-sm-4 col-form-label ms-3">Bobot</label>
            <div class="col-sm">
            <input type="text" class="form-control" id="bobot" name="bobot" required placeholder="Nilai" value="<?= $row['bobot'];?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="stts" class="col-sm-4 col-form-label ms-3">Status</label>
            <div class="col-sm">
            <select class="form-select" id="stts" name="stts" required>
                    <option selected disabled>-Pilih-</option>
                    <option value="Benefit" <?php if($row['stts'] == 'Benefit') echo"selected" ?>>Benefit</option>
                    <option value="Cost" <?php if($row['stts'] == 'Cost') echo"selected" ?>>Cost</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row ms-1">
            <div class="col-sm">
            <div class="form-text">
                <span style="font-size: 14px;">Keterangan:</span>
                <br>      
                <span class="fw-6 me-2">Bobot :</span>
                <span style="margin-right: 15px;">Sangat Baik = 91 - 100,</span>                      
                <span style="margin-right: 15px;">Baik = 76 - 90,</span>                      
                <span style="margin-right: 15px;">Cukup = 61 - 75,</span>                      
                <span style="margin-right: 15px;">Kurang = 51 - 60 </span>  
                <br>        
                <span class="fw-6 me-2">Status :</span>
                <span style="margin-right: 15px;">Benefit = Semakin besar semakin baik,</span>                     
                <span style="margin-right: 15px;">Cost = Semakin kecil semakin baik</span>            
            </div>
            </div>
        </div>
        </div>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" name="submit2"><i class="far fa-save"></i> Simpan</button>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- akhir mdodal ubah data -->








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
                <a class="btn btn-danger" href="auth/logout.php">Logout</a>
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
