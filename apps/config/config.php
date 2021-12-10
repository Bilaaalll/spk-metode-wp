<?php 
    
    // class Database{
    //     private $host = 'localhost';
    //     private $username = 'root';
    //     private $password = '';
    //     private $db = 'db_retail';
    //     protected $conn;
        
    //     function __construct(){

    //         if(!isset($this->conn)){
    //             $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);
    //         }
            
    //         if(!$this->conn){
    //             echo 'Koneksi gagal!' . mysqli_error($this->conn);
    //         }
    //         return $this->conn;
    //     }
        
    // }

    $conn = new mysqli ("localhost","root","","db_retail");

?>