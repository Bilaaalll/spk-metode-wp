<?php 
require_once 'apps/config/config.php';
require_once 'data_alternatif.php';

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

         function tambah($data){
            global $conn;
            $alternatif = htmlspecialchars($data['alternatif']);
            $k1 = htmlspecialchars($data['k1']);
            $k2 = htmlspecialchars($data['k2']);
            $k3 = htmlspecialchars($data['k3']);
            $k4 = htmlspecialchars($data['k4']);
            $k5 = htmlspecialchars($data['k5']);

            $query = "INSERT INTO tbl_alternatif
                    VALUES
                    ('','$alternatif', '$k1', '$k2', '$k3', '$k4', '$k5')
                    ";
            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);


        }

         function ubah($data){
            global $conn;
            $id = htmlspecialchars($data["id"]);
            $alternatif = htmlspecialchars($data["alternatif"]);
            $k1 = htmlspecialchars($data["k1"]);
            $k2 = htmlspecialchars($data["k2"]);
            $k3 = htmlspecialchars($data["k3"]);
            $k4 = htmlspecialchars($data["k4"]);
            $k5 = htmlspecialchars($data["k5"]);


            $query = "UPDATE tbl_alternatif 
                    SET
                    alternatif = '$alternatif',
                    k1 = '$k1',
                    k2 = '$k2',
                    k3 = '$k3',
                    k4 = '$k4',
                    k5 = '$k5'

                    WHERE id = $id
                    ";
            mysqli_query($conn,$query);
            return mysqli_affected_rows($conn);


        }


        // hapus

         function hapus($id){
            global $conn;
            mysqli_query($conn, "DELETE FROM tbl_alternatif WHERE id = '$id' ") or die(mysqli_error($conn));
    
            return mysqli_affected_rows($conn);
        }
?>