<?php
class Produk {
public $nama;
public $harga;
}
$produk1 = new Produk();
$produk1->nama =
htmlspecialchars($_POST['nama']);
$produk1->harga =
htmlspecialchars($_POST['harga']);
echo "<h2>Data Produk</h2>";
echo "Nama Produk : " . $produk1->nama . "<br>";
echo "Harga : Rp " . $produk1->harga;
?>
