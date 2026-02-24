<?php

class AngsuranHutang {

    // properties
    public $pinjaman=1000000;
    public $bunga=10;
    public $lamaAngsuran=5;
    public $terlambat=40;
    public $dendaPerHari = 0.15; // persen

    // method hitung total pinjaman
    public function totalPinjaman() {
        return $this->pinjaman + ($this->pinjaman * $this->bunga / 100);
    }

    // method hitung angsuran
    public function angsuran() {
        return $this->totalPinjaman() / $this->lamaAngsuran;
    }

    // method hitung denda
    public function totalDenda() {
        $dendaHarian = $this->angsuran() * $this->dendaPerHari / 100;
        return $dendaHarian * $this->terlambat;
    }

    // method total bayar
    public function totalBayar() {
        return $this->angsuran() + $this->totalDenda();
    }
}


// instansiasi object
$data = new AngsuranHutang();

$data->pinjaman = 1000000;
$data->bunga = 10;
$data->lamaAngsuran = 5;
$data->terlambat = 40;


// output
echo "Total Pinjaman : Rp. " . $data->totalPinjaman() . "<br>";
echo "Angsuran per Bulan : Rp. " . $data->angsuran() . "<br>";
echo "Denda Keterlambatan : Rp. " . $data->totalDenda() . "<br>";
echo "Total Pembayaran : Rp. " . $data->totalBayar();

?>