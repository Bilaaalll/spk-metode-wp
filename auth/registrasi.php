<?php 
    include_once 'setting.php';
    session_start();

    if( isset($_POST['register'])){
        
        if(registrasi($_POST) > 0 ){
            $_SESSION['daftar'] = "Anda berhasil mendaftar!";
            header("Location: registrasi.php");
            exit;
        }
        else{
            // $_SESSION['daftar'] = "Anda gagal mendaftar!";
            // header("Location: login.php");
            mysqli_error($conn);
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

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    <title>Hello, world!</title>

    <style>

        .slide{
            width: 60%;
            height: 664px;
            padding: 0;
            margin: 0;
            background-color: #212529;
            float: left;
            
        }
        .slide h1{
            color: white;
            text-align: center;
            margin-top: 100px;
            font-family: sans-serif;
        }
        .slide h3{
            color: white;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif; 

        }
        /* .hapus{
            clear: both;
            display: block;

        } */
        .login{
            width: 40%;
            float: right;
        }
        .login form{
            width: 300px;
            
        }
        .login-auth{
            width: 30%;
            margin-left: 100px;
            margin-top: 150px;
        }
        .login h1{
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }
        .login h6{
            font-size: 13px;
        }
    </style>
  </head>
  <body >



        <div class="slide">  
            <h1>Sistem Informasi</h1>
            <h3>Sistem Pendukung Keputusan Metode WP</h3>
        </div>

        <div class="hapus"></div>

        <div class="login">
            <div class="login-auth col-4">  
                <h1>Daftar</h1> 
                          
                <form method="POST" action=""  autocomplete="off">
                    <!-- awal session alert -->
                    <?php  if(isset($_SESSION['daftar'])): ?>
                        <div class="alert alert-success alert-dismissible fade show h-25" role="alert">
                        <?= $_SESSION['daftar']; ?> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    
                    <?php 
                        session_destroy(); //menghilangkan session
                        endif; 
                    ?>


                    <!-- akhir session alert -->
                    <div class="mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-2 mb-3">
                        <label for="password2" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" name="password2">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-2" name="register">Daftar</button>
                    <h6>Sudah punya akun? <a href="login.php" class="text-decoration-none">Login</a></h6>
                </form>
                
            </div>
        </div>

        <!-- Button trigger modal -->



<!-- Modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>