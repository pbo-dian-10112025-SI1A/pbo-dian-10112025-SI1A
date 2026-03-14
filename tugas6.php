<?php

class BangunRuang {
    public $jenis;
    public $sisi;
    public $jari;
    public $tinggi;

    public function volume(){

       if ($this->jenis == "Bola") {
        return (4/3) * pi() * pow($this->jari,3);
       } elseif ($this->jenis == "Kerucut") {
           return (1/3) * pi() * pow($this->jari,2) * $this->tinggi;
       } elseif ($this->jenis == "Limas Segi Empat") {
           return (1/3) * pow($this->sisi,2) * $this->tinggi;
       } elseif ($this->jenis == "Kubus") {
           return pow($this->sisi,3);
       } elseif ($this->jenis == "Tabung") {
           return pi() * pow($this->jari,2) * $this->tinggi;
       }
    }
}

// Array Data
$dataBangun = [
    [
        "jenis"=>"Bola",
        "sisi"=>0,
        "jari"=>7,
        "tinggi"=>0
    ],
    [
        "jenis"=>"Kerucut",
        "sisi"=>0,
        "jari"=>14,
        "tinggi"=>10
    ],
    [
        "jenis"=>"Limas Segi Empat",
        "sisi"=>8,
        "jari"=>0,
        "tinggi"=>24
    ],
    [
        "jenis"=>"Kubus",
        "sisi"=>30,
        "jari"=>0,
        "tinggi"=>0
    ],
    [
        "jenis"=>"Tabung",
        "sisi"=>0,
        "jari"=>7,
        "tinggi"=>10
    ]
];

// Tabel HTML
echo "<table border='1' cellpadding='6' style='border-collapse:collapse'>";
echo "<tr>
<th>No</th>
<th>Jenis Bangun Ruang</th>
<th>Sisi</th>
<th>Jari-jari</th>
<th>Tinggi</th>
<th>Volume</th>
</tr>";

$no = 1;

foreach($dataBangun as $d){

    $bangun = new BangunRuang();

    $bangun->jenis = $d["jenis"];
    $bangun->sisi = $d["sisi"];
    $bangun->jari = $d["jari"];
    $bangun->tinggi = $d["tinggi"];

    $volume = $bangun->volume();

    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".$bangun->jenis."</td>";
    echo "<td>".$bangun->sisi."</td>";
    echo "<td>".$bangun->jari."</td>";
    echo "<td>".$bangun->tinggi."</td>";
    echo "<td>".$volume."</td>";
    echo "</tr>";

    $no++;
}

echo "</table>";

?>
    