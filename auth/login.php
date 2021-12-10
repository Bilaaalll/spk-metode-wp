<?php 
    include_once 'setting.php';
    // include_once '../apps/config/config.php';
    session_start();

    
        //cek cookie
        // if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
        //     // ambil id dan key
        //     $id = $_COOKIE['id'];
        //     $key = $_COOKIE['key'];

        //     // ambil username dari db
        //     $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id ");
        //     // cari dan tampung di $row
        //     $row = mysqli_fetch_assoc($result);

        //     //cek apakah benar dengan yang diinputkan user
        //     if($key === hash('sha256', $row['username'])){
        //         $_SESSION['login'] = true;
        //     }


        // }

        if( isset($_SESSION["login"])){
            header("Location: ../index.php");
            exit;
        }



    if(isset($_POST["login"])){
        //tangkap username dan password, tampung di variabel
        $username = $_POST['username'];
        $password = $_POST['password'];


        //cari username didalam db
        $result = mysqli_query($conn, " SELECT * FROM user WHERE username = '$username' ");

        // cek apakah ada
        if(mysqli_num_rows($result)===1){
            // cek password
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row["password"])){ 
                // password_verify => mencocokkan data asli dengan data yang sudah terhash
                // set session
                $_SESSION["login"] = true;

                //cek cookie remember me
                // if(isset($_COOKIE["remember"])){
                //     //buat cookie
                //     // parameter => key, value, time
                //     // usahakan key dari cookie sulit ditebak orang
                //     //setcookie('id', $row['id'],time()+60); // cookie akan ada selama 1 menit
                //     setcookie('id', $row['id']  );
                //     setcookie('key' , hash('sha256', $row['username'])); // username dihash/ enkripsi supaya tidak ketahuan orang
                // }
                header("Location: ../index.php");
                exit;
            }
        }
        $error = true;
        // mengapa tidak menggunakan else?
        // 1. karena logika tersebut jika pada tahap cek username ternyata username tidak ada, maka akan keluar dari pengkondisian, 
        // 2. jika username ada maka akan masuk ke tahap cek password, jika password cocok maka akan langsung dipindahkan ke index.php, jika password tidak cocok maka akan langsung keluar melalui exit, dan akan keluar dari pengkondisian.
        // jika keluar dari pengkondisian maka akan menjalankan $error yang bernilai true 
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

    <title>Login</title>

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
            margin-top: 120px;
            font-family: sans-serif;
            font-size: 40px;
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
                <h1>Login</h1>     
                <form method="POST" action=""  autocomplete="off">

                <?php  if(isset($error)): ?>
                        <div class="alert alert-success alert-dismissible fade show h-25" role="alert">
                        Anda gagal login! 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    
                    <?php 
                        session_destroy(); //menghilangkan session
                        endif; 
                    ?>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="remember" for="remember">Remember me</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary w-100 mb-2" name="login">Login</button>
                    <!-- <a href="registrasi.php" class="btn btn-outline-dark w-100">Daftar</a> -->
                    <!-- <h6>Belum punya akun? <a href="registrasi.php" class="text-decoration-none">Daftar</a></h6> -->
                </form>
            </div>
        </div>

        <!-- Button trigger modal -->



<!-- Modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>