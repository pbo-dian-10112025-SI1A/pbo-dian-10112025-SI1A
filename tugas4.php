<?php

// ini adalah function
function cekLulus($nilai) {
    if ($nilai >= 60) {
        return "Lulus Kuis";
    } else {
        return "Tidak Lulus Kuis";
    }
}

class Mahasiswa {

    public $nama;
    public $kelas;
    public $mataKuliah;
    public $nilai;

    // method hitung kelulusan
    public function hitungKelulusan() {
        return cekLulus($this->nilai);
    }
}

// buat array data mahasiswa
$data = [
    [
        "nama" => "Aditya",
        "kelas" => "SI 2",
        "mataKuliah" => "Pemrograman Berorientasi Objek",
        "nilai" => 80
    ],
    [
        "nama" => "Shinta",
        "kelas" => "SI 2",
        "mataKuliah" => "Pemrograman Berorientasi Objek",
        "nilai" => 75
    ],
    [
        "nama" => "Ineu",
        "kelas" => "SI 2",
        "mataKuliah" => "Pemrograman Berorientasi Objek",
        "nilai" => 55
    ]
];

// looping array
foreach ($data as $item) {

    // instansiasi object
    $mhs = new Mahasiswa();

    $mhs->nama = $item["nama"];
    $mhs->kelas = $item["kelas"];
    $mhs->mataKuliah = $item["mataKuliah"];
    $mhs->nilai = $item["nilai"];

    // output
    echo "<h3>DATA NILAI MAHASISWA</h3>";
    echo "Nama : " . $mhs->nama . "<br>";
    echo "Kelas : " . $mhs->kelas . "<br>";
    echo "Mata Kuliah : " . $mhs->mataKuliah . "<br>";
    echo "Nilai : " . $mhs->nilai . "<br>";
    echo $mhs->hitungKelulusan();
    echo "<hr>";
}

?>