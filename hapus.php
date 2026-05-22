<?php 
include 'koneksi.php';
$id = $_GET['id'];

try{
mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");

header("location:index.php?pesan=hapus");
}catch(exception $e){
    echo "Data gagal dihapus";
}
?>