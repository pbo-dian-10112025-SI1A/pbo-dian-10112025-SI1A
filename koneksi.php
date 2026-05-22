<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "si_gudang";

//isi nama host, username mysql, dan passwod mysql anda
try{
$koneksi = mysqli_connect($host,$username,$password,$database);
if(!$koneksi){
    throw new Exception("Koneksi Database Gagal");
}

}catch(Exception $e){
    echo "Error :".$e->getMessage();
}
?>