<?php 

// session_start();
include_once 'apps/config/config.php';
include_once 'edit_alternatif.php';
include_once 'data_alternatif.php';


// ambil id
$id = $_GET["id"];


if(hapus($id) > 0 ){
    $_SESSION['pesan'] = "Data berhasil dihapus!";
    echo "<script> 
    document.location.href = 'data_alternatif.php';        
    </script> ";

    // echo "<script> alert('Berhasil dihapus!'); 
    //     document.location.href = 'data_alternatif.php';        
    // </script> ";
}
else{
    $_SESSION['pesan'] = "Data gagal dihapus!";
    echo "<script> 
    document.location.href = 'data_alternatif.php';        
    </script> ";
}

?>