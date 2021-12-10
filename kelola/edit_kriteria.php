<?php 
// session_start();
// if( !isset($_SESSION["login"])){ // jika tidak ada session login, maka kembalikan ke halaman login
//     header("Location: auth/login.php");
//     exit;
//   }
require_once 'apps/config/config.php';
require_once 'data_kriteria.php';


    // $conn = new mysqli ("localhost","root","","db_retail");
        function tampil($query){
            global $conn;
            $result = mysqli_query($conn, $query);

            if(!$result){
                echo "<script>
                        alert('Data tidak ada!');
                        </script>";
            }
            $rows = [];
            while($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;
            }
            return $rows;
        }
        

        // tambah kriteria
         function tambah($data){
            global $conn;
            $kriteria = htmlspecialchars($data["kriteria"]);
            $bobot = htmlspecialchars($data["bobot"]);
            $status = htmlspecialchars($data["stts"]);

            $query = "INSERT INTO tbl_kriteria
                    VALUES
                    ('','$kriteria','$bobot','$status')
                    ";
            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);

        }
        // ubah kriteria
         function ubah($data){
            global $conn;
            $id = htmlspecialchars($data["id"]);
            $kriteria = htmlspecialchars($data["kriteria"]);
            $bobot = htmlspecialchars($data["bobot"]);
            $status = htmlspecialchars($data["stts"]);
            


            $query = "UPDATE tbl_kriteria 
                    SET
                    kriteria = '$kriteria',
                    bobot = '$bobot',
                    stts= '$status'

                    WHERE id = $id
                    ";
            mysqli_query($conn,$query);
            return mysqli_affected_rows($conn);
        }

         function hapus($id){
            global $conn;
            mysqli_query($conn, "DELETE FROM tbl_kriteria WHERE id = $id ");
            return mysqli_affected_rows($conn);
        }
    // }


?>