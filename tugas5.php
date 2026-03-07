<?php

// membuat class pembeli
class Pembeli{
    //membuat variabel
    public $nama;
    public $member;
    public $belanja;
    public $diskon;
    public $total;

    // constructor untuk mengisi data awal
    function __construct($nama,$member,$belanja){
        $this->nama = $nama;
        $this->member = $member;
        $this->belanja = $belanja;
    }

    // method untuk menghitung diskon
    function hitungDiskon(){

        $this->diskon = 0; // nilai awal diskon

        // cek apakah memiliki kartu member
        if($this->member == true){

            // jika member dan belanja > 500rb
            if($this->belanja > 500000){
                $this->diskon = 50000;
            }

            // jika member dan belanja > 100rb
            else if($this->belanja > 100000){
                $this->diskon = 15000;
            }

        }

        // jika tidak memiliki kartu member
        else{

            // jika belanja > 100rb
            if($this->belanja > 100000){
                $this->diskon = 5000;
            }

        }

        // menghitung total bayar
        $this->total = $this->belanja - $this->diskon;

    }

}

//instansiasi object
$p1 = new Pembeli("Pembeli 1", true, 200000);
$p2 = new Pembeli("Pembeli 2", true, 570000);
$p3 = new Pembeli("Pembeli 3", false, 120000);
$p4 = new Pembeli("Pembeli 4", false, 90000);

//memanggil function hitungdiskon
$p1->hitungDiskon();
$p2->hitungDiskon();
$p3->hitungDiskon();
$p4->hitungDiskon();

//memanggil object
$data = [$p1,$p2,$p3,$p4];

echo "<table border='1' cellpadding='8'>";
echo "<tr>
<th>No</th>
<th>Pembeli</th>
<th>Kartu Member</th>
<th>Total Belanja</th>
<th>Diskon</th>
<th>Biaya yang dikeluarkan</th>
</tr>";

$no = 1;

foreach($data as $d){

    $status = $d->member ? "Memiliki" : "Tidak Memiliki";

    echo "<tr>
    <td>$no</td>
    <td>$d->nama</td>
    <td>$status</td>
    <td>$d->belanja</td>
    <td>$d->diskon</td>
    <td>$d->total</td>
    </tr>";

    $no++;
}

echo "</table>";

?>