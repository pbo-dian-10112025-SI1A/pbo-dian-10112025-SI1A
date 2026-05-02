<?php
// CLASS INDUK
abstract class Tabungan {
    protected $nama;
    private $saldo;
    // constructor
    function __construct($nama, $saldo) {
        $this->nama = $nama;
        $this->saldo = $saldo;
    }

    // getter
    function getNama() {
        return $this->nama;
    }

    function getSaldo() {
        return $this->saldo;
    }

    // setter
    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    // abstract
    abstract function transaksi($jumlah, $jenis);
}

// CLASS ANAK
class Siswa extends Tabungan {

    function transaksi($jumlah, $jenis) {

        // percabangan
        if ($jenis == "setor") {
            $this->setSaldo($this->getSaldo() + $jumlah);

        } elseif ($jenis == "tarik") {

            if ($jumlah <= $this->getSaldo()) {
                $this->setSaldo($this->getSaldo() - $jumlah);
            } else {
                echo "Saldo tidak cukup\n";
            }
        }
    }
}

// ARRAY OBJECT
$siswa = array(
    new Siswa("Siswa 1", 10000),
    new Siswa("Siswa 2", 15000),
    new Siswa("Siswa 3", 20000)
);

// TAMPIL SALDO AWAL
echo "=== SALDO AWAL ===\n";
for ($i=0; $i<count($siswa); $i++) {
    echo $siswa[$i]->getNama()." : ".$siswa[$i]->getSaldo()."\n";
}

// LOOPING + INPUT (fgets)
while (true) {

    echo "\n1. Transaksi\n2. Keluar\nPilih: ";
    $menu = trim(fgets(STDIN));

    if ($menu == 2) {
        break;
    }

    echo "Pilih siswa (1-3): ";
    $pilih = trim(fgets(STDIN)) - 1;

    if (!isset($siswa[$pilih])) {
        echo "Siswa tidak ada\n";
        continue;
    }

    echo "Jenis (setor/tarik): ";
    $jenis = trim(fgets(STDIN));

    echo "Jumlah: ";
    $jumlah = trim(fgets(STDIN));

    // polymorphism
    $siswa[$pilih]->transaksi($jumlah, $jenis);

    echo "\nSaldo sekarang:\n";
    for ($i=0; $i<count($siswa); $i++) {
        echo $siswa[$i]->getNama()." : ".$siswa[$i]->getSaldo()."\n";
    }
}

// SIMPAN FILE (fopen)
$file = fopen("data_tabungan.txt", "w");

echo "\n=== SALDO AKHIR ===\n";
for ($i=0; $i<count($siswa); $i++) {
    $data = $siswa[$i]->getNama()." : ".$siswa[$i]->getSaldo()."\n";
    echo $data;
    fwrite($file, $data);
}

fclose($file);
?>