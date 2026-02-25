<?php

function formatrupiah($angka): string {
    return "Rp. " . number_format($angka, 0, ",", ".");
}

class Belanja {
    public $namapembeli;
    public $namabarang;
    public $hargabarang;
    public $jumlahbeli;

    public function hitungsubtotal(): float|int {
        return $this->hargabarang * $this->jumlahbeli;
    }

    public function hitungtotaldiskon($persendiskon): float|int{
        $subtotal = $this->hitungsubtotal();
        $diskon = ($persendiskon/100) * $subtotal;
        return $subtotal - $diskon;
    }


}

$data = [
    'namapembeli'=>"dian",
    'namabarang'=>"motor",
    'hargabarang'=>20000000,
    'jumlahbeli'=>5
];

$belanja = new belanja();
$belanja->namapembeli=$data['namapembeli'];
$belanja->namabarang=$data['namabarang'];
$belanja->hargabarang=$data['hargabarang'];
$belanja->jumlahbeli=$data['jumlahbeli'];

echo "<h2> Struk Belanja </h2>";
echo "Nama Pembeli: " . $belanja->namapembeli . "<br>";
echo "Nama Barang: " . $belanja->namabarang . "<br>";
echo "Subtotal : " . formatrupiah(angka: $belanja->hitungsubtotal()) . "<br>";
echo "Total Bayar Setelah Diskon: " . formatrupiah(angka: $belanja->hitungtotaldiskon(persendiskon: 10)) . "<br>";

?>