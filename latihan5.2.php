<?php

function formatrupiah($angka): string {
    return "Rp. " . number_format($angka, 0, ",", ".");
}

class BelanjaWarung {
    public $namapembeli;
    public $namabarang;
    public $hargabarang;
    public $jumlahbeli;

    public function hitungsubtotal(): float|int {
        return $this->hargabarang * $this->jumlahbeli;
    }

    public function hitungdiskon($subtotal): float|int {
        if ($subtotal > 100000 ) {
            return $subtotal * 0.1;
        }
        return 0;
    }

    public function hitungtotaldiskon(): float|int{
        $subtotal = $this->hitungsubtotal();
        $diskon = $this->hitungdiskon(subtotal: $subtotal);
        return $subtotal - $diskon;
    }
}

$databelanja = [
    [
    'namapembeli'=>"Budi",
    'namabarang'=>"Gula 1 Kg",
    'hargabarang'=>65000,
    'jumlahbeli'=>2
    ],

    [
    'namapembeli'=>"Sinta",
    'namabarang'=>"Minyak 1 L",
    'hargabarang'=>14000,
    'jumlahbeli'=>1
    ]
];

echo "<h2>Transaksi 1</h2>";

$errors1 = [];

$namapembeli = $databelanja[0]["namapembeli"];
$namabarang = $databelanja[0]["namabarang"];
$hargabarang = $databelanja[0]["hargabarang"];
$jumlahbeli = $databelanja[0]["jumlahbeli"];

if (empty($namapembeli)){
    $errors1[] = "Nama Pembeli Tidak Boleh Kosong";
}

if ($harga <= 0) {
    $errors1[] = "Harga harus lebih dari 0";
}

if ($jumlahbeli <= 0) {
    $errors1[] = "Jumlah Beli harus lebih dari 0";
}

if (!empty($errors1)) {
    foreach ($errors1 as $error) {
        echo $error . "<br>";
    }
} else {
$belanja = new BelanjaWarung();
$belanja->namapembeli=$namapembeli;
$belanja->namabarang=$namabarang;
$belanja->hargabarang=$hargabarang;
$belanja->jumlahbeli=$jumlahbeli;

$subtotal = $belanja->hitungsubtotal();
$diskon   = $belanja->hitungdiskon();
$total = $belanja->hitungtotaldiskon();

echo "Nama Pembeli: " . $belanja->namapembeli . "<br>";
echo "Nama Barang: " . $belanja->namabarang . "<br>";
echo "Subtotal : " . formatrupiah(angka: $subtotal) . "<br>";
echo "Diskon: " . formatrupiah(angka: $diskon) . "<br>";
}
?>