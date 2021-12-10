<?php 
    include_once '../apps/config/config.php';

    function registrasi($data){

        global $conn;
        // stripslashes => agar tanda /  tidak bisa diinputkan
        // strtolower => memaksa agar jadi huruf kecil
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'"); //query data username
        if(mysqli_fetch_assoc($result)){ //jika menghasilkan true / usernmae sudah ada maka, jalankan program berikut
            echo " <script> 
                        alert('username sudah terdaftar!');
                    </script>";
                    return false; // program berhenti
        }


        //cek konfirmasi password
        if($password !== $password2){
            echo " <script> 
                        alert('password tidak sesuai');
                    </script>";
                    return false;
        }

        // enkripsi password
        // 2 parameter => (variabel password yang akan diacak , teknik algoritma)
        $password = password_hash($password, PASSWORD_DEFAULT);

        //tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

        return mysqli_affected_rows($conn); //menghasilkan angka 1 jika berhasil, 0 jika gagal

    }

?>