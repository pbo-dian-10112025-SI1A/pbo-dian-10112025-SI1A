<?php

class Employee {
    public $nama;
    public $gaji;
    public $masa_kerja;

    public function __construct($nama, $gaji, $masa_kerja){
        $this->nama = $nama;
        $this->gaji = $gaji;
        $this->masa_kerja = $masa_kerja;
    }

    public function hitungGaji(){
        return $this->gaji;
    }
}

class Programmer extends Employee {

    public function hitungGaji(){
        if($this->masa_kerja < 1){
            $bonus = 0;
        } elseif($this->masa_kerja <= 10){
            $bonus = 0.01 * $this->masa_kerja * $this->gaji;
        } else {
            $bonus = 0.02 * $this->masa_kerja * $this->gaji;
        }

        return $this->gaji + $bonus;
    }
}

class Direktur extends Employee {

    public function hitungGaji(){
        $bonus = 0.5 * $this->masa_kerja * $this->gaji;
        $tunjangan = 0.1 * $this->masa_kerja * $this->gaji;

        return $this->gaji + $bonus + $tunjangan;
    }
}

class PegawaiMingguan extends Employee {
    public $harga_barang;
    public $stok;
    public $terjual;

    public function __construct($nama,$gaji,$masa_kerja,$harga_barang,$stok,$terjual){
        parent::__construct($nama,$gaji,$masa_kerja);
        $this->harga_barang = $harga_barang;
        $this->stok = $stok;
        $this->terjual = $terjual;
    }

    public function hitungGaji(){
        $persen = ($this->terjual / $this->stok) * 100;

        if($persen > 70){
            $bonus = 0.10 * $this->harga_barang * $this->terjual;
        } else {
            $bonus = 0.03 * $this->harga_barang * $this->terjual;
        }

        return $this->gaji + $bonus;
    }
}

$prog = new Programmer("Asep",5000000,5);
echo "Gaji Programmer : Rp ".number_format($prog->hitungGaji(),0,",",".");

echo "<br>";

$dir = new Direktur("Budi",10000000,8);
echo "Gaji Direktur : Rp ".number_format($dir->hitungGaji(),0,",",".");

echo "<br>";

$pegawai = new PegawaiMingguan("Udin",3000000,2,50000,100,80);
echo "Gaji Pegawai Mingguan : Rp ".number_format($pegawai->hitungGaji(),0,",",".");

?>