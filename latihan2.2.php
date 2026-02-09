<?php

class belanja { //ini kelas belanja rani

    public string $namapembeli="rani"; //ini adalah insteance variable, bertipe data string
    public string $namabarang="kecap"; //ini adalah insteance variable, bertipe data string
    public int $hargabarang=3000; //ini adalah insteance variable, bertipe data integer
    public int $jumlahbarang=2; //ini adalah insteance variable, bertipe data integer
    public float $totalbayar; //ini adalah insteance variable, bertipe data float/desimal
    public float $diskon=0.1; //ini adalah insteance variable, bertipe data float/desimal

    public static float $pajak = 0.02;

    public function __construct ($namapembeli){
         $this->namapembeli = $namapembeli;
    }

    public function hitungtotal(): float
    {
        $subtotal = $this->hargabarang * $this->jumlahbarang;  //operator aritmatika *

        return $subtotal;
    }

    public function totaldiskon(): float
    {
        $diskon = $this-> hitungtotal() * $this->diskon;  //menghitung total diskon

        return $diskon;

    }

    public function hargadiskon(): float
    {
        $hargasetelahdiskon = $this-> hitungtotal() - $this-> totaldiskon();

        return $hargasetelahdiskon;
    }

    public function tampilrincian ($namapembeli): void{
        echo "Nama Pembeli : " . $this->namapembeli . "<br>";
        echo "Nama Barang : " . $this->namabarang . "<br>";
        echo "Harga Barang : " . $this->hargabarang . "<br>";
        echo "Jumlah Barang : " . $this->jumlahbarang . "<br>";
        echo "Total Bayar : " . $this->hitungtotal() . "<br>";
        echo "Total Diskon : " . $this->totaldiskon() . "<br>";
        echo "Harga Setelah Diskon: " . $this->hargadiskon() . "<br>";

    }

}

$belanja1 = new belanja(namapembeli:"rani");
$belanja1->tampilrincian(namapembeli: $belanja1->namapembeli);

?>