<?php 
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];

try{

mysqli_query($koneksi, "UPDATE user SET nama='$nama', alamat='$alamat',
pekerjaan='$pekerjaan' WHERE id='$id'");

header("location:index.php?pesan=update");

}catch(Exception $e){
    echo "Data gagal diupdate";
}
?>