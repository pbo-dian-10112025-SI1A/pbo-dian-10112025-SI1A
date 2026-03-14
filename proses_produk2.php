<?php

function formatRupiah($angka){
    return "Rp " . number_format($angka,0,",",".");
}

class BelanjaWarung{

public $nama;
public $barang;
public $harga;
public $jumlah;
public $member;

public function subtotal(){
    return $this->harga * $this->jumlah;
}

public function diskon($subtotal){

$diskon = 0;

if($this->member == true){

    if($subtotal > 500000){
        $diskon = 50000;
    }
    elseif($subtotal > 100000){
        $diskon = 15000;
    }

}else{

    if($subtotal > 100000){
        $diskon = 5000;
    }

}

return $diskon;

}

public function total(){

$subtotal = $this->subtotal();
$diskon = $this->diskon($subtotal);

return $subtotal - $diskon;

}

}

$nama = $_POST['nama'];
$barang = $_POST['barang'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$member = $_POST['member'];

echo "<h2>Hasil Data Belanja</h2>";

echo "<table border='1' cellpadding='6'>";

echo "<tr>
<th>No</th>
<th>Nama</th>
<th>Member</th>
<th>Barang</th>
<th>Subtotal</th>
<th>Diskon</th>
<th>Total</th>
</tr>";

$no = 1;

for($i=0; $i<count($nama); $i++){

$belanja = new BelanjaWarung();

$belanja->nama = $nama[$i];
$belanja->barang = $barang[$i];
$belanja->harga = $harga[$i];
$belanja->jumlah = $jumlah[$i];
$belanja->member = $member[$i];

$subtotal = $belanja->subtotal();
$diskon = $belanja->diskon($subtotal);
$total = $belanja->total();

$statusMember = ($belanja->member == 1) ? "Ya" : "Tidak";

echo "<tr>
<td>$no</td>
<td>$belanja->nama</td>
<td>$statusMember</td>
<td>$belanja->barang</td>
<td>".formatRupiah($subtotal)."</td>
<td>".formatRupiah($diskon)."</td>
<td>".formatRupiah($total)."</td>
</tr>";

$no++;

}

echo "</table>";

?>