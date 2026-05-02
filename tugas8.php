<?php

class Karyawan {
    public $nama;
    public $golongan;
    public $jamLembur;
    public $gajiPokok;
    public $totalGaji;

    public function __construct($nama, $golongan, $jamLembur){
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
        $this->gajiPokok = $this->getGajiPokok();
        $this->totalGaji = $this->hitungTotal();
    }

    public function getGajiPokok(){
        switch($this->golongan){
            case "Ib": return 1250000;
            case "Ic": return 1300000;
            case "Id": return 1350000;
            case "IIa": return 2000000;
            case "IIb": return 2100000;
            case "IIc": return 2200000;
            case "IId": return 2300000;
            case "IIIa": return 2400000;
            case "IIIb": return 2500000;
            case "IIIc": return 2600000;
            case "IIId": return 2700000;
            case "IVa": return 2800000;
            case "IVb": return 2900000;
            case "IVc": return 3000000;
            case "IVd": return 3100000;
            default: return 0;
        }
    }

    public function hitungTotal(){
        $lembur = $this->jamLembur * 15000;
        return $this->gajiPokok + $lembur;
    }

    public function __destruct(){
        // destructor
    }
}

$data = [];

while(true){
    echo "\n===== MENU GAJI KARYAWAN =====\n";
    echo "1. Tampilkan Data\n";
    echo "2. Tambah Data\n";
    echo "3. Update Data\n";
    echo "4. Hapus Data\n";
    echo "5. Keluar\n";
    echo "Pilih menu: ";
    $menu = trim(fgets(STDIN));

    switch($menu){

        case 1:
            echo "\n===== DATA GAJI KARYAWAN =====\n";
            echo "No | Nama | Golongan | Jam Lembur | Total Gaji\n";
            $no = 1;
            foreach($data as $d){
                echo $no++." | ".$d->nama." | ".$d->golongan." | ".$d->jamLembur." | Rp".number_format($d->totalGaji,0,",",".")."\n";
            }
        break;

        case 2:
            echo "Nama: ";
            $nama = trim(fgets(STDIN));

            echo "Golongan: ";
            $gol = trim(fgets(STDIN));

            echo "Jam Lembur: ";
            $jam = trim(fgets(STDIN));

            $data[] = new Karyawan($nama,$gol,$jam);
        break;

        case 3:
            echo "Nomor yang diupdate: ";
            $i = trim(fgets(STDIN))-1;

            echo "Nama Baru: ";
            $nama = trim(fgets(STDIN));

            echo "Golongan Baru: ";
            $gol = trim(fgets(STDIN));

            echo "Jam Lembur Baru: ";
            $jam = trim(fgets(STDIN));

            $data[$i] = new Karyawan($nama,$gol,$jam);
        break;

        case 4:
            echo "Nomor yang dihapus: ";
            $i = trim(fgets(STDIN))-1;
            unset($data[$i]);
            $data = array_values($data);
        break;

        case 5:
            exit;
    }
}

?>