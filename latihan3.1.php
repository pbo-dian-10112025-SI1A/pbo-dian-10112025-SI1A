<?php
class Kendaraan
{
    public $jumlahRoda =4;
    public $warna;
    public $bahanBakar="Premium";
    public $harga=100000000;
    public $merek;
    public $tahunPembuatan=2004;

    public function statusHarga() {
        if($this->harga > 50000000) {
        $status = "Harga Kendaraan Mahal"; }
        else {
        $status = "Harga Kendaraan Murah"; }
        return $status;
    }
    function statusSubsidi() {
        if($this ->tahunPembuatan < 2005 && $this->bahanBakar=="Premium") {
        $status = "DAPAT SUBSIDI"; }
        else {
        $status = "TIDAK DAPAT SUBSIDI"; }
        return $status;
    }

}

//instansiasi kelas
$ObjekKendaraan = new Kendaraan();//pembuatan objek dari kelas
echo "Objek Kendaraan" . "<br>";
echo "jumlahRoda : " . $ObjekKendaraan->jumlahRoda . "<br>";
echo "Status Harga : " . $ObjekKendaraan->statusHarga() . "<br>";
echo "Status Subsidi : " . $ObjekKendaraan->statusSubsidi() . "<br><br>";


// Objek Kendaraan 1
$ObjekKendaraan1 = new Kendaraan();
$ObjekKendaraan1->harga = 100000; 

echo "Objek Kendaraan 1" . "<br>";
echo "Status Harga : " . $ObjekKendaraan1->statusHarga() . "<br><br>";


// Objek Kendaraan 2
$ObjekKendaraan2 = new Kendaraan();
$ObjekKendaraan2->bahanBakar = "Solar"; 

echo "Objek Kendaraan 2" . "<br>";
echo "Status BBM : " . $ObjekKendaraan2->statusSubsidi() . "<br>";
?>